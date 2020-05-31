<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('pages');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Sanitize POST
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        // PHP In built function. We have to use temporarily post image to display on the web what file it is
        // $post_image will upload to the final destination
        move_uploaded_file($post_image_temp, APPROOT . "/../public/assets/img/" . basename($post_image));
        
        $data = [
        'image' => $post_image,
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

        // Validate email
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter an email';
            // Validate name
            if(empty($data['name'])){
              $data['name_err'] = 'Please enter a name';
            }
        } else{
          // Check Email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken.';
          }
        }

        // Validate password
        if(empty($data['password'])){
          $password_err = 'Please enter a password.';     
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must have atleast 6 characters.';
        }

        // Validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password.';     
        } else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Password do not match.';
            }
        }
        
        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // SUCCESS - Proceed to insert

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //Execute
          if($this->userModel->register($data)){
            // Redirect to login
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
          
        } else {
          // Load View
          $this->view('users/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'image' => '',
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load View
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('pages');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',  
          'isBanned_err' => '',
          'isDisabled_err' => '',
          'isBannedDisabled_err' => ''

        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->userModel->findUserByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        if($this -> userModel -> isBanned($data['email']) && $this -> userModel -> userIsDisabled($data['email'])) {
          $data['isBannedDisabled_err'] = 'You account is Banned and Disabled! 💀';
          $data['password_err'] = 'Disabled';
          session_unset();
          session_destroy();
        } else if($this -> userModel -> userIsDisabled($data['email'])) {
          $data['isDisabled_err'] = 'Your Account is disabled 🤷';
          $data['password_err'] = 'Disabled';
          session_unset();
          session_destroy();
        } else if($this -> userModel -> isBanned($data['email'])) {
          $data['isBanned_err'] = 'Your Account is Banned 🤦';
          $data['password_err'] = 'Disabled';
          session_unset();
          session_destroy();
        }

        

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            
            // User Authenticated!
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }
           
        } else {
          // Load View
          $this->view('users/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
          'isBanned_err' => '',
          'isDisabled_err' => '',
          'isBannedDisabled_err' => ''
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email; 
      $_SESSION['user_name'] = $user->name;
      redirect('pages');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }
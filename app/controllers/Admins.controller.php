<?php
    class Admins extends Controller {
        public function __construct() {
            $this -> adminModel = $this -> model('Admin');
            $this -> userModel = $this -> model('User');
            $this -> postModel = $this -> model('Post');
        }

        public function index() {
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $posts = $this -> adminModel -> getPosts();
            
            $data = [
                'admin' => $isAdmin,
                "user" => $user,
                "posts" => $posts
            ];
            $this -> view('pages/admin/index', $data);
        }

        public function inbox() {

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                 $data = [
                    'user_id' => $_SESSION['user_id'],
                    'from_user' => $_SESSION['user_email'],
                    'to_user' => trim($_POST['to_user']),
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'body_err' => ''
                ];

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    if($this->adminModel->sendPrivateMessage($data)){
                        // Redirect to login
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load the view with errors
                    $this -> view('pages/admin/inbox', $data);
                }
             }

            

            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $inboxMessages = $this -> adminModel -> getInboxMessages($_SESSION['user_id']);

            $data = [
                "admin" => $isAdmin,
                "user" => $user,
                "inbox_messages" => $inboxMessages
            ];
            $this -> view('pages/admin/inbox', $data);
        }

        public function message($id) {

             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                 $data = [
                    'user_id' => $_SESSION['user_id'],
                    'from_user' => $_SESSION['user_email'],
                    'to_user' => trim($_POST['to_user']),
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'body_err' => ''
                ];

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    if($this->adminModel->sendPrivateMessage($data)){
                        // Redirect to login
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load the view with errors
                    $this -> view('pages/admin/inbox', $data);
                }
             }

            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $inboxMessages = $this -> adminModel -> getInboxMessages($_SESSION['user_id']);
            $readMessage = $this -> adminModel -> readMessage($id);
            
            $data = [
                "admin" => $isAdmin,
                "user" => $user,
                "inbox_messages" => $inboxMessages,
                "read_message" => $readMessage
            ];

            $this -> view('pages/admin/message', $data);
        }

        public function deleteMessage($id) {

            if($this -> adminModel -> deleteSingleMessage($id)){
                
            } else {
                die('Something went wrong');
            }


            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $inboxMessages = $this -> adminModel -> getInboxMessages($_SESSION['user_id']);
            $readMessage = $this -> adminModel -> readMessage($id);
        
            $data = [
                "admin" => $isAdmin,
                "user" => $user,
                "inbox_messages" => $inboxMessages,
                "read_message" => $readMessage
            ];

            $this -> view('pages/admin/inbox', $data);
        }

        public function getPosts() {
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $getAllposts = $this -> adminModel -> getPosts();
            $userPost = $this -> adminModel -> getRegularUserPost($_SESSION['user_id']);

            $data = [
                'admin' => $isAdmin,
                "user" => $user,
                'posts' => $getAllposts,
                'user_post' => $userPost
            ];

            $this -> view('pages/admin/getposts', $data);
        }

        public function allPosts() {
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $getAllposts = $this -> adminModel -> getPosts();
            $userPost = $this -> adminModel -> getRegularUserPost($_SESSION['user_id']);

            $data = [
                'admin' => $isAdmin,
                "user" => $user,
                'posts' => $getAllposts,
                'user_post' => $userPost
            ];

            $this -> view('pages/admin/view_all_posts', $data);
        }

        public function addPost() {
          
             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];
                
                // PHP In built function. We have to use temporarily post image to display on the web what file it is
                // $post_image will upload to the final destination
                move_uploaded_file($post_image_temp, APPROOT . "/../public/assets/img/" . basename($post_image));

                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'image' => $post_image,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate Data
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter body text';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    if($this->adminModel->addPost($data)){
                        // Redirect to add post
                        redirect('admins/addpost');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load the view with errors
                    $this -> view('pages/admin/addpost', $data);
                }
                

            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
                $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                
                $data = [
                    'admin' => $isAdmin,
                    'user' => $user,
                    'title' => '',
                    'body' => ''
                ];
                $this -> view('pages/admin/addpost', $data);
            }           
        }

        public function editPost($id) {
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $posts = $this -> adminModel -> getPostById($id);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            
            $data = [
                'id' => $id,
                'admin' => $isAdmin,
                'posts' => $posts,
                'user' => $user
            ];

            $this -> view('pages/admin/editpost', $data);
        }

        public function updatePost($id) {
              if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate Data
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter body text';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    if($this->adminModel->updatePost($data)){
                        // redirect to the edit page after page has been edited/published
                        redirect('admins/editpost/' . $id);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load the view with errors
                    $this -> view('pages/admin/editpost', $data);
                }
                

            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];

                $this -> view('pages/admin/editpost', $data);
            }  
        }

        public function deletepost($id) {
            if($this -> adminModel -> deletePost($id)){
            // Redirect to login
            redirect('admins/getposts');
            } else {
                die('Something went wrong');
            }
        }

        public function users() {
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $users = $this -> adminModel -> getUsers();
            
            $data = [
                'admin' => $isAdmin,
                'user' => $user,
                'users' => $users
            ];

            $this -> view('pages/admin/users', $data);
        }

        public function changeUserRole($id, $roleValue) {
             if($this -> userModel -> changeRole($id, $roleValue)){
                // Redirect to login
                redirect('admins/users');
            } else {
                die('Something went wrong');
            }
        }

        public function changeUserStatus($id, $roleValue) {
             if($this -> userModel -> changeStatus($id, $roleValue)){
                // Redirect to login
                redirect('admins/usersreported');
            } else {
                die('Something went wrong');
            }
        }

        public function changeUserActive($id, $activeValue) {
            if($this -> userModel -> changeActiveStatus($id, $activeValue)) {
                // Redirect to login
                redirect('admins/users');
            } else {
                die('Something went wrong');
            }
        }

        public function deleteUser($id) {
            if($this -> adminModel -> deleteUser($id)){
            // Redirect to login
            redirect('admins/users');
            } else {
                die('Something went wrong');
            }
        }

        public function settings() {
             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                 $data = [
                     'user_id' => $_POST['disable_user_id'],
                     'disable' => $_POST['disable_user_submit'] = 'disabled'
                 ];

                 if($this -> userModel -> disableUser($data)) {
                    unset($_SESSION['user_id']);
                    unset($_SESSION['user_email']);
                    unset($_SESSION['user_name']);
                    session_destroy();
                    redirect('pages/index');
                 }
             }
            
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $data = [
                'admin' => $isAdmin,
                'user' => $user
            ];

            $this -> view('pages/admin/settings', $data);
        }

        public function postEvent() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];
                
                // PHP In built function. We have to use temporarily post image to display on the web what file it is
                // $post_image will upload to the final destination
                move_uploaded_file($post_image_temp, APPROOT . "/../public/assets/img/" . basename($post_image));
                
                // Step 1 - Posting regular form from the user side
                $data = [
                    'event_author_id' => $_SESSION['user_id'],
                    'event_author_post' => $_SESSION['user_name'],
                    'event_image' => $post_image,
                    'event_title' => trim($_POST['title']),
                    'event_text' => trim($_POST['body'])
                ];

                $lastId = $this -> postModel -> postEvent($data);
                
                if($lastId > 0){
                    // Step 2 - After adding the $data of step 1, then we want to make sure to insert another query to the event_users table 
                    foreach($_POST['members'] as $post) {
                        $data = [ 
                            'user_email' => $post,
                            'event_id' => $lastId,
                            'event_status' => 'PENDING'
                        ];

                        if($this -> postModel -> postEventUsers($data)){
                        } else {
                            die('Something went wrong');
                        }
                    }
                } else {
                    die('Something went wrong');
                }

                $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                $users = $this -> adminModel -> getUsers();
                $data = [
                    'admin' => $isAdmin,
                    'user' => $user,
                    'users' => $users
                ];

                $this -> view('pages/admin/post_event', $data);
            } else {
                $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                $users = $this -> adminModel -> getUsers();
                $data = [
                    'admin' => $isAdmin,
                    'user' => $user,
                    'users' => $users
                ];

                $this -> view('pages/admin/post_event', $data);
            }

            
        }

         public function usersReported() {
            $getUsersReported = $this -> userModel -> getUsersReported();
            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
            $users = $this -> adminModel -> getUsers();
            
            $data = [
                'admin' => $isAdmin,
                'user' => $user,
                'users' => $users,
                'users_reported' => $getUsersReported
            ];
            $this -> view('pages/admin/user_reported', $data);
        }

        public function sortUserByIdAsc() {
             if($this -> postModel -> orderByUsersIdAscend()){

                $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                $users = $this -> adminModel -> getUsers();

                $sortUserByIdAsc = $this -> postModel -> orderByUsersIdAscend();

                $data = [
                    'admin' => $isAdmin,
                    'user' => $user,
                    'users' => $users,
                    'users_reported_by_id_asc' => $sortUserByIdAsc
                ];

                $this -> view('pages/admin/user_reported', $data);
            } else {
                die('Something went wrong');
            }
        }

        public function sortUserByIdDesc() {
             if($this -> postModel -> orderByUsersIdDescend()){
                $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                $users = $this -> adminModel -> getUsers();
                $sortUserByIdAsc = $this -> postModel -> orderByUsersIdDescend();

                $data = [
                    'admin' => $isAdmin,
                    'user' => $user,
                    'users' => $users,
                    'users_reported_by_id_desc' => $sortUserByIdAsc
                ];

                $this -> view('pages/admin/user_reported', $data);
            } else {
                die('Something went wrong');
            }
        }

        public function sortNameAsc() {
            if($this -> postModel -> orderByNameAsc()){
                            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                            $users = $this -> adminModel -> getUsers();
                            $sortUserByIdAsc = $this -> postModel -> orderByNameAsc();

                            $data = [
                                'admin' => $isAdmin,
                                'user' => $user,
                                'users' => $users,
                                'users_reported_by_id_desc' => $sortUserByIdAsc
                            ];

                            $this -> view('pages/admin/user_reported', $data);
               } else {
                die('Something went wrong');
            }
        }

        public function sortNameDesc() {
             if($this -> postModel -> orderByNameDesc()){
                            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                            $users = $this -> adminModel -> getUsers();
                            $sortUserByIdAsc = $this -> postModel -> orderByNameDesc();

                            $data = [
                                'admin' => $isAdmin,
                                'user' => $user,
                                'users' => $users,
                                'users_reported_by_id_desc' => $sortUserByIdAsc
                            ];

                            $this -> view('pages/admin/user_reported', $data);
               } else {
                die('Something went wrong');
            }
        }

        public function sortEmailAsc() {
            if($this -> postModel -> orderByEmailAsc()){
                            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                            $users = $this -> adminModel -> getUsers();
                            $sortUserByIdAsc = $this -> postModel -> orderByNameAsc();

                            $data = [
                                'admin' => $isAdmin,
                                'user' => $user,
                                'users' => $users,
                                'users_reported_by_id_desc' => $sortUserByIdAsc
                            ];

                            $this -> view('pages/admin/user_reported', $data);
               } else {
                die('Something went wrong');
            }
        }

        public function sortEmailDesc() {
            if($this -> postModel -> orderByEmailDesc()){
                            $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                            $user = $this -> adminModel -> getUser($_SESSION['user_id']);
                            $users = $this -> adminModel -> getUsers();
                            $sortUserByIdAsc = $this -> postModel -> orderByNameAsc();

                            $data = [
                                'admin' => $isAdmin,
                                'user' => $user,
                                'users' => $users,
                                'users_reported_by_id_desc' => $sortUserByIdAsc
                            ];

                            $this -> view('pages/admin/user_reported', $data);
               } else {
                die('Something went wrong');
            }
        }

    }
?>
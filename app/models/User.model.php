<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query("INSERT INTO users (image, name, email , password, status, active) 
                        VALUES (:image, :name, :email, :password, :status, :active)");

      // Bind Values
      $this -> db -> bind(':image', $data['image']);
      $this -> db -> bind(':name', $data['name']);
      $this -> db -> bind(':email', $data['email']);
      $this -> db -> bind(':password', $data['password']);
      $this -> db -> bind(':status', 'unbanned');
      $this -> db -> bind(':active', 'enabled');
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Email
    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function login($email, $password){
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      
      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    public function unauthorizedAdminLogin() {
      
    }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getUserIdFromBlogComment() {
      $this -> db -> query("SELECT ");
    }

    public function getAllusersById() {
      $this -> db -> query("SELECT id from users");
      return $this -> db -> resultSet();           
    }

    public function getUsersByIdFromEmail($email) {
      $this -> db -> query("SELECT id from users WHERE email = :email");

      $this -> db -> bind(':email', $email);
      $row = $this->db->single();

      return $row -> id;
    }

    public function usersIsPending($email) {
      $this -> db -> query('INSERT INTO events (event_pending) VALUES(:event_pending)');

      $this -> db -> bind('event_pending', $email);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getCurrentUserLoggedIn($id) {
      $this -> db -> query("SELECT * FROM users WHERE id = :id");
      $this -> db -> bind(':id', $id);
      
      return $result = $this -> db -> single();
    }

    public function changeRole($id, $roleValue) {
      $this -> db -> query("UPDATE users SET role = :role WHERE id = :id");
      $this -> db -> bind(':id', $id);
      $this -> db -> bind(":role", $roleValue);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function changeStatus($id, $statusValue) {
      $this -> db -> query("UPDATE users SET status = :status WHERE id = :id");
      $this -> db -> bind(':id', $id);
      $this -> db -> bind(":status", $statusValue);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function changeActiveStatus($id, $activeValue) {
      $this -> db -> query("UPDATE users SET active = :status WHERE id = :id");
      $this -> db -> bind(':id', $id);
      $this -> db -> bind(":status", $activeValue);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function isBanned($email){
      $this->db->query("SELECT * FROM users WHERE email = :email AND status = 'banned'");
      $this->db->bind(':email', $email);

      return $this->db->single();
    }

    public function userIsDisabled($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email AND active = 'disabled'");

        $this -> db -> bind(':email', $email);

        return $this->db->single();
    }

    public function disableUser($data) {
      $this -> db -> query('UPDATE users SET active = :disable WHERE id = :user_id');
      
      $this -> db -> bind(':user_id', $data['user_id']);
      $this -> db -> bind(':disable', $data['disable']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    public function getUsersReported() {
        $this -> db -> query("SELECT * 
                              FROM report_users AS ru 
                              INNER JOIN blog_comments AS bc 
                              INNER JOIN posts AS p 
                              INNER JOIN users AS u
                              WHERE ru.report_from_post_id = bc.blog_id 
                              AND bc.blog_post_id = p.id
                              AND bc.blog_user_id = u.id");
        return $this -> db -> resultSet();           
    }

    public function orderByUsersIdAscend (){
      $this -> db -> query('SELECT id FROM users ORDER BY id ASC');
      return $this -> db -> resultSet();
    }

    public function orderByUsersIdDescend (){
      $this -> db -> query('SELECT id FROM users ORDER BY id DESC');
      return $this -> db -> resultSet();
    }

    public function changeStatusEventUser($data) {
      
      $this -> db -> query("UPDATE event_users SET event_status = :event_status WHERE user_email = :user_email AND event_id = :event_id ");
      
      $this -> db -> bind(':user_email', $data['user_email']);
      $this -> db -> bind(':event_id', $data['event_id']);
      $this -> db -> bind(':event_status', $data['event_status']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
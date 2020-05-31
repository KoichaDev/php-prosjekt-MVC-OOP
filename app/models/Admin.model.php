<?php 

    class Admin {
        private $db;
        
        public function __construct() {
            $this -> db = new Database();
        }
        
        public function getPosts() {
            $this -> db -> query("SELECT * FROM posts");
            return $result = $this -> db -> resultSet();
        }

        public function getRegularUserPost($id) {
            $this -> db -> query('SELECT * FROM posts WHERE author_id = :id');
            $this -> db -> bind(':id', $id);
            return $this -> db -> resultSet();           
        }

        public function addPost($data) {
             // Prepare Query
            $this->db->query('INSERT INTO posts (author_id, image, title, text) VALUES (:author_id, :image, :title, :body)');

            // Bind Values
            $this -> db -> bind(':author_id', $data['user_id']);
            $this -> db ->bind(':image', $data['image']);
            $this -> db ->bind(':title', $data['title']);
            $this -> db ->bind(':body', $data['body']);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Update Post
        public function updatePost($data){
            // Prepare Query
            $this->db->query('UPDATE posts SET title = :title, text = :body WHERE id = :id');

            // Bind Values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Delete Post
        public function deletePost($id){
            // Prepare Query
            $this->db->query('DELETE FROM posts WHERE id = :id');
            // Bind Values
            $this->db->bind(':id', $id);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getPostById($id){
            $this->db->query("SELECT * FROM posts WHERE id = :id");

            $this->db->bind(':id', $id);
            
            $row = $this->db->single();

            return $row;
        }


        public function getUser($id) {
            $this -> db -> query("SELECT * FROM users WHERE id = :id");
            $this -> db -> bind(':id', $id);
            if($this -> db -> execute()) {
                return $result = $this -> db -> single();
            } else {
                return false;
            }
        }

        public function getUsers() {
            $this -> db -> query("SELECT * FROM users");
            return $result = $this -> db -> resultSet();
        }

        public function deleteUser($id) {
            // Prepare Query
            $this->db->query('DELETE FROM users WHERE id = :id');
            // Bind Values
            $this->db->bind(':id', $id);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function isAdmin($id) {
            $this -> db -> query('SELECT * FROM users WHERE id = :id');
            $this -> db -> bind(':id', $id);
            
            if($this -> db -> execute()) {
                $result = $this -> db -> single();
                return $result && $result -> role === 'admin';
            } else {
                return false;
            }
        }

        public function sendPrivateMessage($data) {
            // Prepare Query
            $this->db->query(
                'INSERT INTO messages (msg_from_id_user, msg_from_user_email, msg_to_user_email, msg_title, msg_text) 
                 VALUES (:msg_from_id_user, :msg_from_user_email  ,:to_user, :msg_title, :body)');

            // Bind Values
            $this -> db -> bind(':msg_from_id_user', $data['user_id']);
            $this -> db -> bind(':msg_from_user_email', $data['from_user']);
            $this -> db -> bind(':to_user', $data['to_user']);
            $this -> db -> bind(':msg_title', $data['title']);
            $this -> db -> bind(':body', $data['body']);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getInboxMessages($id) {
            $this -> db -> query('SELECT * 
                                  FROM messages 
                                  WHERE msg_from_id_user != :user_id');

            $this -> db -> bind(':user_id', $id);
            
            if($this -> db -> execute()) {
                return $result = $this -> db -> resultSet();
            } else {
                return false;
            }
        }

        public function readMessage($id) {
            $this -> db -> query("SELECT * FROM messages WHERE msg_id = :id");

            $this -> db -> bind(':id', $id);
            
            if($this -> db -> execute()) {
                return $result = $this -> db -> single();
            } else {
                return false;
            }
        }

        public function deleteSingleMessage($id) {
            $this->db->query('DELETE FROM messages WHERE msg_id = :id');
            
            $this->db->bind(':id', $id);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>
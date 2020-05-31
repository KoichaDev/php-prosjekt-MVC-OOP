<?php 
    class Post {
        private $db; 

        public function __construct() {
            $this -> db = new Database;
        }

        public function getPosts() {
            $this -> db -> query("SELECT * FROM posts");
            return $result = $this -> db -> resultSet();
        }

        public function getPostId($id) {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function getBlogPostID($id) {
            $this -> db -> query('SELECT id
                                  FROM blog_comments as b INNER JOIN posts AS p
                                  WHERE b.blog_id_comments_from_post = p.id
                                  AND b.blog_id = :id
                                  GROUP BY id');
            $this -> db -> bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function getBlogPosts($id) {
            $this -> db -> query('SELECT * 
                                  FROM blog_comments AS b, users as u 
                                  WHERE b.blog_user_id = u.id 
                                  AND blog_id_comments_from_post = :id
                                  ORDER BY b.blog_text DESC');
            $this -> db -> bind(':id', $id);
            return $this -> db -> resultSet();
        }

        public function postBlog($data) {
            $this -> db -> query(
                'INSERT INTO blog_comments (blog_post_id, blog_user_id, blog_user_name, blog_text, blog_id_comments_from_post ,blog_published_date)
                 VALUES (:blog_post_id, :user_id, :blog_user_name, :blog_text, :blog_id_comments_from_post, NOW())');
            
            $this -> db -> bind(':blog_post_id', $data['blog_id']);
            $this -> db -> bind(':user_id', $data['user_id']);
            $this -> db -> bind(':blog_user_name', $data['user_name']);
            $this -> db -> bind(':blog_text', $data['blog_text']);
            $this -> db -> bind('blog_id_comments_from_post', $data['blog_id_site']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Report blog user function
        public function reportUserId($id) {
            $this -> db -> query("SELECT blog_user_id FROM blog_comments WHERE blog_id = :id");

            $this -> db -> bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }        

        // Report the user to the Database
        public function reportUser($data) {
            $this -> db -> query("INSERT INTO report_users (report_user_id, report_from_post_id, report_reason, report_count, report_date)
                                  VALUES(:report_user_id ,:report_from_post_id, :report_reason, :report_count, NOW())");

            $this -> db -> bind(':report_user_id', $data['report_user_id']);
            $this -> db -> bind(':report_from_post_id', $data['report_from_post_id']);
            $this -> db -> bind(':report_reason', $data['report_reason']);
            $this -> db -> bind(':report_count', $data['report_count']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteBlogPost($id) {
             $this->db->query('DELETE FROM blog_comments WHERE blog_id = :id');
            // Bind Values
            $this->db->bind(':id', $id);
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function getEventPost($id) {
            $this -> db -> query("SELECT * FROM events WHERE event_post_id = :id");

            $this -> db -> bind(':id', $id);

            return $this -> db -> single();
        }

        public function getEventUserStatus($id) {
            $this -> db -> query("SELECT * 
                                  FROM events AS e
                                  INNER JOIN event_users AS eu
                                  WHERE e.event_post_id = eu.event_id
                                  AND e.event_post_id = :id");
            $this -> db -> bind(':id', $id);
            return $this -> db -> resultSet();
        }

        public function getEventPosts() {
            $this -> db -> query('SELECT * FROM events');
            return $this -> db -> resultSet();
        }

        public function postEvent($data) {
            $this -> db -> query('INSERT INTO events (event_author_id, event_author_post, event_image, event_title, event_text) 
                                  VALUES (:event_author_id, :event_author_post, :event_image, :event_title, :event_text)');
            
            $this -> db -> bind(':event_author_id', $data['event_author_id']);
            $this -> db -> bind(':event_author_post', $data['event_author_post']);
            $this -> db -> bind(':event_image', $data['event_image']);
            $this -> db -> bind(':event_title', $data['event_title']);
            $this -> db -> bind(':event_text', $data['event_text']);
          
            //Execute
            if($this -> db -> execute()){
                return $this -> db -> getLastId();
            } else {
                return 0;
            }
        }

        public function postEventUsers($data) {
            $this -> db -> query("INSERT INTO event_users (user_email, event_id) VALUES(:user_email, :event_id)");

            $this -> db -> bind(':user_email', $data['user_email']);
            $this -> db -> bind(':event_id', $data['event_id']);

             //Execute
            if($this -> db -> execute()){
                return true;
            } else {
                return false;
            }
        }

        public function orderByUsersIdAscend (){
            $this -> db -> query('SELECT * 
                                  FROM report_users AS ru 
                                  INNER JOIN blog_comments AS bc 
                                  INNER JOIN posts AS p 
                                  INNER JOIN users AS u
                                  WHERE ru.report_from_post_id = bc.blog_id 
                                  AND bc.blog_post_id = p.id
                                  AND bc.blog_user_id = u.id
                                  ORDER BY report_user_id DESC');
            return $this -> db -> resultSet();
        }

        public function orderByUsersIdDescend (){
            $this -> db -> query("SELECT * 
                                  FROM report_users AS ru 
                                  INNER JOIN blog_comments AS bc 
                                  INNER JOIN posts AS p 
                                  INNER JOIN users AS u
                                  WHERE ru.report_from_post_id = bc.blog_id 
                                  AND bc.blog_post_id = p.id
                                  AND bc.blog_user_id = u.id
                                  ORDER BY report_user_id ASC");
            return $this -> db -> resultSet();
        }

        public function orderByNameAsc() {
             $this -> db -> query('SELECT * 
                                   FROM report_users AS ru 
                                   INNER JOIN blog_comments AS bc 
                                   INNER JOIN posts AS p 
                                   INNER JOIN users AS u
                                   WHERE ru.report_from_post_id = bc.blog_id 
                                   AND bc.blog_post_id = p.id
                                   AND bc.blog_user_id = u.id
                                   ORDER BY name ASC');
            return $this -> db -> resultSet();
        }

         public function orderByNameDesc() {
             $this -> db -> query('SELECT * 
                                   FROM report_users AS ru 
                                   INNER JOIN blog_comments AS bc 
                                   INNER JOIN posts AS p 
                                   INNER JOIN users AS u
                                   WHERE ru.report_from_post_id = bc.blog_id 
                                   AND bc.blog_post_id = p.id
                                   AND bc.blog_user_id = u.id
                                   ORDER BY name DESC');
            return $this -> db -> resultSet();
        }

        public function orderByEmailAsc() {
             $this -> db -> query('SELECT * 
                                   FROM report_users AS ru 
                                   INNER JOIN blog_comments AS bc 
                                   INNER JOIN posts AS p 
                                   INNER JOIN users AS u
                                   WHERE ru.report_from_post_id = bc.blog_id 
                                   AND bc.blog_post_id = p.id
                                   AND bc.blog_user_id = u.id
                                   ORDER BY email ASC');
            return $this -> db -> resultSet();
        }

        public function orderByEmailDesc() {
             $this -> db -> query('SELECT * 
                                   FROM report_users AS ru 
                                   INNER JOIN blog_comments AS bc 
                                   INNER JOIN posts AS p 
                                   INNER JOIN users AS u
                                   WHERE ru.report_from_post_id = bc.blog_id 
                                   AND bc.blog_post_id = p.id
                                   AND bc.blog_user_id = u.id
                                   ORDER BY email DESC');
            return $this -> db -> resultSet();
        }

        public function getUsersEvent() {
            $this -> db -> query("SELECT * 
                                  FROM event_users AS eu
                                  INNER JOIN events AS e
                                  WHERE eu.event_id = e.event_post_id
                                 ");
            return $this -> db -> resultSet();
        }
    }
?>


<?php 
    class Pages extends Controller {
        public function __construct() {
            $this -> postModel = $this -> model('Post');
            $this -> userModel = $this -> model('User');
            $this -> adminModel = $this -> model('Admin');
        }
        
        // We need to use this index method as default, otherwise we will get an error from the Core 
        // of call_user_func_array that wants something to have call back function
        public function index() {
            $blogPosts = $this -> postModel -> getPosts();

            $data = [
                'title_blog' => 'Siste blogg!',
                'title_recent_news' => 'Siste nytt',
                'posts' => $blogPosts
            ];

            $this -> view('pages/index', $data);
        }

        public function banned() {
            $data = [];
            $this -> view('pages/banned', $data);
        }

        public function about() {
            $data = [
                'title' => 'Welcome to About!'
            ];
            $this -> view('pages/about', $data);
        }

        public function blog($id) {
   
           if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize Post Array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // POST Form data for modal
                if(isset($_POST['report_user'])) {

                    $getUserId = $this -> postModel -> reportUserId($_POST['report_blog_id']);
                    $originalUserPostedId = $getUserId -> blog_user_id;

                    $data = [
                        'report_user_id' => $originalUserPostedId,
                        'report_from_post_id' => $_POST['report_blog_id'],
                        'report_reason' => $_POST['report_user'],
                        'report_count' => 1,
                        'report_role' => 'reported'
                    ];

                    // Make sure no errors
                    if(empty($data['blog_text_err'])) {
                        if($this -> postModel -> reportUser($data)){
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load the view with errors
                        $this -> view('pages/blog', $data);
                    }  


                }

                // POST form data for commenting a new post for a blog
                if(isset($_POST['blog_text'])) {
                    $data = [
                        'blog_id' => $id,
                        'user_id' => $_SESSION['user_id'],
                        'user_name' => $_SESSION['user_name'],
                        'blog_text' => trim($_POST['blog_text']),
                        'blog_id_site' => $id,
                        'blog_text_err' => ''
                    ];
                    
                    // Make sure no errors
                    if(empty($data['blog_text_err'])) {
                        if($this -> postModel -> postBlog($data)){
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load the view with errors
                        $this -> view('pages/blog', $data);
                    }  
                }

                             
            } else {
                // temporarily values for session of user_id 
                $isAdmin = 0;
                $currentUserLoggedIn = 0;

                if(isset($_SESSION['user_id'])) {
                    $isAdmin = $this -> adminModel -> isAdmin($_SESSION['user_id']);
                    $currentUserLoggedIn = $this -> userModel -> getCurrentUserLoggedIn($_SESSION['user_id']);                    
                }
                $post = $this->postModel->getPostId($id);
                    $blogPosts = $this -> postModel -> getBlogPosts($id);

                    $data = [
                        "id" => $id,
                        "admin" => $isAdmin,
                        "blogs" => $blogPosts,
                        'post' => $post,
                        "current_user" => $currentUserLoggedIn
                    ];
        
                    $this -> view('pages/blog', $data);
            }    
            $isAdmin = 0;
            $currentUserLoggedIn = 0;

            if(isset($_SESSION['user_id'])) {
                $isAdmin = $this -> adminModel -> isAdmin(isset($_SESSION['user_id']));
                $currentUserLoggedIn = $this -> userModel -> getCurrentUserLoggedIn($_SESSION['user_id']);
            }
            $post = $this->postModel->getPostId($id);
            $blogPosts = $this -> postModel -> getBlogPosts($id);

            $data = [
                "id" => $id,
                "admin" => $isAdmin,
                "blogs" => $blogPosts,
                'post' => $post,
                "current_user" => $currentUserLoggedIn
            ];

            $this -> view('pages/blog', $data);
        }

        public function deleteBlogComment($id) {
            // Query to check the blog comment and match the comment to get the specific blog id
            $getId = $this -> postModel -> getBlogPostID($id);
            $blogId = $getId -> id;

            // Delete the blog comment
            if($this -> postModel -> deleteBlogPost($id)){
                // We want to get the original URL Address after we deleted the post
                $url = URLROOT . "/pages/deleteblogcomment/" . $id;

                 // If the URL match                 
                 if($url) {
                    // Then we want to redirect back to the original page
                    redirect("pages/blog/{$blogId}");
                 }
                  die('diie');
            } else {
                die('Something went wrong');
            }
        }

        public function event() {
            $getPostEvents = $this -> postModel -> getEventPosts();
            $data = [
                "event_title" => 'Current On Going Event',
                "posts" => $getPostEvents
            ];
            $this -> view('pages/event', $data);
        }

        public function eventPost($id) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize Post Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $getEventUserStatus = $this -> postModel -> getEventUserStatus($id);
            $post = $this -> postModel -> getEventPost($id);
            $data = [
                'post' => $post,
                "user_status" => $getEventUserStatus
            ];
                       
            } else {
                $getEventUserStatus = $this -> postModel -> getEventUserStatus($id);
                $post = $this -> postModel -> getEventPost($id);

                $data = [
                    'post' => $post,
                    "user_status" => $getEventUserStatus
                ];
                
                $this -> view('pages/eventpost', $data);
            }
        }

        public function eventGoing($id, $status) {         
            $data = [
                'event_id' => $id,
                'user_email' => $_SESSION['user_email'],
                'event_status' => $status
            ];
        
            if($this -> userModel -> changeStatusEventUser($data)){
                redirect('pages/eventpost/' . $id);
            } else {
                die('Something went wrong');
            }
        }
    }   
?>
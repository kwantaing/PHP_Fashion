<?php

class PostController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function newPostPOST() {
        if(!isset($_SESSION)) {
            session_start();
        }
        before_every_protected_page(); //Vincent
        $valid = true;
        if(strpos($_POST['post_title'],';')!==false || strpos($_POST['post_title'],'\'')!==false
        ||strpos($_POST['article_type'],';')!==false || strpos($_POST['article_type'],'\'')!==false
        ||strpos($_POST['post_msg'],';')!==false || strpos($_POST['post_msg'],'\'')!==false)
        {
            //potential SQL injection check
            $postErr[] = "Potential SQL injection attack";
            $valid = false;
        }
        //CSRF Token Check
        $CSRFStatus = csrf_token_is_valid();
        if($CSRFStatus !=== true){
          $postErr[] = "CSRF Token not valid";
          $valid = false;
        }

        //File upload and validation
        $_SESSION['post_img'] = sanitize_file_name($_FILES["img_attachment"]["name"]);
        upload_file('img_attachment');

        //if everything is valid, execute
        if($valid === true) {
            //$_SESSION['post_img'] = sanitize_file_name($_FILES["img_attachment"]["name"]);
            $vm = PostVM::newPostInstance();
            if($vm->postType == PostVM::VALID_POST) {
                //upload_file('img_attachment');
                Page::$title = 'Post Details';
                if(PostVM::getLastCreated()===false) {
                    require('views/newPost.php');
                }else{
                    $current_post = PostVM::getLastCreated();
                    if(!isset($_SESSION)) {
                        session_start();
                    }
                    require(APP_NON_WEB_BASE_DIR . 'views/PostDetail.php');
                }
            }else {
                Page::$title = 'New Post';
                if(!isset($_SESSION)) {
                    session_start();
                }
                require(APP_NON_WEB_BASE_DIR . 'views/newPost.php');
            }

        }else {
            Page::$title = 'New Post';
            if(!isset($_SESSION)) {
                session_start();
            }
            require(APP_NON_WEB_BASE_DIR . 'views/newPost.php');

        }
    }

    public function newPostGET(){
        if(!isset($_SESSION)) {
            session_start();
        }
        before_every_protected_page();
        //check session logged in
        //if session in

        require(APP_NON_WEB_BASE_DIR . 'views/newPost.php');
    }

    public function readPost($post_id) {
        if(!isset($_SESSION)) {
            session_start();
        }
        before_every_protected_page();//Vincent
        $post_vm = PostVM::getPostInstance($post_id);
        $current_post = $post_vm->post_obj;
<<<<<<< Updated upstream

        //before_every_protected_page();
=======
        unset($_SESSION['post_id']);

        before_every_protected_page();
>>>>>>> Stashed changes
        if(!isset($_SESSION)) {
            session_start();
        }
        require(APP_NON_WEB_BASE_DIR . 'views/PostDetail.php');
    }
    public function readPosts() {
        if(!isset($_SESSION)) {
            session_start();
        }
    }

    // public function featured(){
    //     session_start();
    //     //check session logged in
    //     before_every_protected_page();
    //     //if session in
    //     require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    // }

}

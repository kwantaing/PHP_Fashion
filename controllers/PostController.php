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
        $valid = true;
        if(strpos($_POST['post_title'],';')!==false || strpos($_POST['post_title'],'\'')!==false        
        ||strpos($_POST['article_type'],';')!==false || strpos($_POST['article_type'],'\'')!==false
        ||strpos($_POST['post_msg'],';')!==false || strpos($_POST['post_msg'],'\'')!==false)
        {
            //potential SQL injection check
            $postErr[] = "Potential SQL injection attack";
            $valid = false;
        }
        if($valid === true) {
            $_SESSION['post_img'] = sanitize_file_name($_FILES["img_attachment"]["name"]);
            $vm = PostVM::newPostInstance();
            if($vm->postType == PostVM::VALID_POST) {
                upload_file('img_attachment');
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

    public function readPost() {
        if(!isset($_SESSION)) {
            session_start();
        }
        $post_vm = PostVM::getPostInstance($_SESSION['post_id']);
        $current_post = $post_vm->post_obj;
        unset($_SESSION['post_id']);
        
        before_every_protected_page();
        if(!isset($_SESSION)) {
            session_start();
        }
        require(APP_NON_WEB_BASE_DIR . 'views/PostDetail.php');
    }

    // public function featured(){
    //     session_start();
    //     //check session logged in
    //     before_every_protected_page();
    //     //if session in
    //     require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    // }
        
}

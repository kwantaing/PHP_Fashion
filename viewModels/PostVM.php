<?php

class PostVM {
    public $postType;

    const VALID_POST = 'valid_post';
    const INVALID_POST = 'invalid_post';


    public function __construct() {
        $this->postDAM = new PostDAM();
    }

    public static function newPostInstance() {
        $vm = new self();
        $post_id = '';
        $valid = true;
        $post_user = $_SESSION['userName'];
        //$post_title = filter_input(INPUT_POST, 'post_title');
        //$article_type = filter_input(INPUT_POST, 'article_type');

        $post_title =  hPOST('post_title'); //Vincent
        $article_type = hPOST('article_type');

        $post_img = $_SESSION['post_img'];
        unset($_SESSION['post_img']);
        // sanitize_file_name($_POST['img_attachment']['name']);
        //$post_msg = filter_input(INPUT_POST,'post_msg');

        $post_msg = hPOST('post_msg');  //Vincent

        if($post_user === null or $post_title === null  or $article_type === null or $post_msg === null) {
            $valid = false;
            echo "ERROR";
            $vm->postType = self::INVALID_POST;
        } else{
            $valid = true;
            $newPostArray = array(
                'post_id' => $post_id,
                'post_title' => $post_title,
                'post_user' => $post_user,
                'article_type' => $article_type,
                'post_img' => $post_img,
                'post_msg' => $post_msg
            );

            if($valid === true) {
                $vm->post = new Post($newPostArray);
                $vm->postDAM->newPostCreate($vm->post);
                $vm->postType = self::VALID_POST;
            }else{
                $vm->postType = self::INVALID_POST;
            }
        }
        return $vm;
    }

    public static function getPostInstance($post_id) {
        $vm = new self();
        $vm->post_obj = $vm->postDAM->readPost($post_id);
        return $vm;
    }

    public static function getLastNine() {
        $vm = new self();
        $vm->ObjectArray = $vm->postDAM->getlastNine();
        return $vm;
    }
    public static function getLastCreated() {
        $vm = new self();
        $vm->post_obj = $vm->postDAM->getLastCreated();
        if($vm->post_obj === false) {
            return false;
        }else  {
            return $vm->post_obj;
        }
    }
}

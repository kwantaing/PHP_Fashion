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
        $clothing_type = filter_input(INPUT_POST, 'clothing_type');
        $post_img = $_POST['post_img'];
        $post_msg = filter_input(INPUT_POST,'post_msg');
        if($post_user ===null or $clothing_type === null or $post_img === null or $post_msg === null) {
            $valid = false;
        } else{
            $newPostArray = array(
                'post_id' => $post_id,
                'post_user' => $post_user,
                'clothing_type' => $clothing_type,
                'post_img' => $post_img,
                'post_msg' => $post_msg
            );

            if($valid === true) {
                $vm->post = new Post($newPostArray);
                $vm->postDAM->newPostCreate($vm->post);
            }
            if(valid===false) {
                $vm->postType = self::INVALID_POST;
                return false;
            }else{
                $vm->postType = self::VALID_POST;
                return $vm;
            }
        }
    }
}
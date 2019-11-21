<?php 


class PostDAM extends DAM {

    function __construct() {
        parent::__construct();
    }

    public function newPostCreate($post) {
        $query = 'INSERT INTO Posts (post_user, clothing_type, post_img, post_msg)
                  VALUES (:post_user, :clothing_type, :post_img, :post_msg)';
        $statement = $this->db->prepare($query);
        $this->bindValues($post,$statement);
        $statement->execute();
        $statement->closeCursor();
    }
    
    
    private function bindValues($post, $statement) {
        $statement->bindValue(':post_user', $post->post_user);
        $statement->bindValue(':clothing_type', $post->clothing_type);
        $statement->bindValue(':post_img', $post->post_img);
        $statement->bindValue(':post_msg', $post->post_msg);
    }

    private function mapColsToVars($colArray) {
        $varArray = array();
        foreach ($colArray as $key => $value) {
            if ($key == 'post_id') {
                $varArray ['post_id'] = $value;
            } else if ($key == 'post_user') {
                $varArray ['post_user'] = $value;
            } else if ($key == 'clothing_type') {
                $varArray ['clothing_type'] = $value;
            } else if ($key == 'post_img') {
                $varArray ['post_img'] = $value;
            } else if ($key == 'post_msg') {
                $varArray ['post_msg'] = $value;
            }
        }
        return $varArray;
    }
}
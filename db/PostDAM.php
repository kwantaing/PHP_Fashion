<?php 


class PostDAM extends DAM {

    function __construct() {
        parent::__construct();
    }

    public function newPostCreate($post) {
        $query = 'INSERT INTO Posts (post_user, post_title, article_type, post_img, post_msg)
                  VALUES (:post_user, :post_title, :article_type, :post_img, :post_msg)';
        $statement = $this->db->prepare($query);
        $this->bindValues($post,$statement);
        $statement->execute();
        $statement->closeCursor();
    }
    
    
    private function bindValues($post, $statement) {
        echo var_dump($post);
        $statement->bindValue(':post_user', $post->post_user);
        $statement->bindValue(':post_title', $post->post_title);
        $statement->bindValue(':article_type', $post->article_type);        
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
            } else if ($key == 'post_title') {
                $varArray ['post_title'] = $value;
            } else if ($key == 'article_type') {
                $varArray ['article_type'] = $value;
            } else if ($key == 'post_img') {
                $varArray ['post_img'] = $value;
            } else if ($key == 'post_msg') {
                $varArray ['post_msg'] = $value;
            }
        }
        return $varArray;
    }
}
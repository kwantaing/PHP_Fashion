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
    
    public function readPost($post_id){
        $query = 'SELECT * FROM Posts where post_id = :post_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':post_id', $post_id);
        $statement->execute();
        $post_obj = $statement->fetch();
        $statement->closeCursor();
        if($post_obj === null) {
            //no post with that id
        }else {
            return new Post($this->mapColsToVars($post_obj));
        }
    }
    public function getLastCreated(){
        $query = 'SELECT * FROM Posts WHERE post_id = (SELECT LAST_INSERT_ID())';
        // select *from LastInsertedRow where Id=(SELECT LAST_INSERT_ID());
        $statement = $this->db->prepare($query);
        $statement->execute();
        $post_obj = $statement->fetch();
        $statement->closeCursor();
        if($post_obj === null) {
            //no post with that id
            return false;
        }else {
            return new Post($this->mapColsToVars($post_obj));
        }
    }
    
    private function bindValues($post, $statement) {
        $statement->bindValue(':post_user', $post->post_user);
        $statement->bindValue(':post_title', $post->post_title);
        $statement->bindValue(':article_type', $post->article_type);        
        $statement->bindValue(':post_img', $post->post_img);
        $statement->bindValue(':post_msg', $post->post_msg);
    }

    public function wipeInvalidupload() {
        $query = 'DELETE FROM Posts WHERE post_id = (SELECT LAST_INSERT_ID())';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getlastNine(){
        $query = "SELECT * FROM Posts ORDER BY post_id DESC LIMIT 9";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $ObjectArray = [];
        while ($obj = $statement->fetchObject(__CLASS__)){
            $ObjectArray[$obj->post_id] = $obj;
        }
        $statement->closeCursor();
        // echo var_dump($ObjectArray);
        return $ObjectArray;

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
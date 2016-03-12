<?php

class Viewid_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getComments($id) {
        $query = $this->db->where('for_id', $id)
                ->get('comments');
        return $query->result_array();
    }

    public function getLastComments() {
        $query = $this->db->select('comments.for_id,comments.name,posts.title')
                ->limit(10)
                ->order_by("comments.date", "desc")
                ->join('posts', 'posts.id = comments.for_id')
                ->get('comments');
        return $query->result_array();
    }

    public function setComment($post) {
        $result=$this->db->insert('comments', $post);
    }

}

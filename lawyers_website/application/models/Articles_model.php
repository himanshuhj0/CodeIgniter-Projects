<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getArticles($category) {
        $this->db->where('category', $category);
        $this->db->where('visibility', 1);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getOneArticle($id) {
        $this->db->where('id', $id);
        $this->db->where('visibility', 1);
        $query = $this->db->get('articles');
        return $query->row_array();
    }

    public function getHomeRecent($category) {
        $this->db->where('category', $category);
        $this->db->where('visibility', 1);
        $this->db->limit(3);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

}

<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function articlesCount($category) {
    	$this->db->where('category', $category);
    	$this->db->where('visibility', 1);
    	return $this->db->count_all_results('articles');
    }

    public function getArticles($category, $limit = null, $start = null) {
        if($limit !== null && $start !== null) {
    		$this->db->limit($limit, $start);
    	}
        $this->db->where('category', $category);
        $this->db->where('visibility', 1);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getOneArticle($id) {
                if (is_numeric($where))
            $this->db->where('id', $where);
        else
            $this->db->where('category', $where);
        $this->db->where('visibility', 1);
        $query = $this->db->get('articles');
        return $query->row_array();
    }

}

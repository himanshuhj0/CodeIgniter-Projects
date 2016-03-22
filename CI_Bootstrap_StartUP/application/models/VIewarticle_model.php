<?php

class Viewarticle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getOneArticle($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('articles');
        return $query->row_array();
    }

}

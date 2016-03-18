<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHomeArticles() {
        $this->db->where('home_show', 1);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

}

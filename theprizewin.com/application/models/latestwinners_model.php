<?php

class Latestwinners_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all_results('latestwinners');
    }

    public function getWinners($per_page, $page) {
        $query = $this->db->limit($per_page, $page)
                ->order_by('timestamp', 'desc')
                ->get('latestwinners');
        return $query->result_array();
    }
}

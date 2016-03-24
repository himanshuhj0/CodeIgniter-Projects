<?php

class Buyandgetfree_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    public function record_count() {
        $this->db->where('visability', 'yes')
                ->where('timestamp >=', now())
                ->where('category', 'Buy and Get free');
        return $this->db->count_all_results('prizes');
    }

    public function Buyandgetfree($per_page, $page) {
        $query = $this->db
                ->where('visability', 'yes')
                ->where('timestamp >=', now())
                ->where('category', 'Buy and Get free')
                ->limit($per_page, $page)
                ->get('prizes');
        return $query->result_array();
    }

}

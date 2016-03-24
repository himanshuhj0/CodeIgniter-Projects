<?php

class Competitions_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    public function record_count($where) {
        if ($where != null) {
            $this->db->like($where['type'], $where['val']);
        }
        $this->db->where('visability', 'yes');
        return $this->db->count_all_results('prizes');
    }

    public function getPrizes($per_page, $page, $where, $sort) {
        if ($where != null) {
            $this->db->like($where['type'], $where['val']);
        }
        $query = $this->db->where('visability', 'yes')
                ->limit($per_page, $page)
                ->order_by($sort['column'], $sort['type'])
                ->get('prizes');
        return $query->result_array();
    }

    public function setEmail($email) {
        $this->db->where('email', $email);
        $num = $this->db->count_all_results('emails');
        if ($num == 0) {
            $data = array(
                'email' => $email
            );
            $this->db->insert('emails', $data);
            return 'Ready!';
        } else {
            return 'This Email is Allreary Taken!';
        }
    }

    public function getCategories() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function getCountries() {
        $query = $this->db->get('countries');
        return $query->result_array();
    }

    public function winprises() {
        $query = $this->db->select_sum('winprice')->get('prizes');
        return $query->result_array();
    }

}

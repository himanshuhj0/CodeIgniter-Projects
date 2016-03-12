<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function numRows($find = null) {
        if ($find != null) {
            $this->db->like('tags', $find);
        }
        return $this->db->count_all_results('posts');
    }

    public function getPost($limit, $start, $id = 0, $find = null) {
        if ($id > 0) {
            $this->db->where('id', $id);
        } elseif ($find != null) {
            $this->db->like('tags', $find);
        }
        $query = $this->db->limit($limit, $start)
                ->order_by("date", "desc")
                ->get('posts');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getTags() {
        $str = null;
        $query = $this->db->select('tags')
                ->limit(5)
                ->order_by("id", "random")
                ->get('posts');
        foreach ($query->result_array() as $val) {
            $str.= ',' . implode(',', $val);
        }
        return $str;
    }

}

<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function loginCheck($values) {
        $arr = array(
            'username' => $values['username'],
            'password' => md5($values['password']),
        );
        $this->db->where($arr);
        $result = $this->db->get('users');
        $res_arr = $result->row_array();
        return $res_arr;
    }

}

<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login_check($post) {
        $this->db->where($post);
        return $this->db->count_all_results('admins');
    }

}

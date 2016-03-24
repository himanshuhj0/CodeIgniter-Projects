<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserInfo($values) {
        $arr = array(
            'username' => $values['username'],
            'password' => md5($values['password']),
        );
        $result = $this->db->where($arr)->get('users');
        return $result->row_array();
    }

    public function setPost($post, $id) {
        if ($id == 0) {
            $this->db->insert('posts', $post);
        } else {
            $this->db->where('id', $id);
            $this->db->update('posts', $post);
        }
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $result = $this->db->where('id', $id)->delete('posts');
        return $result;
    }

    public function delete_comment($id) {
        $result = $this->db->where('id', $id)->delete('comments');
        return $result;
    }

}

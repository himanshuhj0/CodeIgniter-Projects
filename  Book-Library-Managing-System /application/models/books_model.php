<?php

class Books_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function record_count($filter) {
        if (!empty($filter['findbook'])) {
            $this->db->like('books.title', $filter['findbook']);
            $this->db->or_like('books.author', $filter['findbook']);
            $this->db->or_like('books.genre', $filter['findbook']);
        }
        return $this->db->count_all_results('books');
    }

    public function get_books($start, $limit, $filter) {
        $this->db->limit($start, $limit);
        if (!empty($filter['findbook'])) {
            $this->db->like('books.title', $filter['findbook']);
            $this->db->or_like('books.author', $filter['findbook']);
            $this->db->or_like('books.genre', $filter['findbook']);
        }
        $query = $this->db->get('books');
        return $query->result_array();
    }

    public function get_one($id, $info = null) {
        if ($info == true) {
            $this->db->select('books.*, users.*');
            $this->db->join('used_books', 'books.id = used_books.book_id', 'LEFT');
            $this->db->join('users', 'used_books.user_id = users.id', 'LEFT');
        }
        $this->db->where('books.id', $id);
        $query = $this->db->get('books');
        if ($info == true) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function getAutocomplete($searched) {
        $this->db->select('title');
        $this->db->like('title', $searched);
        $query = $this->db->get('books');
        return $query->row_array();
    }

    public function set_book($post, $id) {
        $post['year'] = strtotime($post['year']);
        if ($id != null) {
            $this->db->where('id', $id);
            return $this->db->update('books', $post);
        } else {
            return $this->db->insert('books', $post);
        }
    }

    public function del_book($id) {
        return $this->db->delete('books', array('id' => $id));
    }

}

<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function books_period($late) {
        $this->db->select('books.title,used_books.date_give,used_books.date_for_back,books.author,users.name,books.available,books.available_now');
        $this->db->from('used_books');
        $this->db->join('books', 'books.id = used_books.book_id');
        $this->db->join('users', 'users.id = used_books.user_id');
        if ($late == true) {
            $this->db->where('used_books.date_for_back < ', now());
        } else {
            $this->db->where('used_books.date_for_back > ', now());
        }
        $query = $this->db->get();
        return $query->result_array();
    }

}

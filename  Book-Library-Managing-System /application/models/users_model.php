<?php

class Users_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function record_count($filter) {
        if (!empty($filter['finduser'])) {
            $this->db->like('users.name', $filter['finduser']);
            $this->db->or_like('users.family', $filter['finduser']);
            $this->db->or_like('users.phone_number', $filter['finduser']);
            $this->db->or_like('users.email', $filter['finduser']);
        }
        return $this->db->count_all_results('users');
    }

    public function get_users($start, $limit, $filter) {
        $this->db->limit($start, $limit);
        $this->db->select('users.*, COUNT(used_books.book_id) as num_get_books');
        $this->db->from('users');
        $this->db->join('used_books', 'users.id = used_books.user_id', 'LEFT');
        if (!empty($filter['finduser'])) {
            $this->db->like('users.name', $filter['finduser']);
            $this->db->or_like('users.family', $filter['finduser']);
            $this->db->or_like('users.phone_number', $filter['finduser']);
            $this->db->or_like('users.email', $filter['finduser']);
        }
        $this->db->group_by('users.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_one($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_used_books($id) {
        $this->db->select('books.id, books.title, books.author, used_books.date_for_back, used_books.date_give, users.name, users.family,users.id as user_id');
        $this->db->from('books');
        $this->db->join('used_books', 'books.id = used_books.book_id');
        $this->db->join('users', 'users.id = used_books.user_id');
        $this->db->where('users.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_user($post, $id) {
        if ($id != null) {
            $this->db->where('id', $id);
            return $this->db->update('users', $post);
        } else {
            return $this->db->insert('users', $post);
        }
    }

    public function set_used_books($post) {
        if (!empty($post['added_books'])) {
            foreach ($post['added_books'] as $title) {
                $arr = explode('-todate-', $title);
                $res = $this->db->query('SELECT id FROM books WHERE title=' . $this->db->escape($arr[0]) . '');
                $id = $res->row_array();
                if ($id == null) {
                    return false;
                } else {
                    $this->db->query('UPDATE books SET available_now = available_now - 1 WHERE id=' . $id['id'] . '');
                    $this->db->query('INSERT INTO used_books SET user_id=' . $post['user_id'] . ', book_id=' . $id['id'] . ', date_give=' . now() . ', date_for_back=' . strtotime($arr[1]) . '');
                    return true;
                }
            }
        }
        if (!empty($post['deleted_books'])) {
            foreach ($post['deleted_books'] as $title) {
                $res = $this->db->query('SELECT id FROM books WHERE title=' . $this->db->escape($title) . '');
                $id = $res->row_array();
                if ($id == null) {
                    return false;
                } else {
                    $this->db->query('UPDATE books SET available_now = available_now + 1 WHERE id=' . $id['id'] . '');
                    $this->db->query('DELETE FROM used_books WHERE user_id=' . $post['user_id'] . ' AND book_id=' . $id['id'] . '');
                    return true;
                }
            }
        }
    }

    public function del_user($id) {
        return $this->db->delete('users', array('id' => $id));
    }

}

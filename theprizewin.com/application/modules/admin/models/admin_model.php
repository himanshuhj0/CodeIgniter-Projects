<?php

class admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function record_count() {
        $num = $this->db->count_all_results('prizes');
        return $num;
    }

    public function winners_count() {
        $num = $this->db->count_all_results('latestwinners');
        return $num;
    }

    public function setPrize($post, $id) {
        $arr = array(
            'title' => $post['post']['title'],
            'description' => $post['post']['description'],
            'category' => $post['post']['category'],
            'country' => $post['post']['country'],
            'visability' => $post['post']['visability'],
            'address' => $post['post']['address'],
            'timestamp' => strtotime($post['post']['timestamp']),
            'winprice' => $post['post']['winprice'],
            'image' => $post['upload_data']['file_name']
        );
        if ($id == 0) {
            $this->db->insert('prizes', $arr);
        } else {
            $this->db->where('id', $id)
                    ->update('prizes', $arr);
        }
    }

    public function getPrizes($per_page, $page) {
        $query = $this->db->order_by("id", "desc")
                ->limit($per_page, $page)
                ->get('prizes');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 'No prizes in database!';
        }
    }

    public function getWinners($per_page, $page) {
        $query = $this->db->order_by("id", "desc")
                ->limit($per_page, $page)
                ->get('latestwinners');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 'No prizes in database!';
        }
    }

    public function getOneWinner($id) {
        $query = $this->db->where('id', $id)
                ->get('latestwinners');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 'Cant find this prize!';
        }
    }

    public function delete($type, $id) {
        $data['image'] = null;
        $query = $this->db->where('id', $id)
                ->get($type);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                if ($type == 'prizes') {
                    $data['image'] = $row['image'];
                }
            }
            $this->db->where('id', $id)
                    ->delete($type);
            return $data;
        } else {
            return false;
        }
    }

    public function setWinner($data, $id) {
        $arr = array(
            'description' => $data['post']['description'],
            'image' => $data['upload_data']['file_name'],
            'timestamp' => strtotime($data['post']['timestamp'])
        );
        if ($id == 0) {
            $this->db->insert('latestwinners', $arr);
        } else {
            $this->db->where('id', $id)
                    ->update('latestwinners', $arr);
        }
    }

}

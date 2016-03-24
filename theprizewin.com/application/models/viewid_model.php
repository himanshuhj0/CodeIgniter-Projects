<?php

class Viewid_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewId($id) {
        $query = $this->db
                ->where('visability', 'yes')
                ->where('id', $id)
                ->get('prizes');
        return $query->row_array();
    }

    public function getMetaTags($id) {
        if ($id != null) {
            $query = $this->db->query("SELECT title,description FROM prizes WHERE id='$id' AND visability='yes' AND timestamp <= (TIMESTAMP)");
            foreach ($query->result_array() as $row) {
                $row['description'] = htmlspecialchars($row['description']);
                $row['description'] = substr($row['description'], 0, 155);
                $keywords = explode(" ", $row['title']);
                $keywords = implode(",", $keywords);
                $keywords = htmlspecialchars($keywords);
                $q = array(
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "keywords" => $keywords
                );
            }
            return $q;
        }
    }

}

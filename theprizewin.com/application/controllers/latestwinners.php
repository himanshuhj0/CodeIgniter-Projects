<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Latestwinners extends MY_Controller {

    private $num_rows = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('Latestwinners_model');
    }

    public function index($page=0) {
        $header['header'] = array(
            "description" => "List with Latest Winners ",
            "keywords" => "latest,winners,win",
            "title" => "Latest winners"
        );
        $this->load->vars($header);
        $rowscount = $this->Latestwinners_model->record_count();
        $data["links_pagination"] = $this->pagination('latestwinners', $rowscount, $this->num_rows);
        $data['records'] = $this->Latestwinners_model->getWinners($this->num_rows, $page);
        $this->render('latestwinners/latestwinners', $data);
    }

}

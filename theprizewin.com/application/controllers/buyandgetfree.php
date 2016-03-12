<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buyandgetfree extends MY_Controller {

    private $num_rows = 1;

    public function __construct() {
        parent::__construct();
        $this->load->model('Buyandgetfree_model');
    }

    public function index($page=0) {
        $header['header'] = array(
            "description" => "List whith competitions where you buy and get free!",
            "keywords" => "competitions,buy,get,free",
            "title" => "Buy And Get Free"
        );
        $this->load->vars($header);

        $rowscount = $this->Buyandgetfree_model->record_count();
        $data["links_pagination"] = $this->pagination('buyandgetfree', $rowscount, $this->num_rows);
        $data['records'] = $this->Buyandgetfree_model->Buyandgetfree($this->num_rows, $page);
        $this->render('buyandgetfree/buyandgetfree', $data);
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aboutus extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $header['header'] = array(
            "description" => "Abous us. Who we are and what we doing.",
            "keywords" => "abous,us",
            "title" => "Abous Us"
        );
        $this->load->vars($header);
        $this->render('aboutus/aboutus', null);
    }

}

<?php

class _404 extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $header['header'] = array(
            "description" => "This page is not avaible!",
            "keywords" => "page,not,avaible,error,404",
            "title" => "Error 404 - Page not found!"
        );
        $this->load->vars($header);
        $this->render('_404/index', null);
    }

}

<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render($view, $data=null) {
        $this->load->view('_parts/header');
        $this->load->view($view, $data);
        $this->load->view('_parts/footer');
    }

}

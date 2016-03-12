<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terms extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $headers = array(
            'title' => 'Terms and Conditions',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
        );
        $this->load->vars($headers);
        $this->render('terms/terms');
    }

}

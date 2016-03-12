<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Termsandconditions extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $header['header'] = array(
            "description" => "Terms And Conditions for us!",
            "keywords" => "Terms ,And, Conditions",
            "title" => "Terms And Conditions"
        );
        $this->load->vars($header);
        $this->render('termsandconditions/termsandconditions', null);
    }

}
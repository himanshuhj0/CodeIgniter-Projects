<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Discount extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $header['header'] = array(
            "description" => "Here you can see our Discounts",
            "keywords" => "Discount,Discounts",
            "title" => "Discount"
        );
        $this->load->vars($header);
        $this->render('discount/discount',null);
    }


}

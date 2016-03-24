<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Howtowin extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $header['header'] = array(
            "description" => "Here you can see how you can win ",
            "keywords" => "how,to,win",
            "title" => "How to win"
        );
        $this->load->vars($header);
        $this->render('howtowin/howtowin', null);
    }

}

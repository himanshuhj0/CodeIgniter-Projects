<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Viewid extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Viewid_model');
    }

    public function index($id) {
        $data['value'] = $this->Viewid_model->viewId($id);
        $header['header'] = $this->Viewid_model->getMetaTags($id);
        $this->load->vars($header);
        $this->render('viewid/viewid', $data);
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Title information‎';
        $head['description'] = 'Description info';
        $head['keywords'] = 'key,words,for,seo';
        $data['articles'] = $this->Articles_model->getArticles('test1');
        $this->render('contacts', $head, $data);
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LegalArticles extends MY_Controller {

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
        $data['articles'] = $this->Articles_model->getArticles('Legal Articles');
        $this->render('legal_articles', $head, $data);
    }

}

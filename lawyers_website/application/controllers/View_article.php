<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_article extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
    }

    public function index($id) {
        $data = array();
        $head = array();
        $head['title'] = 'Title information‎';
        $head['description'] = 'Description info';
        $head['keywords'] = 'key,words,for,seo';
        $data['article'] = $this->Articles_model->getOneArticle($id);
        $this->render('view_article', $head, $data);
    }

}

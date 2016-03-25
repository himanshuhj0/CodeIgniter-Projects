<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
        $data['recent'] = $this->Articles_model->getHomeRecent('Legal Articles');
        $data['home_federal'] = $this->Articles_model->getArticles('Home Federal License');
        $this->render('home', $head, $data);
    }

}

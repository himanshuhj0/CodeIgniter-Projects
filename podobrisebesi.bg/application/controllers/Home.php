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
        $head['title'] = 'Подобри себе си - Тийм Билдинг програми, Power Aerobic, Планински походи';
        $head['description'] = 'Description info';
        $head['keywords'] = 'key,words,for,seo';
        $data['articles_bottom'] = $this->Articles_model->getArticles('articles_bottom');
        $data_header['header_info'] = $this->Articles_model->getArticles('header_info');
        $data_header['slider_info'] = $this->Articles_model->getArticles('slider');
        $this->load->vars($data_header);
        $data['articles'] = $this->Articles_model->getArticles('test1');
        $this->render('home', $head, $data);
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    private $num_rows = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
        $this->load->helper(array('pagination'));
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Title information‎';
        $head['description'] = 'Description info';
        $head['keywords'] = 'key,words,for,seo';
        $data['articles'] = $this->Articles_model->getArticles('test1');
        /* Pagination
        $rowscount = $this->News_model->news_count();
		$data['news'] = $this->News_model->get_all($this->num_rows, $page);
		$data['links_pagination'] = pagination('новини', $rowscount, $this->num_rows);
        */
        $this->render('home', $head, $data);
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_article extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
        $this->load->helper('text');
    }

    public function index($id) {
        $data = array();
        $head = array();
        $data_header['header_info'] = $this->Articles_model->getArticles('header_info');
        $data_header['slider_info'] = $this->Articles_model->getArticles('slider');
        $this->load->vars($data_header);
        $data['article'] = $this->Articles_model->getOneArticle($id);
        if($data['article'] === null) {
        	show_404();
        }
        $head['title'] = $data['article']['title'];
        $description = url_title(character_limiter(strip_tags($data['article']['description']), 130));
        $description = str_replace("-", " ", $description).'..';
        $head['description'] = $description;
        $head['keywords'] = 'подобри, себе си, здравословна храна, планински походи, power aerobic, тийм билдинг, последния оцелял';
        $this->render('view_article', $head, $data);
    }

}

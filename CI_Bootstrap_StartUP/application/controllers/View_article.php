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
        $description = url_title(character_limiter(strip_tags($data['article']['description']), 130));
        $description = str_replace("-", " ", $description).'..';
        $head['description'] = $description;
        $head['keywords'] = 'key,words,for,seo';
        $data['article'] = $this->Articles_model->getOneArticle($id);
        if($data['article'] === null) {
            show_404();
        }
        $this->render('view_article', $head, $data);
    }

}

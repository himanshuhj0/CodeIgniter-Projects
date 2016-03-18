<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_article extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Viewid_model');
    }

    public function index() {
        $head = array();
        $data = array();
        $url = trim(urldecode(uri_string()));
        $data['article_info'] = $this->Viewid_model->getArticleByUrl($url);
        if($data['article_info'] == null) {
            redirect('home');
        }
        $head['title'] = 'Тийм билдинг - Организиране на най-атрактивните фирмени събития‎';
        $head['description'] = 'Най-интересните и разнообразни фирмени събития организирани от Подобри себе си!';
        $head['keywords'] = 'тийм билдинг, организация, фирми, фирмени събития';
        $this->render('view_article', $head, $data);
    }

}

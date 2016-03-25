<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
    }

    public function index() {
        $head = array();
        $head['title'] = 'Тийм билдинг - Организиране на най-атрактивните фирмени събития‎';
        $head['description'] = 'Най-интересните и разнообразни фирмени събития организирани от Подобри себе си!';
        $head['keywords'] = 'тийм билдинг, организация, фирми, фирмени събития';
        $data_header['header_info'] = $this->Articles_model->getArticles('header_info');
        $data_header['slider_info'] = $this->Articles_model->getArticles('slider');
        $this->load->vars($data_header);
        $this->render('contacts', $head);
    }

}

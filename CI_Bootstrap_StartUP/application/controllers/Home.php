<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Тийм билдинг - Организиране на най-атрактивните фирмени събития‎';
        $head['description'] = 'Най-интересните и разнообразни фирмени събития организирани от Подобри себе си!';
        $head['keywords'] = 'тийм билдинг, организация, фирми, фирмени събития';
        $data['articles'] = $this->Home_model->getHomeArticles();
        $this->render('home', $head, $data);
    }

}

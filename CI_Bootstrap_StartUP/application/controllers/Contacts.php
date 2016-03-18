<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $head = array();
        $head['title'] = 'Тийм билдинг - Организиране на най-атрактивните фирмени събития‎';
        $head['description'] = 'Най-интересните и разнообразни фирмени събития организирани от Подобри себе си!';
        $head['keywords'] = 'тийм билдинг, организация, фирми, фирмени събития';
        $this->render('contacts', $head);
    }

}

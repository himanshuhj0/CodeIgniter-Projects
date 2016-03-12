<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $data['books_late'] = $this->Home_model->books_period(true);
        $data['books_not_late'] = $this->Home_model->books_period(false);
        $this->render('home', $data);
    }

}

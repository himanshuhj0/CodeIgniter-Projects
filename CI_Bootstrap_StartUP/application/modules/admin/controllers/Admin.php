<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Europe/Sofia');

class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('text', 'file'));
        $this->load->Model('Admin_model');
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Администрация';
        $head['description'] = '!';
        $head['keywords'] = '';
        $this->load->view('_parts/header', $head);
        if($this->session->userdata('logged_in')) {
            $this->load->view('home_adm', $data);
        } else {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if($this->form_validation->run($this)) {
                $result = $this->Admin_model->loginCheck($_POST);
                if(!empty($result)) {
                    $this->session->set_userdata('logged_in', $result['username']);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('err_login', 'Wrong username or password!');
                }
            }
            $this->load->view('login');
        }
        $this->load->view('_parts/footer');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

}

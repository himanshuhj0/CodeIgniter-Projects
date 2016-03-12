<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            redirect('home');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|MD5');
        if ($this->form_validation->run()) {
            $result = $this->Login_model->login_check($this->input->post());
            if ($result == 1) {
                $this->session->set_userdata('logged_in', true);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', 'Грешен потребител или парола!');
                redirect('');
            }
        }
        $this->render('login');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }

}

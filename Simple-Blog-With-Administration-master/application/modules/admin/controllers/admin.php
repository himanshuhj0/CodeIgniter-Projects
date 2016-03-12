<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Europe/Sofia');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Admin_model');
        $this->load->Model('Home_model');
        $this->load->Model('Viewid_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->render('home/home', $this->session->userdata('logged_in'));
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_user_check');
            if ($this->form_validation->run($this)) {
                $result = $this->Admin_model->getUserInfo($_POST);
                $this->session->set_userdata('logged_in', $result);
                redirect('admin');
            }
            $this->render('home/login');
        }
    }

    public function valid_user_check() {
        $result = $this->Admin_model->getUserInfo($_POST);
        if (!empty($result)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_user_check', 'Invalid username or password');
            return false;
        }
    }

    public function setPost($id = 0) {
        $this->login_check();
        if ($id > 0) {
            $this->form_validation->set_rules('title', 'Title', 'required');
        } else {
            $this->form_validation->set_rules('title', 'Title', 'required|is_unique[posts.title]');
        }
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('tags', 'Tags', 'required');
        if ($this->form_validation->run($this)) {
            $result = $this->Admin_model->setPost($this->input->post(NULL, TRUE), $id);
            if ($result == 0) {
                $this->session->set_flashdata('result', 'Post publish PROBLEM!');
            } else {
                $this->session->set_flashdata('result', 'Post is Published');
            }
            redirect('admin/allPosts');
        }
        $this->render('home/home', $this->session->userdata('logged_in'));
    }

    public function allPosts($page = 0) {
        $this->login_check();
        $num_rows = $this->Home_model->numRows();
        $data["links_pagination"] = $this->pagination('admin/allPosts', $num_rows, $this->per_page, 3);
        $data['result'] = $this->Home_model->getPost($this->per_page, $page);
        $this->render('allposts/allposts', $data);
    }

    public function edit($id = 0) {
        $this->login_check();
        if ($id == 0) {
            redirect('admin');
        }
        $data['comments'] = $this->Viewid_model->getComments($id);
        $data['result'] = $this->Home_model->getPost($this->per_page, 0, $id);
        $this->render('edit/edit', $data);
    }

    public function delete($id) {
        $this->login_check();
        $result = $this->Admin_model->delete($id);
        if ($result == true) {
            $this->session->set_flashdata('result', 'Delete Success!');
        } else {
            $this->session->set_flashdata('result', 'Delete Problem.Try Again!');
        }
        redirect('admin/allPosts');
    }

    public function delete_comment($id, $post_id) {
        $this->login_check();
        $result = $this->Admin_model->delete_comment($id);
        if ($result == true) {
            $this->session->set_flashdata('result', 'Delete Comment Success!');
        } else {
            $this->session->set_flashdata('result', 'Delete Comment Problem.Try Again!');
        }
        redirect(base_url('admin/edit/' . $post_id));
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect();
    }

    private function login_check() {
        if ($this->session->userdata('logged_in') == false) {
            redirect();
        }
    }

}

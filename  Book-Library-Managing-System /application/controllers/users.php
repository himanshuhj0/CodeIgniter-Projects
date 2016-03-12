<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    private $num_rows = 10;

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->helper('pagination');
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
    }

    public function index($page = 0) {
        $filter = array();
        if ($this->input->get('finduser')) {
            $filter['finduser'] = $this->input->get('finduser');
        }
        $rowscount = $this->Users_model->record_count($filter);
        $data["links_pagination"] = pagination('users', $rowscount, $this->num_rows);
        $data['users'] = $this->Users_model->get_users($this->num_rows, $page, $filter);
        $this->render('users/users', $data);
    }

    public function add_edit_user($id = null) {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('family', 'Family', 'trim|required');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'trim|required|is_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run()) {
            $result = $this->Users_model->set_user($this->input->post(), $id);
            if ($result == true) {
                $this->session->set_flashdata('message', 'Потребителият е добавен/редактиран успешно!');
                redirect('users');
            } else {
                $this->session->set_flashdata('message', 'Проблем с добавянето/редактирането на потребителя!');
                redirect('users/add_edit_user');
            }
        }
        if ($id != null) {
            $_POST = $this->Users_model->get_one($id);
        }
        $this->render('users/add_edit_user');
    }

    public function used_books($id) {
        if (isset($_POST['added_books']) || isset($_POST['deleted_books'])) {
            $result = $this->Users_model->set_used_books($this->input->post());
            if ($result == true) {
                $this->session->set_flashdata('message', 'Информацията е обновена успешно');
                redirect('users/used_books/' . $_POST['user_id']);
            } else {
                $this->session->set_flashdata('message', 'Опит за добавяне на не-съществуваща книга!');
                redirect('users/used_books/' . $_POST['user_id']);
            }
        }
        $data = array();
        $data['books'] = $this->Users_model->get_used_books($id);
        $this->render('users/used_books', $data);
    }

    public function delete($id) {
        $result = $this->Users_model->del_user($id);
        if ($result == true) {
            $this->session->set_flashdata('message', 'Потребителият е изтрит успешно!');
            redirect('users');
        } else {
            $this->session->set_flashdata('message', 'Проблем с изтриването!');
            redirect('users');
        }
    }

}

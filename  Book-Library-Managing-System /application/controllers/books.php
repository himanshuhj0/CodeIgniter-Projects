<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Books extends MY_Controller {

    private $num_rows = 5;

    public function __construct() {
        parent::__construct();
        $this->load->model('Books_model');
        $this->load->helper('pagination');
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
    }

    public function index($page = 0) {
        $filter = array();
        if ($this->input->get('findbook')) {
            $filter['findbook'] = $this->input->get('findbook');
        }
        $rowscount = $this->Books_model->record_count($filter);
        $data["links_pagination"] = pagination('books', $rowscount, $this->num_rows);
        $data['books'] = $this->Books_model->get_books($this->num_rows, $page, $filter);
        $this->render('books/books', $data);
    }

    public function add_edit_book($id = null) {
        if ($id == null) {
            $this->form_validation->set_rules('title', 'Name', 'trim|required|is_unique[books.title]');
        } else {
            $this->form_validation->set_rules('title', 'Name', 'trim|required');
        }
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('year', 'Year', 'trim|required');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('available', 'Availability', 'trim|required|is_numeric');
        if ($id == null || !empty($_FILES['userfile']['name'])) {
            $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
        }

        if ($this->form_validation->run()) {
            if ($id == null || !empty($_FILES['userfile']['name'])) {
                $arr = $this->upload->data();
                $_POST['cover'] = $arr['file_name'];
            }
            if ($id == null) {
                $_POST['available_now'] = $_POST['available'];
            }
            $result = $this->Books_model->set_book($this->input->post(), $id);
            if ($result == true) {
                $this->session->set_flashdata('message', 'Книгата е добавена/редактирана успешно!');
                redirect('books');
            } else {
                $this->session->set_flashdata('message', 'Проблем с добавянето/редактирането на книгата!');
                redirect('books/add_edit_book');
            }
        }

        if ($id != null) {
            $_POST = $this->Books_model->get_one($id);
        }

        $this->render('books/add_edit_book');
    }

    public function view_book($id) {
        $data = array();
        $data['book'] = $this->Books_model->get_one($id, true);
        $this->render('books/view_book', $data);
    }

    public function autocompleteReturn() {
        $result = $this->Books_model->getAutocomplete($this->input->get('term'));
        echo json_encode($result);
    }

    function handle_upload() {
        $config['upload_path'] = './assets/uploads_covers/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '500';
        $config['max_height'] = '800';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
            return false;
        } else {
            return true;
        }
    }

    public function delete($id) {
        $result = $this->Books_model->del_book($id);
        if ($result == true) {
            $this->session->set_flashdata('message', 'Книгата е изтрита успешно!');
            redirect('books');
        } else {
            $this->session->set_flashdata('message', 'Проблем с изтриването!');
            redirect('books');
        }
    }

}

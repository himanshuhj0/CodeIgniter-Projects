<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Europe/Sofia');

class Admin extends MX_Controller {

    private $num_rows = 10;
    private $thumb_width = 300;
    private $thumb_height = 300;
    private $username;
    private $history = false;

    //$data['links_pagination'] = pagination('admin/view_all', $rowscount, $this->num_rows, 3);

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('text', 'file', 'pagination', 'text', 'except_letters'));
        $this->load->Model('Admin_model');
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Administration';
        $head['description'] = '!';
        $head['keywords'] = '';
        $this->load->view('_parts/header', $head);
        if ($this->session->userdata('logged_in')) {
            //$this->load->view('home_adm', $data);
            $this->username = $this->session->userdata('logged_in');
            redirect('admin/publish');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this)) {
                $result = $this->Admin_model->loginCheck($_POST);
                if (!empty($result)) {
                    $this->session->set_userdata('logged_in', $result['username']);
                    $this->username = $this->session->userdata('logged_in');
                    $this->saveHistory('User ' . $result['username'] . ' logged in');
                    redirect('admin/publish');
                } else {
                    $this->saveHistory('Cant login with - User:' . $_POST['username'] . ' and Pass:' . $_POST['username']);
                    $this->session->set_flashdata('err_login', 'Wrong username or password!');
                }
            }
            $this->load->view('login');
        }
        $this->load->view('_parts/footer');
    }

    public function publish($id = 0) {
        $this->login_check();
        if ($id > 0 && $_POST == null) {
            $_POST = $this->Admin_model->getOneArticle($id);
        }
        if ($id > 0) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
        } else {
            $this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[articles.title]');
        }
        if ($this->form_validation->run($this)) {
            $config['upload_path'] = './attachments/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {
                log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
            } else {
                $this->createThumb();
            }
            $img = $this->upload->data();
            if ($img['file_name'] != null) {
                $_POST['image'] = $img['file_name'];
                $_POST['thumb'] = $img['file_name'];
            }
            $result = $this->Admin_model->setArticle($_POST, $id);
            if ($result === true) {
                $this->session->set_flashdata('result_publish', 'Article is published!');
                if ($id == 0) {
                    $this->saveHistory('Publish article - ' . $_POST['title']);
                } else {
                    $this->saveHistory('Update article - ' . $_POST['title']);
                }
                redirect('admin/articles');
            } else {
                $this->session->set_flashdata('result_publish', 'Problem with article publish!');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Article';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['categoiries'] = $this->Admin_model->getCategories();
        $this->load->view('_parts/header', $head);
        $this->load->view('publish', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish page');
    }

    public function articles($page = 0) {
        $this->login_check();
        $this->saveHistory('Go to articles');
        if (isset($_GET['delete'])) {
            $result = $this->Admin_model->deleteArticle($_GET['delete']);
            if ($result == true) {
                $this->session->set_flashdata('result_delete', 'Article is deleted!');
                $this->saveHistory('Delete article id - ' . $_GET['delete']);
            } else {
                $this->session->set_flashdata('result_delete', 'Problem with article delete!');
            }
            redirect('admin/articles');
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - View Articles';
        $head['description'] = '!';
        $head['keywords'] = '';

        if ($this->input->get('search') !== NULL) {
            $search = $this->input->get('search');
            $this->saveHistory('Search for - ' . $search);
        } else {
            $search = null;
        }
        if ($this->input->get('category') !== NULL) {
            $category = $this->input->get('category');
        } else {
            $category = null;
        }
        if ($this->input->get('orderby') !== NULL) {
            $orderby = $this->input->get('orderby');
        } else {
            $orderby = null;
        }
        $rowscount = $this->Admin_model->articlesCount($search, $category);
        $data['articles'] = $this->Admin_model->getArticles($this->num_rows, $page, $search, $category, $orderby);
        $data['links_pagination'] = pagination('admin/articles', $rowscount, $this->num_rows, 3);
        $data['categoiries'] = $this->Admin_model->getCategories();

        $this->load->view('_parts/header', $head);
        $this->load->view('articles', $data);
        $this->load->view('_parts/footer');
    }

    public function categories() {
        $this->login_check();
        if (isset($_GET['delete'])) {
            $result = $this->Admin_model->deleteCategorie($_GET['delete']);
            if ($result == true) {
                $this->saveHistory('Delete categorie id - ' . $_GET['delete']);
                $this->session->set_flashdata('result_delete', 'Categorie is deleted!');
            } else {
                $this->session->set_flashdata('result_delete', 'Problem with categorie delete!');
            }
            redirect('admin/categories');
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Categories';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['categoiries'] = $this->Admin_model->getCategories();

        if (!isset($_POST['id']) || $_POST['id'] == 0) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[categories.name]');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        if ($this->form_validation->run($this)) {
            $result = $this->Admin_model->setCategorie($_POST);
            if ($result === true) {
                $this->session->set_flashdata('result_add', 'Categorie is added!');
                $this->saveHistory('Create categorie - ' . $_POST['name']);
                redirect('admin/categories');
            } else {
                $this->session->set_flashdata('result_add', 'Problem with categorie add!');
            }
        }

        $this->load->view('_parts/header', $head);
        $this->load->view('categories', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to categories');
    }

    public function fileManager() {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - File Manager';
        $head['description'] = '!';
        $head['keywords'] = '';

        $this->load->view('_parts/header', $head);
        $this->load->view('filemanager', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to File Manager');
    }

    public function history($page = 0) {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - History';
        $head['description'] = '!';
        $head['keywords'] = '';

        $rowscount = $this->Admin_model->historyCount();
        $data['actions'] = $this->Admin_model->getHistory($this->num_rows, $page);
        $data['links_pagination'] = pagination('admin/history', $rowscount, $this->num_rows, 3);
        $data['history'] = $this->history;

        $this->load->view('_parts/header', $head);
        $this->load->view('history', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to History');
    }

    private function saveHistory($activity) {
        if ($this->history === true) {
            $usr = $this->username;
            $this->Admin_model->setHistory($activity, $usr);
        }
    }

    private function createThumb() {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './attachments/images/' . $this->upload->file_name;
        $config['new_image'] = './attachments/thumbs/' . $this->upload->file_name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['thumb_marker'] = '';
        $config['width'] = $this->thumb_width;
        $config['height'] = $this->thumb_height;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            log_message('error', 'Thumb Upload Error: ' . $this->image_lib->display_errors());
        }
    }

    public function changePass() {  //called from ajax
        $this->login_check();
        $result = $this->Admin_model->changePass($_POST['new_pass'], $this->username);
        if ($result == true)
            echo 1;
        else
            echo 0;
        $this->saveHistory('Password change for user: ' . $this->username);
    }

    public function articleStatusChange() { //called from ajax
        $this->login_check();
        $result = $this->Admin_model->articleStatusChagne($_POST['id'], $_POST['to_status']);
        if ($result == true)
            echo 1;
        else
            echo 0;
        $this->saveHistory('Change article id ' . $_POST['id'] . ' to status ' . $_POST['to_status']);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

    private function login_check() {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
        $this->username = $this->session->userdata('logged_in');
    }

}

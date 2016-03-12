<?php

class admin extends MY_Controller {

    private $user = 'Admin';
    private $pass = 'Admin';
    private $num_rows = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('Competitions_model');
        $this->load->model('Viewid_model');
    }

    public function index($id = 0) {
        $user = $this->session->userdata('loggedIn');
        if ($user == 'success') {
            if ($id == 0) {
                $this->form_validation->set_rules('title', 'Title', 'required|is_unique[prizes.title]');
            } else {
                $this->form_validation->set_rules('title', 'Title', 'required');
            }
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('winprice', 'Win Price', 'numeric');
            $this->form_validation->set_rules('timestamp', 'Date', 'required');
            if ($this->form_validation->run()) {
                $config['upload_path'] = './attachments/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile') && $id == 0) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('uploadresult', "Error Image Upload - $error ");
                } else {

                    $data['upload_data'] = $this->upload->data();
                    if ($data['upload_data']['file_name'] == null) {
                        $data['upload_data']['file_name'] = $_POST['image'];
                    }
                    $data['post'] = $this->input->post();
                    $result = $this->admin_model->setPrize($data, $id);
                    $this->session->set_flashdata('uploadresult', 'Upload Sccess !');
                }
                redirect('admin');
            }
            $data['categories'] = $this->Competitions_model->getCategories();
            $data['countries'] = $this->Competitions_model->getCountries();
            if ($id != 0) {
                $_POST = $this->Viewid_model->viewId($id);
            }
            $this->load->view('__parts/header');
            $this->load->view('admin_view', $data);
            $this->load->view('__parts/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function validate() {
        if ($this->session->userdata('loggedIn')) {
            header('Location: ' . base_url() . 'admin');
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($username == $this->user && $password = $this->pass) {
            $this->session->set_userdata('loggedIn', 'success');
            header('Location: ' . base_url() . 'admin');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        header('Location: ' . base_url() . 'admin');
    }

    public function edit($page = 0) {
        $rowscount = $this->admin_model->record_count();
        $data['reccount'] = $rowscount;
        $data["links_pagination"] = $this->pagination('admin/edit', $rowscount, $this->num_rows, 3);
        $data['prizes'] = $this->admin_model->getPrizes($this->num_rows, $page);
        $this->load->view('__parts/header');
        $this->load->view('edit', $data);
        $this->load->view('__parts/footer');
    }

    public function delete($type, $id) {
        $data = $this->admin_model->delete($type, $id);
        if ($type == 'prizes') {
            unlink('./attachments/images/' . $data['image']);
        }
        if ($data == false) {
            $this->session->set_flashdata('deleteresult', 'Delete Problem !');
        } else {
            $this->session->set_flashdata('deleteresult', 'Delete Sccess !');
        }
        redirect('admin/edit');
    }

    public function addwinner($id = 0) {
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('timestamp', 'Date', 'required');
        if ($this->form_validation->run()) {
            $config['upload_path'] = './attachments/latest_winners_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile') && $id == 0) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('result', "Error Image Upload - $error ");
            } else {
                $data['upload_data'] = $this->upload->data();
                if ($data['upload_data']['file_name'] == null) {
                    $data['upload_data']['file_name'] = $_POST['image'];
                }
                $data['post'] = $this->input->post();
                $this->admin_model->setWinner($data, $id);
                $this->session->set_flashdata('result', 'Ready published!');
            }
            redirect('admin/addwinner');
        }
        if ($id != 0) {
            $_POST = $this->admin_model->getOneWinner($id);
        }

        $this->load->view('__parts/header');
        $this->load->view('addwinner');
        $this->load->view('__parts/footer');
    }

    public function editwinners($page = 0) {
        $rowscount = $this->admin_model->winners_count();
        $data['reccount'] = $rowscount;
        $data["links_pagination"] = $this->pagination('admin/editwinners', $rowscount, $this->num_rows, 3);
        $data['winners'] = $this->admin_model->getWinners($this->num_rows, $page);
        $this->load->view('__parts/header');
        $this->load->view('editwinners', $data);
        $this->load->view('__parts/footer');
    }

}

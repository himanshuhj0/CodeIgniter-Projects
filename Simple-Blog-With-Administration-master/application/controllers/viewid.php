<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Viewid extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Home_model');
        $this->load->Model('Viewid_model');
        $this->load->library('typography');
    }

    public function index($id = 0) {
        if ($this->input->post(NULL) != false) {
            $this->setComment();
        }
        $data = array();
        $data['result'] = $this->Home_model->getPost($this->per_page, 0, $id);
        if ($data['result'] == false) {
            redirect(base_url());
        }
        $data['comments'] = $this->Viewid_model->getComments($id);
        $headers = array(
            'title' => htmlspecialchars($data['result'][0]['title']),
            'description' => character_limiter(htmlspecialchars($data['result'][0]['description']), 110)
        );
        $this->load->vars($headers);
        $this->render('viewid/viewid', $data);
    }

    private function setComment() {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run($this)) {
            $result = $this->Viewid_model->setComment($this->input->post(NULL, TRUE));
            if ($result == true) {
                $this->session->set_flashdata('comment', 'Comment is Published');
            } else {
                $this->session->set_flashdata('comment', 'Comment publish error!');
            }
            redirect(current_url());
        }
    }

}

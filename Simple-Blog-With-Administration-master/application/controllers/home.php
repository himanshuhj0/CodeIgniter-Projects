<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Home_model');
        $this->load->Model('Viewid_model');
    }

    public function index($page = 0) {
        $find = null;
        if ($this->input->get('tag')) {
            $find = $this->input->get('tag');
        }
        $num_rows = $this->Home_model->numRows($find);
        $data = array();
        $data["links_pagination"] = $this->pagination('home', $num_rows, $this->per_page);
        $data['result'] = $this->Home_model->getPost($this->per_page, $page, 0, $find);
        $data['tags'] = $this->Home_model->getTags();
        $data['lastcomments'] = $this->Viewid_model->getLastComments();
        $headers = array(
            'title' => 'Welcome to Twoodo Blog',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
        );
        $this->load->vars($headers);
        $this->render('home/home', $data);
    }

}

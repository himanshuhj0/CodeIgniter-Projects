<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Competitions extends MY_Controller {

    private $num_rows = 21;

    public function __construct() {
        parent::__construct();
        $this->load->model('Competitions_model');
        $this->load->model('Latestwinners_model');
    }

    public function index($page = 0) {
        $header['header'] = array(
            "description" => "Prizes, raffles, games and competitions from around the world. All in one place!",
            "keywords" => "Prizes,world,dubai prizes, raffles, gifts, games and contests,win,wins,win a car, win a monney,win from shop",
            "title" => "All world presents in one place! Buy-Win!"
        );
        $this->load->vars($header);
        if ($this->input->get('category')) {
            $where['val'] = $this->input->get('category');
            $where['type'] = 'category';
        } elseif ($this->input->get('country')) {
            $where['val'] = $this->input->get('country');
            $where['type'] = 'country';
        } else {
            $where = null;
        }
        if ($this->input->get('orderby')) {
            $sortarr['type'] = $this->input->get('orderby');
            $sortarr['column'] = 'timestamp';
        } else {
            $sortarr['type'] = 'desc';
            $sortarr['column'] = 'id';
        }
        $rowscount = $this->Competitions_model->record_count($where);
        $data["links_pagination"] = $this->pagination('competitions', $rowscount, $this->num_rows);
        $data['records'] = $this->Competitions_model->getPrizes($this->num_rows, $page, $where, $sortarr);
        $data['categories'] = $this->Competitions_model->getCategories();
        $data['countries'] = $this->Competitions_model->getCountries();
        $data['sumprices'] = $this->Competitions_model->winprises();
        $this->render('competitions/competitions', $data);
    }

    public function Subscribe() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->load->model('Competitions_model');
                echo $this->Competitions_model->setEmail($_POST['email']);
            } else {
                echo 'Invalid Email';
            }
        }
    }

}

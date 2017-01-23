<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
    }

    public function index() {

        if ($this->session->userdata('orgID') == "") {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong>  Session has expired</div>');

            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
            return;
        }
        $query = $this->Md->query("SELECT * FROM client WHERE orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $query = $this->Md->query("SELECT * FROM estate where orgID = '" . $this->session->userdata('orgID') . "' ");


        if ($query) {
            $data['estates'] = $query;
        } else {
            $data['estates'] = array();
        }
        $query = $this->Md->query("SELECT * FROM tenant where orgID = '" . $this->session->userdata('orgID') . "' AND DATE(created) = CURRENT_DATE  ");

        if ($query) {
            $data['tenants'] = $query;
        } else {
            $data['tenants'] = array();
        }    
        $query = $this->Md->query("SELECT * FROM client where orgID = '" . $this->session->userdata('orgID') . "' AND DATE(created) = CURRENT_DATE  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }        

        $this->load->view('home-page', $data);
    }

    public function start() {

        $query = $this->Md->query("SELECT * FROM client WHERE orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $query = $this->Md->query("SELECT * FROM estate where orgID = '" . $this->session->userdata('orgID') . "' ");


        if ($query) {
            $data['estates'] = $query;
        } else {
            $data['estates'] = array();
        }
        $query = $this->Md->query("SELECT * FROM tenant where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['tenants'] = $query;
        } else {
            $data['tenants'] = array();
        }
        $query = $this->Md->query("SELECT * FROM user WHERE orgID= '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT *,tenant.name AS tenant,room.name AS name,estate.name AS estate FROM room LEFT JOIN tenant ON  room.tenantID = tenant.tenantID LEFT JOIN estate ON  room.estateID = estate.estateID where room.orgID = '" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['rooms'] = $query;
        } else {
            $data['rooms'] = array();
        }
        $query = $this->Md->query("SELECT *  FROM tenant WHERE orgID = '" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['rent'] = $query;
        } else {
            $data['rent'] = array();
        }
        $this->load->view('start-page', $data);
    }

}

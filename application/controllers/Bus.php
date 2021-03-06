<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
        $this->load->library('excel');
    }

    public function index() {


     if ($this->session->userdata('sessionID') == "admin") {

            $query = $this->Md->query("SELECT *,bus.name AS bus,bus.id AS id,company.name AS company,route.name AS route,bus.name AS name FROM bus LEFT JOIN company ON bus.companyID = company.id LEFT JOIN route ON bus.routeID = route.id ");
        } else {

            $query = $this->Md->query("SELECT *,bus.name AS bus,bus.id AS id,company.name AS company,route.name AS route,bus.name AS name FROM bus LEFT JOIN company ON bus.companyID = company.id LEFT JOIN route ON bus.routeID = route.id WHERE bus.companyID='" . $this->session->userdata('companyID') . "'");
        }
        // $query = $this->Md->query("SELECT * FROM client  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $this->load->view('view-bus', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        //user information
        // $clientID = $this->GUID();
        $name = $this->input->post('name');

        $query = $this->Md->query("SELECT * FROM bus WHERE regNo='" . $this->input->post('regNo') . "'");
        if (count($query)) {

            $status .= '<div class="alert alert-success">  <strong>Bus already registered</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('bus', 'refresh');
            return;
        }
        if ($name != "" && $this->session->userdata('companyID') != "") {

            $b = array('name' => $this->input->post('name'), 'companyID' => $this->session->userdata('companyID'), 'regNo' => $this->input->post('regNo'), 'seat' => $this->input->post('seats'), 'routeID' => $this->input->post('routeID'), 'created' => date('d-m-Y'), 'active' => 'true');
            $this->Md->save($b, 'bus');
            $status .= '<div class="alert alert-success">  <strong>Information submitted</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('bus', 'refresh');
        } else {
            $status .= '<div class="alert alert-danger">  <strong>Error saving data either name not specified OR you are not a Company manager</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('bus', 'refresh');
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));

        if (!empty($_POST)) {

            foreach ($_POST as $field_name => $val) {
                //clean post values
                $field_id = strip_tags(trim($field_name));
                $val = strip_tags(trim($val));
                //from the fieldname:user_id we need to get user_id
                $split_data = explode(':', $field_id);
                $user_id = $split_data[1];
                $field_name = $split_data[0];
                if (!empty($user_id) && !empty($field_name) && !empty($val)) {
                    //update the values
                    $task = array($field_name => $val);
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'id', 'bus', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function lists() {

        $query = $this->Md->query("SELECT * FROM bus WHERE companyID='" . $this->session->userdata('companyID') . "'");
        //$query = $this->Md->query("SELECT * FROM client");
        echo json_encode($query);
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $id = urldecode($this->uri->segment(3));

        $query = $this->Md->cascade($id, 'bus', 'id');

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                Information deleted	</strong>									
						</div>');
            redirect('bus', 'refresh');
        }
        $status .= '<div class="alert alert-success">  <strong>Information deleted</strong></div>';
        $this->session->set_flashdata('msg', $status);
        redirect('bus', 'refresh');
    }

}

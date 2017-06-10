<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {

        $this->load->view('login-page');
    }

    public function version() {

        $this->load->view('version');
    }

    public function home() {
      //  echo $this->session->userdata('role');
        
        if ($this->session->userdata('name') != "") {

           if ($this->session->userdata('sessionID') == "admin") {

                $query = $this->Md->query("SELECT * FROM route");
                if ($query) {
                    $data['routes'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM driver");
                if ($query) {
                    $data['drivers'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM bus");
                if ($query) {
                    $data['buses'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment WHERE date LIKE '%" . date('d-m-Y') . "%' ");

                if ($query) {
                    $data['payments_today'] = $query;
                }
                $query = $this->Md->query("SELECT SUM(COST) AS cost FROM payment WHERE date LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['sum_today'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment WHERE YEAR(STR_TO_DATE(date,'%d-%m-%Y')) = '" . date('Y') . "' ");
                if ($query) {
                    $data['payments_year'] = $query;
                }
            } else {

                $query = $this->Md->query("SELECT * FROM route where  company='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['routes'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM driver where  companyID='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['drivers'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM bus where  companyID='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['buses'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND date LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['payments_today'] = $query;
                }
                 $query = $this->Md->query("SELECT * FROM expenses where  companyID='" . $this->session->userdata('companyID') . "' AND created LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['expenses_today'] = $query;
                }
                $query = $this->Md->query("SELECT SUM(COST) AS cost FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND date LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['sum_today'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND YEAR(STR_TO_DATE(date,'%d-%m-%Y')) = '" . date('Y') . "' ");
                if ($query) {
                    $data['payments_year'] = $query;
                }
            }

            $this->load->view('home-page', $data);
        } else {

            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }
    }

    public function start() {

        if ($this->session->userdata('name') != "") {

            if ($this->session->userdata('sessionID') == "admin") {

                $query = $this->Md->query("SELECT * FROM route");
                if ($query) {
                    $data['routes'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM driver");
                if ($query) {
                    $data['drivers'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM bus");
                if ($query) {
                    $data['buses'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment WHERE date LIKE '%" . date('d-m-Y') . "%' ");

                if ($query) {
                    $data['payments_today'] = $query;
                }
                $query = $this->Md->query("SELECT SUM(COST) AS cost FROM payment WHERE date LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['sum_today'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment WHERE YEAR(STR_TO_DATE(date,'%d-%m-%Y')) = '" . date('Y') . "' ");
                if ($query) {
                    $data['payments_year'] = $query;
                }
            } else {

                $query = $this->Md->query("SELECT * FROM route where  company='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['routes'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM driver where  companyID='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['drivers'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM bus where  companyID='" . $this->session->userdata('companyID') . "'");
                if ($query) {
                    $data['buses'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND date LIKE '%" . date('d-m-Y') . "%' ");

                if ($query) {
                    $data['payments_today'] = $query;
                }
                $query = $this->Md->query("SELECT SUM(COST) AS cost FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND date LIKE '%" . date('d-m-Y') . "%' ");
                if ($query) {
                    $data['sum_today'] = $query;
                }
                $query = $this->Md->query("SELECT * FROM payment where  companyID='" . $this->session->userdata('companyID') . "' AND YEAR(STR_TO_DATE(date,'%d-%m-%Y')) = '" . date('Y') . "' ");
                if ($query) {
                    $data['payments_year'] = $query;
                }
            }

            $this->load->view('start-page', $data);
        } else {

            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }
    }

    public function page() {

        $this->load->view('page');
    }

    public function register() {

        $this->load->view('register-page');
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('welcome', 'refresh');
    }

    public function login() {

        $this->load->helper(array('form', 'url'));

        $get_result = $this->Md->query("SELECT *,user.id AS userID,roles.name AS role,roles.actions AS permission,user.name AS username,company.name AS company,company.id as companyID,user.contact AS contact,user.email AS email,company.image AS companyImage,user.image AS image FROM user LEFT JOIN company ON user.company = company.id LEFT JOIN roles ON roles.id = user.role WHERE (user.name ='" . $this->input->post('name') . "' OR user.contact ='" . $this->input->post('name') . "' OR user.email = '" . $this->input->post('name') . "' ) AND user.password = '" . md5($this->input->post('password')) . "' ");
         //var_dump($get_result);
        // return;
        if (is_array($get_result) && count($get_result) > 0) {
            foreach ($get_result as $res) {

                $newdata = array(
                    'userID' => $res->userID,
                     'username' => $res->username,
                    'name' => $res->username,
                    'company' => $res->company,
                    'companyID' => $res->companyID,
                    'companyImage' => $res->companyImage,
                    'email' => $res->email,
                    'contact' => $res->contact,
                    'image' => $res->image,
                    'location' => $res->location,
                    'permission' => $res->permission,
                    'views' => $res->views,
                    'role' => $res->role,
                    'active' => $res->active
                );

                $this->session->set_userdata($newdata);
                redirect('/welcome/home', 'refresh');
            }
        } else {
            echo 'F';
            $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong>  ! User does not exist</div>');
            redirect('welcome', 'refresh');
        }
    }

    public function student() {
        $this->load->view('private');
    }

    public function info() {

        $this->load->view('info-page', $data);
    }

    public function help() {

        $this->load->view('help-page', $data);
    }

    public function management() {

        $cty = $this->session->userdata('country');

        $name = $this->session->userdata('name');
        $query = $this->Md->get('reciever', $name, 'chat');
//  var_dump($query);
        if ($query) {
            $data['chats'] = $query;
        } else {
            $data['chats'] = array();
        }
        $query = $this->Md->query("SELECT * FROM outbreak where country = '" . $cty . "'");
//  var_dump($query);
        if ($query) {
            $data['outbreaks'] = $query;
        } else {
            $data['outbreaks'] = array();
        }

        $query = $this->Md->query("SELECT * FROM publication where country = '" . $cty . "'");
//  var_dump($query);
        if ($query) {
            $data['pubs'] = $query;
        } else {
            $data['pubs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM student where status = 'false'");
//  var_dump($query);
        if ($query) {
            $data['student_cnt_false'] = $query;
        } else {
            $data['student_cnt_false'] = array();
        }

        $query = $this->Md->query("SELECT * FROM publication where verified = 'false'");
//  var_dump($query);
        if ($query) {
            $data['publication_cnt_review'] = $query;
        } else {
            $data['publication_cnt_review'] = array();
        }
        $query = $this->Md->query("SELECT * FROM publication where accepted = 'no'");
//  var_dump($query);
        if ($query) {
            $data['publication_cnt_accepted'] = $query;
        } else {
            $data['publication_cnt_accepted'] = array();
        }

        $query = $this->Md->query("SELECT * FROM presentation where accepted = 'no'");
//  var_dump($query);
        if ($query) {
            $data['present_cnt_accepted'] = $query;
        } else {
            $data['present_cnt_accepted'] = array();
        }


        $this->load->view('center_page', $data);
    }

    public function projects() {

        $query = $this->Md->show('project');
        if ($query) {
            $data['projects'] = $query;
        } else {
            $data['projects'] = array();
        }


        $this->load->view('projects', $data);
    }

    public function services() {

        $query = $this->Md->show('service');
        if ($query) {
            $data['services'] = $query;
        } else {
            $data['services'] = array();
        }
        $this->load->view('services', $data);
    }

    public function profile() {

        $query = $this->Md->show('profile');
        if ($query) {
            $data['profiles'] = $query;
        } else {
            $data['profiles'] = array();
        }
        $this->load->view('profile', $data);
    }

    public function contact() {
        $this->load->view('contact');
    }

    public function project() {
        $this->load->view('project');
    }

}

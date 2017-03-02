<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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

        $query = $this->Md->query("SELECT *,payment.id AS id,route.name AS route, payment.name AS name,payment.created AS created,payment.date As date,route.start_time AS start FROM payment LEFT JOIN route ON payment.routeID = route.id WHERE payment.companyID ='" . $this->session->userdata('companyID') . "'");
        // $query = $this->Md->query("SELECT * FROM client  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $this->load->view('view-payments', $data);
    }

    public function daily() {

        $query = $this->Md->query("SELECT *,payment.id AS id,route.name AS route, payment.name AS name,payment.created AS created,payment.date As date,route.start_time AS start FROM payment LEFT JOIN route ON payment.routeID = route.id WHERE payment.companyID ='" . $this->session->userdata('companyID') . "'");
        // $query = $this->Md->query("SELECT * FROM client  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $this->load->view('view-daily', $data);
    }

    public function monthly() {

        $query = $this->Md->query("SELECT *,payment.id AS id,route.name AS route, payment.name AS name,payment.created AS created,payment.date As date,route.start_time AS start FROM payment LEFT JOIN route ON payment.routeID = route.id WHERE payment.companyID ='" . $this->session->userdata('companyID') . "'");
        // $query = $this->Md->query("SELECT * FROM client  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $this->load->view('view-payments', $data);
    }

    public function daily_report() {

        $this->load->helper(array('form', 'url'));

        $date = trim($this->input->post('date'));
        $months = trim($this->input->post('month'));
        $years = trim($this->input->post('year'));
        unset($sql);
        if ($date) {
            $sql[] = "DAY(STR_TO_DATE(date,'%d-%m-%Y')) = '$date' ";
        }
        if ($months) {
            $sql[] = "MONTH(STR_TO_DATE(date,'%d-%m-%Y')) = '$months' ";
        }
        if ($years) {
            $sql[] = "YEAR(STR_TO_DATE(date,'%d-%m-%Y')) = '$years' ";
        }
        $query = "SELECT * FROM payment";
        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

        $dailys = $this->Md->query($query);
        //var_dump($daily);
        if ($dailys) {

            echo ' <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created on</th>
                                    <th>Contact</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th class="hidden-phone">Bus</th>
                                    <th class="hidden-phone">Seat</th>
                                    <th>Date/Time of travel</th>
                                    <th class="hidden-phone">Cost</th>                                   
                                    <th class="hidden-phone">Route</th>
                                    <th class="hidden-phone">Bar code</th>
                                </tr>
                            </thead>
                            <tbody>';
            //var_dump($dailys);
            $sum = "0";
            if (is_array($dailys) && count($dailys)) {
                foreach ($dailys as $loop) {



                    echo '       <tr class="odd">
                                            <td>
                                                ' . $loop->id . '
                                            </td>
                                            <td>
                                                 ' . $loop->created . '
                                            </td>
                                            <td> ' . $loop->contact . '
                                            </td>
                                            <td >
                                                 ' . $loop->name . '
                                            </td>

                                            <td > ' . $loop->email . '</td>
                                            <td> ' . $loop->bus . '
                                            </td>
                                            <td> ' . $loop->seat . '
                                            </td>
                                            <td> ' . $loop->date . ' ' . $loop->start . '
                                            </td>
                                            <td > ' . number_format($loop->cost) . '</td>
                                            <td > ' . $loop->route . '</td> 
                                            <td > ' . $loop->barcode . '</td> 
                                            

                                        </tr>';
                    $sum = $sum + $loop->cost;
                }
            }

            echo '       <tr class="odd">
                                            <td>
                                               
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                            </td>
                                            <td >
                                                
                                            </td>

                                            <td ></td>
                                            <td>  </td>
                                            <td> </td>
                                            <td>TOTAL </td>
                                            <td > ' . number_format($sum) . '</td>
                                            <td > </td> 
                                            <td > </td> 
                                            

                                        </tr>';
            echo '    </tbody>

                        </table>';
        }
    }

    public function pay() {

        $query = $this->Md->query("SELECT * FROM route");
        // $query = $this->Md->query("SELECT * FROM client  ");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }
        $this->load->view('view-pay', $data);
    }

    public function details() {

        $this->load->helper(array('form', 'url'));
        $ID = trim($this->input->post('routeID'));
        $date = trim(date('d-m-Y', strtotime($this->input->post('date'))));

        $get_result = $this->Md->query("SELECT * FROM route LEFT JOIN bus ON  route.id = bus.routeID WHERE route.id='" . $ID . "'");
        // var_dump($get_result);
        if (!$get_result) {
            echo '<span style="color:#f00"> No information in the database </strong> does not exist in our database</span>';
        } else {
            foreach ($get_result as $res) {
                $res->cost;
                echo ' <div class="form-group">
                    <label class="col-sm-4">Cost</label>
                        <div class="col-sm-4 ">
                            <input type="text" name="cost" value="' . $res->cost . '"  class="receipt"/>
                        </div>
                    </div>';
                echo '<input type="hidden" name="route" value="' . $res->id . '"  class="receipt"/>';
                echo ' <div class="form-group">
                    <label class="col-sm-4">Distance</label>
                        <div class="col-sm-4 ">
                            <input type="text" name="distance" value="' . $res->distance . '"  class="receipt"/>
                        </div>
                    </div>';
            }
            $buses = $this->Md->query("SELECT * FROM bus WHERE routeID = '" . $ID . "'  AND  active ='true' LIMIT 1");
            // var_dump($get_result);

            foreach ($buses as $bus) {
                echo ' <div class="form-group">
                    <label class="col-sm-4">Bus</label>
                        <div class="col-sm-4 ">
                            <input type="text" name="bus" value="' . $bus->regNo . '"  class="receipt"/>
                        </div>
                    </div>';
                $bus_no = $bus->regNo;
                $busID = $bus->id;
                $seats = $bus->seat;
            }
            $payments = $this->Md->query("SELECT * FROM payment WHERE bus = '" . $bus_no . "' AND STR_TO_DATE( created,  '%d-%m-%Y' ) = STR_TO_DATE(  '$date',  '%d-%m-%Y' ) ");
            // var_dump($get_result);
            echo 'No of passengers as of ' . $date . ' ' . count($payments);
            echo '<br>No of Seats left' . ' ' . ($seats - count($payments));
            echo ' <div class="form-group">
                    <label class="col-sm-4">Seat No.</label>
                        <div class="col-sm-4 ">
                            <input type="text" name="seat" value="' . (($seats) - ($seats - count($payments)) + 1) . '"  class="receipt"/>
                        </div>
                    </div>';
            echo '<input type="hidden" name="busID" value="' . $busID . '"  class="receipt"/>';
        }
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        $contact = $this->input->post('contact');
        // $contact = "071234567";
        $route = $this->input->post('routeID');
        // $route="1";
        if ($contact != "") {
            if ($route != "") {
                $busID = $this->Md->query_cell("SELECT * FROM bus WHERE routeID= '" . $this->input->post('routeID') . "' AND active ='true'", 'id');
                $bus = $this->Md->query_cell("SELECT * FROM bus WHERE routeID= '" . $this->input->post('routeID') . "' AND active ='true'", 'regNo');
                $p = array('name' => $this->input->post('name'), 'seat' => $this->input->post('seat'), 'bus' => $bus, 'cost' => $this->input->post('cost'), 'contact' => $this->input->post('contact'), 'email' => $this->input->post('email'), 'routeID' => $this->input->post('routeID'), 'barcode' => $this->input->post('barcode'), 'companyID' => $this->input->post('companyID'), 'busID' => $busID, 'date' => date('d-m-Y', strtotime($this->input->post('date'))), 'created' => date('d-m-Y'));
                $this->Md->save($p, 'payment');
            }
            if ($this->input->post('device') == "true") {
                $b["info"] = "information saved !";
                $b["status"] = "true";
                echo json_encode($b);
                return;
            }
            $status .= '<div class="alert alert-success">  <strong>Information submitted</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('payment/pay', 'refresh');
        }
    }

    public function code() {
        $this->load->helper(array('form', 'url'));
        $code = $this->input->post('barcode');
        // $route="1";
        if ($code != "") {
            $query = $this->Md->query("SELECT * FROM payment WHERE barcode LIKE '%$code%'");
            if ($query) {

                foreach ($query as $res) {

                    $b["info"] = "Data found";
                    $b["status"] = "true";
                    $b["name"] = $res->name;
                    $b["contact"] = $res->contact;
                    $b["cost"] = $res->cost;
                    $b["bus"] = $res->bus;
                    $b["seat"] = $res->seat;
                    echo json_encode($b);
                    return;
                }
            } else {
                $b["info"] = "No such payment made!";
                $b["status"] = "false";
                echo json_encode($b);
                return;
            }
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
                    $this->Md->update_dynamic($user_id, 'id', 'payment', $task);
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
        $query = $this->Md->query("SELECT * FROM payment");
        //$query = $this->Md->query("SELECT * FROM client");
        echo json_encode($query);
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $id = urldecode($this->uri->segment(3));

        $query = $this->Md->cascade($id, 'payment', 'id');

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                Information deleted	</strong>									
						</div>');
            redirect('payment', 'refresh');
        }
    }

}

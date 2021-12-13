<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardOperatorPacking extends CI_Controller{
    public function __construct(){
		parent::__construct();
		
		// print_r($this->session->userdata('username'));

        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
		}elseif($this->session->userdata('username') != 'Operator Packing'){
            redirect('user/not_allowed');
		}
		
    }

    public function index(){
        $this->load->view('dashboardpacking/dashboard_packing_operator_view');
    }
}

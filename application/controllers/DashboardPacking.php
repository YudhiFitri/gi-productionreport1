<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardPacking extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin Packing'){
            redirect('user/not_allowed') ;
        }        
    }

    public function index(){
        $this->load->view('dashboardpacking/dashboard_packing_view');
    }
}
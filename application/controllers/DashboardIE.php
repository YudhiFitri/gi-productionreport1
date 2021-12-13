<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardIE extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin IE'){
            redirect('user/not_allowed') ;
        }
    }

    public function index(){
        $this->load->view('dashboardie/dashboard_ie_view');
    }
}
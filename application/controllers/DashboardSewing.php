<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif(strpos($this->session->userdata('username'), 'Admin') !== false){
            redirect('user/not_allowed') ;
        }        
    }

    public function index(){
        $this->load->view('dashboardsewing/dashboard_sewing_view');
    }
}
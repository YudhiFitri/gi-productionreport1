<?php
defined('BASEPATH') or exit('no direct access script allowed');

class DashboardMekanik extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }else{
            if($this->session->userdata['username'] != "Admin Mekanik"){
                redirect('user/not_allowed');
            }
        }        
    }
    
    public function index(){
        $this->load->view('dashboardmekanik/dashboard_mekanik_view');
    }
}
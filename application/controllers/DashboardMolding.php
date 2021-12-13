<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin Molding'){
            redirect('user/not_allowed') ;
        }   
    }

    public function index(){
        $this->load->view('dashboardmolding/dashboard_molding_view');
    }
}
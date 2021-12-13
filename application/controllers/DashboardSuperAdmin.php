<?php
defined('BASEPATH') or exit('no direct script access allowed');

class DashboardSuperAdmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }else{
            
        }        
    }

    public function index(){
        $this->load->view('dashboardsuperadmin/dashboard_super_admin_view');
    }
}
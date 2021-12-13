<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Sewing extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('InputSewingModel');
    }

    public function center_panel(){
        $this->load->view('sewing/center_panel_view');
    }
    public function back_wings(){
        $this->load->view('sewing/back_wings_view');
    }

    public function cups(){
        $this->load->view('sewing/cups_view');
    }

}
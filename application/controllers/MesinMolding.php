<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesinMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('MesinMoldingModel');
    }

    public function ajax_get_by_barcode($barcode){
        $rst = $this->MesinMoldingModel->get_by_barcode($barcode);

        echo json_encode($rst);
    }
}
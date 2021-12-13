<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrderImport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrderImportModel');
    }

    public function index()
    {
        $data['page'] = 'import';
        $data['title'] = 'Import List Order';
        $this->load->view('order/orderimport_view', $data);
    }


}

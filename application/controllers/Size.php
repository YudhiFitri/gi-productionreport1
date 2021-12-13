<?php
defined('BASEPATH') or exit('No direct access allowed!');

class Size extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        // $this->load->library('excel');
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Super Admin'){
            redirect('user/not_allowed') ;
        }else{
            $this->load->model('SizeModel');
        }        
    }

    public function index(){
        $this->load->view('master/size_view');
    }

    public function ajax_list(){
        $list = $this->SizeModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_mastersize;
            $row[] = $k->size;
            $row[] = $k->group;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $k->id_mastersize . "'" . ')"><i class="fa fa-pencil"></i> Edit</a> 
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="remove(' . "'" . $k->id_mastersize . "'" . ')"><i class="fa fa-remove"></i> Delete</a>';            

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->SizeModel->count_all(),
            "recordsFiltered" => $this->SizeModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }

    public function ajax_get_by_size(){
        $data = $this->SizeModel->get_by_size();

        echo json_encode($data);
    }
    
}
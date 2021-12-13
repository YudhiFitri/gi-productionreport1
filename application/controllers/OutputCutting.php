<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputCutting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin Cutting'){
            redirect('user/not_allowed') ;
        }else{
            // $this->load->library('excel');

            $this->load->model('LineModel');

            $this->load->model('InputSewingModel');
            $this->load->model('ViewCuttingModel');
            $this->load->model('SizeModel');
            $this->load->model('SamModel');
            $this->load->model('InputCuttingModel');
            $this->load->model('OutputCuttingModel');
        }        
    }
    
    public function index(){
        $this->load->view('cutting/output_cutting_view');
    }

    public function ajax_list(){
        $list = $this->InputSewingModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_input_sewing;
            $row[] = $k->line;
            $row[] = date('d-m-Y', strtotime($k->tgl));
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->no_bundle;
            $row[] = $k->size;
            $row[] = $k->qty_pcs;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->InputSewingModel->count_all(),
            "recordsFiltered" => $this->InputSewingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        // exit;        
    }
    
    public function ajax_get_by_barcode(){
        // $rst = $this->ViewCuttingModel->get_by_barcode($barcode);
        // echo json_encode($rst);
        if (isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];

            $line = $dataStr['line'];
            $barcode = $dataStr['barcode'];

            $rst = $this->InputSewingModel->get_by_line_barcode($line, $barcode);

            echo json_encode($rst);
        };
    }

    public function ajax_save(){
        $rst = $this->InputSewingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_get_all_line(){
        $rst = $this->LineModel->get_all();

        echo json_encode($rst);
    }

    public function ajax_get_by_size(){
        $data = $this->SizeModel->get_by_size();

        echo json_encode($data);        
    }

    public function ajax_get_cutting_sam(){
        $rst = $this->SamModel->get_cutting_sam();

        echo json_encode($rst);
    }    

    public function ajax_get_sewing_sam(){
        $rst = $this->SamModel->get_sewing_sam();

        echo json_encode($rst);
    }

    public function ajax_check_by_barcode($bar){
        $rst = $this->InputCuttingModel->check_by_barcode($bar);

        echo json_encode($rst);
    }

    public function change_line(){
        // $data['orcs'] = $this->InputSewingModel->get_orc_not_in_sewing();

        $this->load->view('cutting/change_line_view');
    }

    public function ajax_get_orcs(){
        $result = $this->InputSewingModel->get_orc_not_in_sewing();

        echo json_encode($result);
    }

    public function ajax_get_by_orc1($orc){
        $result = $this->InputSewingModel->get_by_orc1($orc);

        echo json_encode($result);
    }

    public function ajax_update(){
        $rst = $this->InputSewingModel->update_line();

        echo json_encode($rst);
    }

    public function ajax_comparing_inputcutting_inputsewing($orc){
        $rst = $this->OutputCuttingModel->comparing_inputcutting_inputsewing($orc);

        echo json_encode($rst);
    }

    
}
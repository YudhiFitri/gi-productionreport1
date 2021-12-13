<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin Molding'){
            redirect('user/not_allowed') ;
        }else{
            // $this->load->library('excel');

            // $this->load->model('InputMoldingModel');
            $this->load->model('InputMoldingDetailModel');
            $this->load->model('OutputMoldingModel');
            $this->load->model('OutputMoldingDetailModel');

            $this->load->model('MesinMoldingModel');
            $this->load->model('ShiftMoldingModel');

            $this->load->model('ViewOutputMoldingModel1');
            $this->load->model('ViewCuttingModel');
            $this->load->model('ViewInputMoldingModel1');

            // $this->load->model('OuterMoldOutputMoldingModel');
            // $this->load->model('MidMoldOutputMoldingModel');
            // $this->load->model('LinningMoldOutputMoldingModel');
        }
        
    }
    
    public function index(){
        // $data['dataShift'] = $this->ShiftMoldingModel->get_shift();
        $this->load->view('molding/output_molding_view');
    }

    public function ajax_get_shift(){
        $rst = $this->ShiftMoldingModel->get_shift();

        echo json_encode($rst);
    }

    public function ajax_list(){
        $list = $this->ViewOutputMoldingModel1->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            $row[] = $k->id_output_molding;
            $row[] = $k->shift;
            $row[] = $k->no_mesin;
            $row[] = date('d-m-Y',strtotime($k->tgl));
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->size;
            $row[] = $k->no_bundle;
            // $row[] = $k->qty_pcs;
            $row[] = $k->outermold_sam_result;
            $row[] = $k->midmold_sam_result;
            $row[] = $k->linningmold_sam_result;
            

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ViewOutputMoldingModel1->count_all(),
            "recordsFiltered" => $this->ViewOutputMoldingModel1->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;         
    }

    // public function ajax_list(){
    //     $list = $this->OutputMoldingModel->get_datatables();
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach($list as $k) {
    //         $no++;
    //         $row = array();
    //         $row[] = $k->id_output_molding;
    //         $row[] = $k->no_mesin;
    //         $row[] = date('d-m-Y',strtotime($k->tgl));
    //         $row[] = $k->orc;
    //         $row[] = $k->style;
    //         $row[] = $k->color;
    //         $row[] = $k->no_bundle;
    //         $row[] = $k->size;  
    //         $row[] = $k->qty_pcs;
    //         $row[] = $k->outer_mold;
    //         $row[] = $k->mid_mold;
    //         $row[] = $k->linning_mold;

    //         $data[] = $row;
    //     }
    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->OutputMoldingModel->count_all(),
    //         "recordsFiltered" => $this->OutputMoldingModel->count_filtered(),
    //         "data" => $data,
    //     );
    //     echo json_encode($output);
    //     exit;        
    // }
    
    public function get_all_no_mesin(){
        $rst = $this->MesinMoldingModel->get_all();

        echo json_encode($rst);
    }

    public function ajax_get_by_barcode($barcode){
        $rst = $this->InputMoldingModel->get_by_barcode($barcode);

        // print_r($rst);
        echo json_encode($rst);
    }

    public function ajax_get_by_barcode_outer_mold($code){
        $rst = $this->OuterMoldOutputMoldingModel->get_by_outermold_barcode($code);
        if($rst == 0){
            $result = $this->ViewCuttingModel->get_by_barcode_outer_mold($code);
        }else{
            $result = 0;
        }

        echo json_encode($result);

    }

    public function ajax_get_by_barcode_mid_mold($code){
        $rst = $this->MidMoldOutputMoldingModel->get_by_midmold_barcode($code);
        if($rst == 0){
            $result = $this->ViewCuttingModel->get_by_barcode_mid_mold($code);
        }else{
            $result = 0;
        }

        echo json_encode($result);

        // $rst = $this->ViewCuttingModel->get_by_barcode_mid_mold($code);

        // echo json_encode($rst);
    }
    
    public function ajax_get_by_barcode_linning_mold($code){
        // $rst = $this->ViewCuttingModel->get_by_barcode_linning_mold($code);

        // echo json_encode($rst);

        $rst = $this->LinningMoldOutputMoldingModel->get_by_linningmold_barcode($code);
        if($rst == 0){
            $result = $this->ViewCuttingModel->get_by_barcode_linning_mold($code);
        }else{
            $result = 0;
        }

        echo json_encode($result);        
    }

    public function ajax_save(){
        $rst = $this->OutputMoldingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_save_outer_mold(){
        $rst = $this->OuterMoldOutputMoldingModel->save();

        echo json_encode($rst);
    }

    public function ajax_save_mid_mold(){
        $rst = $this->MidMoldOutputMoldingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_save_linning_mold(){
        $rst = $this->LinningMoldOutputMoldingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_get_molding_mesin_by_barcode($code){
        $rst = $this->MesinMoldingModel->get_by_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_check_outermold_barcode($code){
        $rst = $this->InputMoldingDetailModel->check_outermold_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_check_midmold_barcode($code){
        $rst = $this->InputMoldingDetailModel->check_midmold_barcode($code);

        echo json_encode($rst);
    }
    
    public function ajax_check_linningmold_barcode($code){
        $rst = $this->InputMoldingDetailModel->check_linningmold_barcode($code);

        echo json_encode($rst);
    }    

    public function ajax_get_by_outermold_barcode($code){
        $rst = $this->ViewInputMoldingModel1->get_by_outermold_barcode($code);

        echo json_encode($rst);
    }
    
    public function ajax_get_by_midmold_barcode($code){
        $rst = $this->ViewInputMoldingModel1->get_by_midmold_barcode($code);

        echo json_encode($rst);
    }
    
    public function ajax_get_by_linningmold_barcode($code){
        $rst = $this->ViewInputMoldingModel1->get_by_linningmold_barcode($code);

        echo json_encode($rst);
    }
    
    public function ajax_check_by_barcode_outer($code){
        $rst = $this->OutputMoldingDetailModel->check_by_barcode_outer($code);

        echo json_encode($rst);
    }

    public function ajax_check_by_barcode_mid($code){
        $rst = $this->OutputMoldingDetailModel->check_by_barcode_mid($code);

        echo json_encode($rst);
    }
    
    public function ajax_check_by_barcode_linning($code){
        $rst = $this->OutputMoldingDetailModel->check_by_barcode_linning($code);

        echo json_encode($rst);
    }
    
    public function ajax_save_detail_outermold(){
        $rst = $this->OutputMoldingDetailModel->save_detail_outermold();

        echo json_encode($rst);
    }

    public function ajax_save_detail_midmold(){
        $rst = $this->OutputMoldingDetailModel->save_detail_midmold();

        echo json_encode($rst);
    }
    
    public function ajax_save_detail_linningmold(){
        $rst = $this->OutputMoldingDetailModel->save_detail_linningmold();

        echo json_encode($rst);
    }    
}
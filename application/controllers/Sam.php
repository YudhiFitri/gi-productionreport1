<?php
defined('BASEPATH') or exit('No direct access allowed!');

class Sam extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        // $this->load->library('excel');
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }else{
            $userName = $this->session->userdata('username');
            if($userName == "Super Admin" || $userName == "Admin IE"){
                $this->load->model('SamModel');
            }else{
                redirect('user/not_allowed');
            }
        }
    }
    
    public function index(){
        $this->load->view('master/sam_view');
    }

    public function ajax_list(){
        $list = $this->SamModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_master_sam;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->grup_size;
            $row[] = $k->sam_cutting;
            $row[] = $k->linning_sam;
            $row[] = $k->mid_sam;
            $row[] = $k->outer_sam;
            $row[] = $k->total_mold_sam;
            $row[] = $k->center_panel_sam;
            $row[] = $k->back_wings_sam;
            $row[] = $k->cups_sam;
            $row[] = $k->assembly_sam;
            $row[] = $k->total_sewing_sam;
            $row[] = $k->packing_sam;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->SamModel->count_all(),
            "recordsFiltered" => $this->SamModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }
    
    public function ajax_get_cutting_sam(){
        $rst = $this->SamModel->get_cutting_sam();

        echo json_encode($rst);
    }

    public function ajax_get_styles(){
        $rst = $this->SamModel->get_style();

        echo json_encode($rst);
    }

    public function ajax_save(){
        $rSave = $this->SamModel->save();

        echo json_encode($rSave);
    }

    public function ajax_update(){
        $rUpdate = $this->SamModel->update();

        echo json_encode($rUpdate);
    }
}
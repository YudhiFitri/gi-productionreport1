<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cutting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
            
        }elseif($this->session->userdata('username') != 'Admin Cutting'){
            redirect('user/not_allowed') ;
        }else{
            // $this->load->library('excel');
            $this->load->model('ViewCuttingModel');
            $this->load->model('CuttingModel');
            $this->load->model('CuttingDetailModel');

            $this->load->model('LineModel');
            $this->load->model('ViewCuttingDoneModel');
            $this->load->model('OrderModel');

            $this->load->model('ViewCuttingWithMoldModel');
            $this->load->model('SizeModel');
			$this->load->model('SamModel');
			
			$this->load->model('KapasitasKartonModel');
			$this->load->model('PackingListModel');			

        }        
    }
    
    public function index(){
        $this->load->view('cutting/cutting_view');
    }

    public function ajax_list(){
        $list = $this->CuttingModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_cutting;
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->buyer;
            $row[] = $k->comm;
            $row[] = $k->so;
            $row[] = $k->qty;
            $row[] = $k->boxes;
            $row[] = date('d-m-Y', strtotime($k->prepare_on));

            // $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Show Detail" onclick="showDetail(' . "'" . $k->id_cutting . "'" . ')"><i class="fa fa-pencil"></i> Show Detail</a>';
            $row[] = '<button type="button" class="btn btn-info dropdown-toggle shadow btn-sm" data-toggle="dropdown">Take Action</button>
                      <ul class="dropdown-menu shadow">
                        <li class="dropdown-item"><a href="javascript:void(0)" title="Show Size Detail" onclick="showSizeDetail('. "'" . $k->id_cutting . "'" . ')"><i class="fa fa-file"></i> Show Size Detail</a></li>
                        <li class="dropdown-item"><a href="javascript:void(0)" title="Delete This ORC" onclick="deleteData('. "'" . $k->orc . "'" . ')"><i class="fa fa-trash"></i> Delete This ORC</a></li>
                        <li class="dropdown-divider"></li>
                      </ul>';            

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->CuttingModel->count_all(),
            "recordsFiltered" => $this->CuttingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }

    public function add_cutting(){
        $this->load->view('cutting/add_cutting_view');
    }

    public function ajax_get_by_orc($orc){
        $result = $this->OrderModel->get_by_orc($orc);

        echo json_encode($result);
    }

    public function ajax_get_order_all(){
        $result = $this->OrderModel->get_all();

        echo json_encode($result);
    }

    public function ajax_get_order_not_to_cutting(){
        $result = $this->OrderModel->get_by_no_to_cutting();

        echo json_encode($result);
    }
    
    public function ajax_get_all_size(){
        $rst = $this->SizeModel->get_all();

        echo json_encode($rst);
    }

    public function create_barcode($code){
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

        Zend_Barcode::render('code39', 'image', array('text' => $code));
    }

    public function ajax_save_cutting(){
        $valBack = $this->CuttingModel->save();

        echo json_encode($valBack);
    }

    public function ajax_save_detail_cutting(){
        $rst = $this->CuttingDetailModel->save();

        echo json_encode($rst);
    }

    public function ajax_get_by_id_cutting($idCutting){
        $rst = $this->CuttingDetailModel->get_by_id_cutting($idCutting);

        echo json_encode($rst);
    }

    public function cutting_done(){
        $this->load->view('cutting/cutting_done_view');
    }

    public function cutting_print(){
        $this->load->view('cutting/cutting_print_view');
    }    

    public function ajax_update_tgl_cutting(){
        $rst = $this->CuttingDetailModel->update2();

        echo json_encode($rst);
    }

    public function ajax_list_cutting_done(){
        $rst = $this->ViewCuttingDoneModel->get_all();

         echo json_encode($rst);
    }

    public function ajax_get_cutting_detail_done($idCutting){
        $r = $this->CuttingDetailModel->get_cutting_done($idCutting);

        echo json_encode($r);
    }

    public function ajax_get_all(){
        $r = $this->CuttingModel->get_all();

        echo json_encode($r);
    }

    public function get_all_line(){
        $r = $this->LineModel->get_all();

        echo json_encode($r);
    }

    public function ajax_open_print_preview($data){
        $this->load->view("cutting/print_barcode_view", $data);
        
    }

    public function print_barcode($id){
        // $data['cutting'] = $this->CuttingModel->get_by_id($id);
        // $data['detail'] = $this->CuttingDetailModel->get_by_id_cutting($id);

        // var_dump($data);
        // echo json_encode($data);
        // $this->load->view("cutting/print_barcode_view", $data);
        // $data['cutting'] = $this->ViewCuttingDoneModel->get_by_id($id);
        // $this->load->view("cutting/print_barcode_view1", $data);

        $rst = $this->ViewCuttingDoneModel->get_by_id($id);

        echo json_encode($rst);

    }

    public function print_barcode_preview(){
        $this->load->view("cutting/print_barcode_view1");
    }

    public function print_barcode_molding($id){
        // $data['cutting'] = $this->CuttingModel->get_by_id($id);
        // $data['detail'] = $this->CuttingDetailModel->get_by_id_cutting_molding($id);

        $data['mold'] = $this->ViewCuttingWithMoldModel->get_by_id($id);

        $this->load->view("cutting/print_barcode_molding", $data);

    }

    public function ajax_update_order($orc){
        $rst = $this->OrderModel->update_by_orc($orc);

        echo json_encode($rst);

    }

    public function ajax_reprint_bundle(){
        $this->load->view('cutting/reprint_bundle_view');
    }

    public function ajax_reprint_molding_bundle(){
        $this->load->view('molding/reprint_mold_bundle_view');
    }

    public function ajax_reprint_panty_bundles(){
        $this->load->view('cutting/reprint_panty_bundle_view');
    }    

    public function ajax_get_orc(){
        $rst = $this->ViewCuttingDoneModel->get_all_orc();

        echo json_encode($rst);
    }

    public function ajax_get_orc_mold(){
        $rst = $this->ViewCuttingWithMoldModel->get_all_orc();

        echo json_encode($rst);
    }    

    public function ajax_get_bundles($orc){
        $rst = $this->ViewCuttingDoneModel->get_by_orc($orc);

        echo json_encode($rst);
    }

    public function ajax_get_mold_bundles($orc){
        $rst = $this->ViewCuttingWithMoldModel->get_by_orc($orc);

        echo json_encode($rst);
    }    

    public function show_print_bundle(){
        $this->load->view('cutting/bundles_print_preview');
    }

    public function show_print_bundle_mold(){
        $this->load->view('cutting/mold_bundles_print_preview');
    }

    public function show_print_bundle_panty(){
        $this->load->view('cutting/panty_bundles_print_preview');
    }

    public function ajax_get_by_size(){
        $data = $this->SizeModel->get_by_size();

        echo json_encode($data);        
    }

    public function ajax_get_cutting_sam(){
        $rst = $this->SamModel->get_cutting_sam();

        echo json_encode($rst);
    }
    
    public function ajax_get_sam(){
        $rst = $this->SamModel->get_sam();

        echo json_encode($rst);
    }

    public function ajax_check_by_orc_size(){
        $rst = $this->ViewCuttingDoneModel->check_by_orc_size();

        echo json_encode($rst);
    }

    public function ajax_get_orc_panty(){
        $rst = $this->ViewCuttingDoneModel->get_orc_panty();

        echo json_encode($rst);
    }

    public function ajax_get_by_orc_cutting($orc){
        $rows = $this->CuttingModel->get_by_orc($orc);

        $dataReturn = array();
        foreach($rows as $row){
            $rst = $this->CuttingDetailModel->get_by_id_cutting($row->id_cutting);
            $dataReturn[] = $rst;
        }
        // $data['detail'] = $dataReturn;
        // $this->load->view('cutting/cutting_detail_view', $data);
        echo json_encode($dataReturn);

        // echo json_encode($rows);
    }

    public function show_cutting_detail(){
        $this->load->view('cutting/cutting_detail_view');
    }

    public function ajax_delete_by_orc($orc){
        $r = $this->CuttingModel->delete_by_orc($orc);

        echo json_encode($r);
	}
	
	public function ajax_get_kapasitas_karton(){
		$row = $this->KapasitasKartonModel->get_by_style_size();

		echo json_encode($row);
	}	

	public function ajax_save_packing(){
		$result = $this->PackingListModel->save_packing();

		echo json_encode($result);
	}	

}

<?php
defined('BASEPATH')or exit('No direct script access allowed!');

class Order extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
            
        }elseif($this->session->userdata('username') != 'Admin PPIC'){
            redirect('user/not_allowed') ;
        }else{
            // $this->load->library('excel');

            $this->load->model('SizeModel');
            $this->load->model('OrderModel');
            $this->load->model('OrderDetailModel');
            $this->load->model('ViewOrderModel');

            $this->load->model('SamModel');

            $this->load->model('LineModel');
        }        
    }

    public function index(){
        $this->load->view('order/order_view');
    }

    public function ajax_list(){
        $list = $this->ViewOrderModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_order;
            $row[] = $k->style;
            $row[] = $k->orc;
            $row[] = $k->comm;
            $row[] = $k->buyer;
            $row[] = $k->so;
            $row[] = $k->color;
            $row[] = $k->qty;
            $row[] = date('d-m-Y', strtotime($k->etd));

            // $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Show Detail" onclick="showDetail(' . "'" . $k->id_cutting . "'" . ')"><i class="fa fa-pencil"></i> Show Detail</a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ViewOrderModel->count_all(),
            "recordsFiltered" => $this->ViewOrderModel->count_filtered(),
            "data" => $data,
        );
        
        echo json_encode($output);
        // print_r($output);
        // exit;        
    }
    
    public function ajax_get_all(){
        $rst = $this->OrderModel->get_all();

        echo json_encode($rst);
    }

    public function add_order(){
        $data['styles'] = $this->SamModel->get_style();
        $data['lines'] = $this->LineModel->get_all();

        $this->load->view('order/add_order_view', $data);
    }

    public function ajax_get_all_size(){
        $rst = $this->SizeModel->get_all();

        echo json_encode($rst);
    }

    public function ajax_save(){
        $r = $this->OrderModel->save();

        echo json_encode($r);
    }

    public function edit_order($id){
        $data['order'] = $this->OrderModel->get_by_id($id);
        $data['styles'] = $this->SamModel->get_style();
        $data['lines'] = $this->LineModel->get_all();

        $this->load->view('order/edit_order_view', $data);
    }

    public function ajax_get_by_orc($orc){
        $rst = $this->OrderModel->get_by_orc($orc);

        echo json_encode($rst);

    }

    public function ajax_delete_order($id){
        $r = $this->OrderModel->delete($id);

        echo json_encode($r);
    }

    public function ajax_get_by_id($id){
        $rst = $this->OrderModel->get_by_id($id);

        echo json_encode($rst);
    }

    public function ajax_get_all_style(){
        $rst = $this->SamModel->get_style();
        
        echo json_encode($rst);
    }

    public function ajax_get_all_line(){
        $rst = $this->LineModel->get_all();

        echo json_encode($rst);
    }

    public function ajax_update(){
        $rst = $this->OrderModel->update();

        echo json_encode($rst);
    }

    public function import()
    {
        $this->load->library('excel');
        if(isset($_FILES['file']['name'])){
            $path = $_FILES['file']['tmp_name'];
            $obj = PHPExcel_IOFactory::load($path);
            foreach($obj->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<= $highestRow; $row++){
                    $thisRow = $worksheet->getRowIterator($row)->current();
                    if($this->isRowEmpty($thisRow) == false){
                        $style = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $style_sam = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $orc = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $comm = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $buyer = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $so = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $color = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $qty = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $etd = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $plan_export = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $line_allocation1 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $line_allocation2 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $line_allocation3 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

                        $excel_date = $etd; //here is that value 41621 or 41631
                        $unix_date = ($excel_date - 25569) * 86400;
                        $excel_date = 25569 + ($unix_date / 86400);
                        $unix_date = ($excel_date - 25569) * 86400;

                        $excel_date1 = $plan_export; //here is that value 41621 or 41631
                        $unix_date1 = ($excel_date1 - 25569) * 86400;
                        $excel_date1 = 25569 + ($unix_date1 / 86400);
                        $unix_date1 = ($excel_date1 - 25569) * 86400;
                        // echo gmdate("Y-m-d", $unix_date);
                        

                        $data[] = array(
                            'style' => $style,
                            'style_sam' => $style_sam,
                            'orc' => $orc,
                            'comm' => $comm,
                            'buyer' => $buyer,
                            'so' => $so,
                            'color' => $color,
                            'qty' => $qty,
                            'etd' => gmdate("Y-m-d", $unix_date),
                            'plan_export' => gmdate('Y-m-d', $unix_date1),
                            'line_allocation1' => $line_allocation1,
                            'line_allocation2' => $line_allocation2,
                            'line_allocation3' => $line_allocation3,
                        );
                    }
                }
                $rst = $this->OrderModel->insert_bulk($data);

                echo json_encode($rst);
            }
        }

    }    

    function isRowEmpty($r){
        foreach ($r->getCellIterator() as $cell) {
            if ($cell->getValue()) {
                return false;
            }
        }
    
        return true;        
    }
}
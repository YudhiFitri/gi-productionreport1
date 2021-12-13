<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputMolding extends CI_Controller{
    var $success = [];
    var $barcode;
    var $codeUpper;

    public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('user');
        }elseif($this->session->userdata('username') != 'Admin Molding'){
            redirect('user/not_allowed') ;
        }else{
            // $this->load->library('excel');

            $this->load->model('InputMoldingModel');
            $this->load->model('OuterMoldInputMoldingModel');
            $this->load->model('MidMoldInputMoldingModel');
            $this->load->model('LinningMoldInputMoldingModel');
            $this->load->model('CuttingDetailModel');
            $this->load->model('ViewCuttingModel');
            // $this->load->model('ViewInputMoldingModel');
            $this->load->model('ViewInputMoldingModel1');
            $this->load->model('InputCuttingModel');
            $this->load->model('InputMoldingDetailModel');
            $this->load->model('SizeModel');
            $this->load->model('SamModel');
        }

    }
    
    public function index(){
        $this->load->view('molding/input_molding_view');
    }

    public function ajax_list(){
        $list = $this->ViewInputMoldingModel1->get_datatables();
        // var_dump($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_input_molding;
            $row[] = date('d-m-Y',strtotime($k->tgl));
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->size;
            $row[] = $k->no_bundle;
            $row[] = $k->qty_pcs;
            $row[] = '<input type="radio" class="flat-red" value="Outer"' . ($k->outer !="" ? "checked" : "disabled") . '>' ;//($k->outer != "" ? "yes" : "no");
            $row[] = '<input type="radio" class="flat-red" value="Mid"' . ($k->mid !="" ? "checked" : "disabled") . '>';
            $row[] = '<input type="radio" class="flat-red" value="Linning"' . ($k->linning !="" ? "checked" : "disabled") . '>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ViewInputMoldingModel1->count_all(),
            "recordsFiltered" => $this->ViewInputMoldingModel1->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }
    
    public function ajax_get_by_barcode($barcode){
        $rst = $this->ViewCuttingModel->get_by_barcode($barcode);

        // print_r($rst);
        echo json_encode($rst);
    }

    public function ajax_check_outermold_barcode($code){
        $result = $this->InputMoldingDetailModel->check_outermold_barcode($code);
        if($result == 0){
            $rst = $this->ViewCuttingModel->get_by_barcode_outer_mold($code);
        }else{
            $rst = 0;
        }

        echo json_encode($rst);
    }

    public function ajax_check_midmold_barcode($code){
        $result = $this->InputMoldingDetailModel->check_midmold_barcode($code);
        if($result==0){
            $rst = $this->ViewCuttingModel->get_by_barcode_mid_mold($code);
        }else{
            $rst = 0;
        }        

        echo json_encode($rst);
    }
    
    public function ajax_check_linningmold_barcode($code){
        $result = $this->InputMoldingDetailModel->check_linningmold_barcode($code);
        if($result==0){
            $rst = $this->ViewCuttingModel->get_by_barcode_linning_mold($code);
        }else{
            $rst = 0;
        }        

        echo json_encode($rst);
    }

    public function ajax_save(){
        $rst = $this->InputMoldingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_save_outer_mold(){
        $rst = $this->InputMoldingDetailModel->save_outer_mold();

        echo json_encode($rst);
    }

    public function ajax_save_mid_mold(){
        $rst = $this->InputMoldingDetailModel->save_mid_mold();

        echo json_encode($rst);
    }
    
    public function ajax_save_linning_mold(){
        $rst = $this->InputMoldingDetailModel->save_linning_mold();

        echo json_encode($rst);
    }
    
    public function ajax_check_barcode($barcode){
        $rst = $this->CuttingDetailModel->get_mold_barcode($barcode);

        echo json_encode($rst);
    }

    public function ajax_get_by_size(){
        $data = $this->SizeModel->get_by_size();

        echo json_encode($data);        
    }

    public function ajax_get_outermold_sam(){
        $rst = $this->SamModel->get_outermold_sam();

        echo json_encode($rst);
    }
    
    public function ajax_get_midmold_sam(){
        $rst = $this->SamModel->get_midmold_sam();

        echo json_encode($rst);
    }
    
    public function ajax_get_linningmold_sam(){
        $rst = $this->SamModel->get_linningmold_sam();

        echo json_encode($rst);
    }
    
    public function ajax_check_outermold_at_detail_cutting($code){
		$rst = $this->CuttingDetailModel->check_outer_mold($code);
		
		echo json_encode($rst);
	}
	
    public function ajax_check_midmold_at_detail_cutting($code){
		$rst = $this->CuttingDetailModel->check_mid_mold($code);
		
		echo json_encode($rst);
	}	
	
    public function ajax_check_linningmold_at_detail_cutting($code){
		$rst = $this->CuttingDetailModel->check_linning_mold($code);
		
		echo json_encode($rst);
    }

    public function ajax_cek_by_orc_nobundle(){
		// $rst = $this->InputMoldingModel->cek_by_orc($orc);
		$rst = $this->ViewInputMoldingModel1->cek_by_orc_nobundle();

        echo json_encode($rst);
    }

    public function ajax_get_by_orc_nobundle(){
        $rst = $this->ViewInputMoldingModel1->get_by_orc_nobundle();

        echo json_encode($rst);
    }

    public function ajax_update_outer_mold(){
        $rst = $this->InputMoldingDetailModel->update_outer_mold();

        echo json_encode($rst);
    }

    public function ajax_update_mid_mold(){
        $rst = $this->InputMoldingDetailModel->update_mid_mold();

        echo json_encode($rst);
    }

    public function ajax_update_linning_mold(){
        $rst = $this->InputMoldingDetailModel->update_linning_mold();

        echo json_encode($rst);
    }
    
    public function ajax_save_data($code){
        //check the barcode at cutting_detail
        $this->codeUpper = strtoupper($code);
        $rst = $this->CuttingDetailModel->check_barcode_mold($this->codeUpper);
        if($rst <= 0){
            $this->success = array(
                'success' => false,
                'msg' => 'Barcode tidak ada!'
                // 'msg' => $rst
            );
            echo json_encode($this->success);
            exit();
        }else{
            $rst = $this->InputMoldingDetailModel->check_barcode_mold($this->codeUpper);
            if($rst > 0 ){
                $this->success = array(
                    'success' => false,
                    // 'msg' => $rst
                    'msg' => 'Barcode sudah pernah di scan!'
                );
                echo json_encode($this->success);
                exit();                
            }else{
                // $this->barcode = $code;
                $result = $this->ViewCuttingModel->get_by_barcode_mold($this->codeUpper);
                if($result != null){
                    $rst = $this->ViewInputMoldingModel1->cek_by_orc_nobundle1($result->orc, $result->no_bundle);
                    if($rst == 0){
                        //input molding
                        // $this->_saveInputMolding($result);
                        $id = $this->InputMoldingModel->save1($result);
                        if($id > 0){
                            $finalResult = $this->_saveDetail($result, $this->codeUpper, $id);
                            if($finalResult){
                                $this->success = array(
                                    'success' => true,
                                    'msg' => 'Data MOLD berhasil disimpan!'                                    
                                );
                            }else{
                                $this->success = array(
                                    'success' => false,
                                    'msg' => 'Data MOLD gagal disimpan, terjadi kesalahan'                                    
                                );                                
                            }
                            echo json_encode($this->success); 
                            exit();
                        }
                    }else{
                        //update molding
                        $finalResult = $this->_updateDetail($result, $this->codeUpper);
                        if($finalResult == true){
                            $this->success = array(
                                'success' => true,
                                'msg' => 'Data MOLD berhasil diupdate!'                                    
                            );
                        }else{
                            $this->success = array(
                                'success' => false,
                                'msg' => 'Data MOLD gagal diupdate, terjadi kesalahan'                                    
                                // 'msg' => $finalResult
                            );                                
                        }

                        echo json_encode($this->success); 
                        // echo json_encode($finalResult);
                        // exit();                        
                    }

                }
            }
        }
        // $rst = $this->InputMoldingDetail->saveOuter($code);
    }

    function _get_sam($dataForSAM){
        $color = $dataForSAM->color;
        
        // if(strpos($color, "BLACK") == true){
        //     $colorGroup = "Black";
        // }else if(strpos($color, "White") == true){
        //     $colorGroup = "White";
        // }else if(strpos($color, "BLACK") == false && strpos($color, "WHITE") == false){
        //     $colorGroup = "color";
        // }

		$blackPattern = '/black/i';
		$whitePattern = '/white/i';
		if(preg_match($blackPattern, $color) == 1){
			$colorGroup = 'Black';
		}else if(preg_match($whitePattern, $color) == 1){
			$colorGroup = 'White';
		}else{
			$colorGroup = 'color';
		}        

        $sizeData = $this->SizeModel->get_by_size1($dataForSAM->size);
        $dataForSAM = array(
            'style' => $dataForSAM->style,
            'color' => $colorGroup,
            'group_size' => $sizeData->group
        );

        $dataSAM = $this->SamModel->get_sam1($dataForSAM);
        return $dataSAM;
    }

    function _updateDetail($data, $code){
        $dt = array(
            'orc' => $data->orc,
            'no_bundle' => $data->no_bundle
        );

        $ret = $this->ViewInputMoldingModel1->get_by_orc_nobundle($dt);
        if($ret != null){
            $dtSAM = $this->_get_sam($ret);
            // $codeUpper = strtoupper($code);
            $prefix = substr($code,0,1);

            $dataMold = array(
                "id_input_molding" => $ret->id_input_molding,
                "no_bundle" => $ret->no_bundle,
                // "qty_pcs" => $ret->qty_pcs,
                ($prefix == "O" ? "outermold_sam" : ($prefix == "M" ? "mildmold_sam" : "linningmold_sam")) =>
                ($prefix == "O" ? $dtSAM->outer_sam : ($prefix == "M" ? $dtSAM->mid_sam : $dtSAM->linning_sam)),                
                ($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code
                // "outermold_sam" => $dtSAM->outer_sam,
                // "outermold_barcode" => $code
            );
    
            $retVal = $this->InputMoldingDetailModel->update_mold1($dataMold);
            // print_r($retVal);
            // return $retVal;
            if($retVal > 0){
                return true;
            }else{
                return false;
            }
            // return $dataMold;
            // vdebug($dataMold);
        }

    }

    function _saveDetail($data, $b, $i){

        $dataSAM = $this->_get_sam($data);
        // $codeUpper = strtoupper($b);
        $prefix = substr($b,0,1);

        $dataOuterMold = array(
            "id_input_molding" => $i,
            "no_bundle" => $data->no_bundle,
            "size" => $data->size,
            "group_size" => $dataSAM->grup_size,
            "qty_pcs" => $data->qty_pcs,
            ($prefix == "O" ? "outermold_sam" : ($prefix == "M" ? "mildmold_sam" : "linningmold_sam")) =>
            ($prefix == "O" ? $dataSAM->outer_sam : ($prefix == "M" ? $dataSAM->mid_sam : $dataSAM->linning_sam)),
            // "outermold_sam" => $dataSAM->outer_sam,
            // "outermold_barcode" => $b
            ($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) =>$b
        );

        $retVal = $this->InputMoldingDetailModel->save_mold1($dataOuterMold);
        if($retVal > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
}

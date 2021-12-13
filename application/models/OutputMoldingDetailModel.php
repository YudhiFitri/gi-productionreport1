<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OutputMoldingDetailModel extends CI_Model{
    var $table = 'output_molding_detail';

    public function check_by_barcode_outer($code){
        $rst = $this->db->get_where($this->table, array('outermold_barcode' => $code));

        return $rst->num_rows();
    }

    public function check_by_barcode_mid($code){
        $rst = $this->db->get_where($this->table, array('midmold_barcode' => $code));

        return $rst->num_rows();
    }
    
    public function check_by_barcode_linning($code){
        $rst = $this->db->get_where($this->table, array('linningmold_barcode' => $code));

        return $rst->num_rows();
    }
    
    public function save_detail_outermold(){
        if(isset($_POST['dataOuterMold'])){
            $dataOM = $_POST['dataOuterMold'];

            $data = array(
                'id_output_molding' => $dataOM['id_output_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'group_size' => $dataOM['group_size'],
                'qty_outermold' => $dataOM['qty_outermold'],
                'outermold_barcode' => $dataOM['outermold_barcode'],
                'outermold_sam_result' => $dataOM['outermold_sam_result'],
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }        
    }

    public function save_detail_midmold(){
        if(isset($_POST['dataMidMold'])){
            $dataOM = $_POST['dataMidMold'];

            $data = array(
                'id_output_molding' => $dataOM['id_output_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'group_size' => $dataOM['group_size'],
                'qty_midmold' => $dataOM['qty_midmold'],
                'midmold_barcode' => $dataOM['midmold_barcode'],
                'midmold_sam_result' => $dataOM['midmold_sam_result'],
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }        
    }
    
    public function save_detail_linningmold(){
        if(isset($_POST['dataLinningMold'])){
            $dataOM = $_POST['dataLinningMold'];

            $data = array(
                'id_output_molding' => $dataOM['id_output_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'group_size' => $dataOM['group_size'],
                'qty_linningmold' => $dataOM['qty_linningmold'],
                'linningmold_barcode' => $dataOM['linningmold_barcode'],
                'linningmold_sam_result' => $dataOM['linningmold_sam_result'],
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }        
    }    
}
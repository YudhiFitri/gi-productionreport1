<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OuterMoldInputMoldingModel extends CI_Model{
    // var $table="outermold_input_molding";
    var $table="input_detail_molding";

    public function save_outer_mold(){
        if(isset($_POST['dataOuterMold'])){
            $dataOM = $_POST['dataOuterMold'];

            $data = array(
                'id_input_molding' => $dataOM['id_input_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'group_size' =>$dataOM['group_size'],
                'qty_pcs' => $dataOM['qty_pcs'],
                'outermold_sam' => $dataOM['outerMoldSAM'],
                'outermold_barcode' => $dataOM['outermold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function save_mid_mold(){
        if(isset($_POST['dataMidMold'])){
            $dataMM = $_POST['dataMidMold'];

            $data = array(
                'id_input_molding' => $dataMM['id_input_molding'],
                'no_bundle' => $dataMM['no_bundle'],
                'size' => $dataMM['size'],
                'group_size' =>$dataMM['group_size'],
                'qty_pcs' => $dataMM['qty_pcs'],
                'mildmold_sam' => $dataMM['midMoldSAM'],
                'midmold_barcode' => $dataMM['midmold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }
    
    public function save_linning_mold(){
        if(isset($_POST['dataLinningMold'])){
            $dataLM = $_POST['dataLinningMold'];

            $data = array(
                'id_input_molding' => $dataLM['id_input_molding'],
                'no_bundle' => $dataLM['no_bundle'],
                'size' => $dataLM['size'],
                'group_size' =>$dataLM['group_size'],
                'qty_pcs' => $dataLM['qty_pcs'],
                'linningmold_sam' => $dataLM['linningMoldSAM'],
                'liningmold_barcode' => $dataLM['linningmold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }    

    public function get_by_outermold_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }
}
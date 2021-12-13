<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MidMoldInputMoldingModel extends CI_Model{
    var $table="midmold_input_molding";

    public function save(){
        if(isset($_POST['dataMidMold'])){
            $dataMM = $_POST['dataMidMold'];

            $data = array(
                'id_input_molding' => $dataMM['id_input_molding'],
                'no_bundle' => $dataMM['no_bundle'],
                'size' => $dataMM['size'],
                'qty_pcs' => $dataMM['qty_pcs'],
                'kode_barcode' => $dataMM['kode_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function get_by_midmold_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }    
}
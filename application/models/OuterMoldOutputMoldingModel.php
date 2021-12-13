<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OuterMoldOutputMoldingModel extends CI_Model{
    var $table="outermold_output_molding";

    public function save(){
        if(isset($_POST['dataOuterMold'])){
            $dataOM = $_POST['dataOuterMold'];

            $data = array(
                'id_output_molding' => $dataOM['id_output_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'qty_pcs' => $dataOM['qty_pcs'],
                'kode_barcode' => $dataOM['kode_barcode']
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
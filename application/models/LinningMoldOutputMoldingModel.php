<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinningMoldOutputMoldingModel extends CI_Model{
    var $table="linningmold_output_molding";

    public function save(){
        if(isset($_POST['dataMidMold'])){
            $dataLM = $_POST['dataLinningMold'];

            $data = array(
                'id_output_molding' => $dataLM['id_output_molding'],
                'no_bundle' => $dataLM['no_bundle'],
                'size' => $dataLM['size'],
                'qty_pcs' => $dataLM['qty_pcs'],
                'kode_barcode' => $dataLM['kode_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function get_by_linningmold_barcode($barcode){
        $rst = $this->db->get_where($barcode);

        return $rst->num_rows();
    }    
}
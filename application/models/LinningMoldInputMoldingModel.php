<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinningMoldInputMoldingModel extends CI_Model{
    var $table="linningmold_input_molding";

    public function save(){
        if(isset($_POST['dataLinningMold'])){
            $dataLM = $_POST['dataLinningMold'];

            $data = array(
                'id_input_molding' => $dataLM['id_input_molding'],
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
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }    
}
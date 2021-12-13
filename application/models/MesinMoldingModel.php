<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesinMoldingModel extends CI_Model{
    var $table = "master_mesin_molding";

    public function get_all(){
        $rst = $this->db->get($this->table);
        
        return $rst->result();
    }

    public function get_by_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('barcode' => $barcode));

        return $rst->row();
    }
}
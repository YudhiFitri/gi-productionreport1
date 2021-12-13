<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewCuttingModel extends CI_Model{
    var $table="viewcutting";

    public function get_by_barcode($barcode) {
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->row();
    }
    
    public function get_by_barcode_outer_mold($code) {
        $rst = $this->db->get_where($this->table, array('outermold_barcode' => $code));

        return $rst->row();
    }
    
    public function get_by_barcode_mid_mold($code) {
        $rst = $this->db->get_where($this->table, array('midmold_barcode' => $code));

        return $rst->row();
    }    

    public function get_by_barcode_linning_mold($code) {
        $rst = $this->db->get_where($this->table, array('linningmold_barcode' => $code));

        return $rst->row();
    }
    
    public function get_by_barcode_mold($code){
        $prefix = substr($code,0,1);
        $rst = $this->db->get_where($this->table, array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code));
        return $rst->row();
    }
}
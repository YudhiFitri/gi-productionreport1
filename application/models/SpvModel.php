<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SpvModel extends CI_Model{
    public function get_spv_by_barcode($code){
        $result = $this->db->get_where('spv', array('barcode' => $code));

        return $result->row();
    }        
}
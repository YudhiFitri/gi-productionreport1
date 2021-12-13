<?php
defined('BASEPATH') or exit('direct script access not allowed');

class ViewCuttingWithMoldModel extends CI_Model{
    var $view = 'viewcuttingwithmold';

    public function get_by_barcode($id){
        $r = $this->db->get_where($this->view, array('id_cutting' => $id));

        return $r->result();
    }

    public function get_all_orc(){
        $this->db->distinct();                 
        $this->db->select('orc');
        $rst = $this->db->get($this->view);

        return $rst->result();        
    }

    public function get_by_orc($orc){
        $this->db->order_by("no_bundle");
        $r = $this->db->get_where($this->view, array('orc' => $orc));

        return $r->result();
    }

    public function get_by_id($id){
        $rst = $this->db->get_where($this->view, array('id_cutting' => $id));

        return $rst->result();
    }

}
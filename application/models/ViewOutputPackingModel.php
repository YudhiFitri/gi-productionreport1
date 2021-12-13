<?php
defined('BASEPATH') or exit('No direct access file allowed!');

class ViewOutputPackingModel extends CI_Model{
    var $table = 'viewoutputpacking';

    public function get_actual_boxes_qty(){
        if(isset($_POST['dataPacking'])){
            $dataPacking = $_POST['dataPacking'];

            $this->db->select('sum(actual_qty) as sum_actual_qty, sum(actual_boxes) as sum_actual_boxes, orc, size, color, style ');
            $this->db->where('orc', $dataPacking['orc']);
            $this->db->where('size', $dataPacking['size']);
            $this->db->where('color', $dataPacking['color']);
            $this->db->where('style', $dataPacking['style']);
            $r = $this->db->get($this->table);
            // return $this->db->last_query();
            return $r->row();

        }
    }
}
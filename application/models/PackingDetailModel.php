<?php
defined('BASEPATH') or exit('Direct script not allowed!');

class PackingDetailModel extends CI_Model{
    var $table = 'output_packing_detail';

    public function save_detail(){
        if(isset($_POST['dataStrDetail'])){
            $dataStrDetail = $_POST['dataStrDetail'];

            $data = array(
                'id_output_packing' => $dataStrDetail['id_output_packing'],
                'tgl' => date('Y-m-d'),
                'size' => $dataStrDetail['size'],
                'color' => $dataStrDetail['color'],
                'style' => $dataStrDetail['style'],
                'actual_qty' => $dataStrDetail['actual_qty'],
                'box_capacity'=> $dataStrDetail['box_capacity'],
                'actual_boxes'=> $dataStrDetail['actual_boxes'],                
                'packing_sam' => $dataStrDetail['packing_sam'],
                'packing_sam_result' => $dataStrDetail['packing_sam_result']
            );

            $this->db->insert($this->table, $data);
            
            return $this->db->insert_id();
            
        }
    }
}
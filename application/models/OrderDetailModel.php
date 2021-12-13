<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderDetailModel extends CI_Model{
    var $table="order_detail";

    public function save(){
        if(isset($_POST['dataStrOrderDetail'])){
            $dataStrOrderDetail = $_POST['dataStrOrderDetail'];
            $data = array(
                'id_order' => $dataStrOrderDetail['id_order'],
                'size' => $dataStrOrderDetail['size'],
                'qty' => $dataStrOrderDetail['qty'],
            );

            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }    
}
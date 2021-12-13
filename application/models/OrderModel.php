<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model{
    var $table="order";

    public function get_by_orc($orc){
        // $this->db->where("TRIM('orc') = $o", NULL, false);
        // $this->db->like("orc", $orc);
        // $rst = $this->db->get($this->table);
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->row();
        // return $this->db->last_query();
    }

    public function get_all(){
        $this->db->order_by('id_order', 'DESC');
        $rst = $this->db->get($this->table);
        return $rst->result(); 
    }

    public function get_by_no_to_cutting(){
        $rst = $this->db->get_where($this->table, array('to_cutting' => null));
        return $rst->result();
    }

    public function update_by_orc($orc){
        $this->db->set('to_cutting', 1);
        $this->db->set('tgl_to_cutting', date('Y-m-d'));
        $this->db->where('orc', $orc);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function update_by_orc1($orc){
        $this->db->set('to_cutting', null);
        $this->db->set('tgl_to_cutting', null);
        $this->db->where('orc', $orc);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }    

    public function save(){
        if(isset($_POST['dataOrder'])){
            $dataOrder = $_POST['dataOrder'];
            $data = array(
                "tgl" => date("Y-m-d H:i:s"),
                "style" => $dataOrder['style'],
                "style_sam" => $dataOrder['style_sam'],
                "orc" => $dataOrder['orc'],
                "comm" => $dataOrder['comm'],
                "buyer" => $dataOrder['buyer'],
                "so" => $dataOrder['po'],
                "color" => $dataOrder['color'],
                "plan_export" => $dataOrder['shipment_plan'],
                "qty" => $dataOrder['total_qty'],
                "etd" => $dataOrder['etd'],
                "line_allocation1" => $dataOrder['line_allocation1'],
                "line_allocation2" => $dataOrder['line_allocation2'],
                "line_allocation3" => $dataOrder['line_allocation3']
            );

            $this->db->insert($this->table, $data);

            return $this->db->insert_id();
        }
    }

    public function insert_bulk($data){
        $this->db->insert_batch('order',$data);

        return $this->db->affected_rows();
    }

    public function update(){
        if(isset($_POST['dataEditOrder'])){
            $dataEditOrder = $_POST['dataEditOrder'];
            $data = array(
                "style" => $dataEditOrder['style'],
                "style_sam" => $dataEditOrder['style_sam'],
                "orc" => $dataEditOrder['orc'],
                "comm" => $dataEditOrder['comm'],
                "buyer" => $dataEditOrder['buyer'],
                "so" => $dataEditOrder['po'],
                "color" => $dataEditOrder['color'],
                "plan_export" => $dataEditOrder['shipment_plan'],
                "qty" => $dataEditOrder['total_qty'],
                "etd" => $dataEditOrder['etd'],
                "line_allocation1" => $dataEditOrder['line_allocation1'],
                "line_allocation2" => $dataEditOrder['line_allocation2'],
                "line_allocation3" => $dataEditOrder['line_allocation3'],
				"exported_date" => $dataEditOrder['exported_date'],
				"exported_qty" => $dataEditOrder['exported_qty']
            );
            $this->db->where('id_order', $dataEditOrder['id_order']);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
            // return $this->db->last_query();
        }
    }    

    public function delete($id){
        $this->db->delete($this->table, array("id_order" => $id));

        return $this->db->affected_rows();
    }

    public function get_by_id($id){
        $rst = $this->db->get_where($this->table, array('id_order' => $id));

        return $rst->row();
    }

}

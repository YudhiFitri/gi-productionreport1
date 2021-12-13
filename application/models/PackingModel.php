<?php
defined("BASEPATH") or exit("direct script access not allowed");

class PackingModel extends CI_Model{
    var $table="output_packing";

	// var $column_order = array('id_output_packing', 'tgl','orc','boxes', 'total_actual_boxes', 'total_qty', 'total_actual_qty');
	// var $column_order = array('id_output_packing','tgl','orc','boxes', 'total_actual_boxes', 'total_qty', 'total_actual_qty');
	var $column_order = array('id_output_packing','tgl','orc','qty', 'boxes', 'total_actual_boxes');
	// var $column_search = array('id_output_packing', 'tgl','orc','boxes', 'total_actual_boxes', 'total_qty', 'total_actual_qty');
	var $column_search = array('id_output_packing','tgl','orc','qty', 'boxes', 'total_actual_boxes');
    var $order = array('tgl' => 'desc');    

    private function _get_datatables_query(){
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {

                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
        
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }    

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_output_packing',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
			date_default_timezone_set('Asia/Jakarta');
			
            $data = array(
                'tgl' => date('Y-m-d'),
                'orc' => $dataStr['orc'],
                'boxes' => $dataStr['boxes'],
                'total_actual_boxes' => $dataStr['total_actual_boxes'],
                'qty' => $dataStr['qty'],
                'total_actual_qty' => $dataStr['total_actual_qty']
            );            

            $this->db->insert($this->table, $data);
            
            return $this->db->insert_id();
        }
    }

    public function get_by_orc_size(){
        If(isset($_POST['dataSearch'])){
            $dataS = $_POST['dataSearch'];

            $orc = $dataS['orc'];
            $size = $dataS['size'];

            $this->db->where('orc', $orc);
            $this->db->where('size', $size);
            $rst = $this->db->get($this->table);

            return $rst->row();


        }
    }

    public function update(){
        if(isset($_POST['dataUpdatePacking'])){
            $dataUpdate = $_POST['dataUpdatePacking'];

            $id = $dataUpdate['id_output_packing'];
            $totalActualBoxes = $dataUpdate['total_actual_boxes'];
            $totalActualQty = $dataUpdate['total_actual_qty'];
            // $data = array(
            //     'total_actual_boxes' => 'total_actual_boxes + ' . $totalActualBoxes,
            //     'total_actual_qty' => 'total_actual_qty + ' . $totalActualQty
            // );

            // $this->db->set($data);
            // $this->db->where('id_output_packing', $id);
            // $this->db->update($this->table);
            $query = 'UPDATE ' . $this->table . ' SET total_actual_boxes = total_actual_boxes + ' . $totalActualBoxes . ' , total_actual_qty = total_actual_qty + ' . 
                        $totalActualQty . ' WHERE id_output_packing = ' . $id;
            
            $this->db->query($query);

            return $this->db->affected_rows();
            // return $this->db->last_query();
        }
    }
}

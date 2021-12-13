<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewCuttingDoneModel extends CI_Model{
    var $table = "viewcuttingdone";
    var $column_order = array('id_cutting', 'orc', 'style', 'color', 'comm', 'so', 'qty', 'boxes', 'prepare_on');
    var $column_search = array('id_cutting', 'orc', 'style', 'color', 'comm', 'so', 'qty', 'boxes', 'prepare_on');
    var $order = array('id_cutting' => 'asc');

    public function get_all(){
        $rst = $this->db->get($this->table);

        return $rst->result();
    }
    
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

    public function get_by_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->row();

    }

    public function get_by_id($id){
        $rst = $this->db->get_where($this->table, array('id_cutting' => $id));

        return $rst->result();
    }

    public function get_all_orc(){
        $this->db->distinct();
        $this->db->select('orc');
        $rst = $this->db->get($this->table);

        return $rst->result();
    }

    public function get_by_orc($orc){
        $this->db->where('orc', $orc);
        $this->db->order_by('no_bundle', 'asc');
        $rst = $this->db->get($this->table);

        return $rst->result();

    }

    public function get_by_orc_for_packing($orc){
        $this->db->distinct();
        $this->db->select('size,color,style,qty');
        $rst = $this->db->get_where($this->table, array('orc' => $orc));

        return $rst->result();
    }
    
    public function check_by_orc_size(){
        if(isset($_POST['dataString'])){
            $dataString = $_POST['dataString'];

            $this->db->where('orc', $dataString['orc']);
            $this->db->where('size', $dataString['size']);
            $result = $this->db->get($this->table);

            return $result->num_rows();
        }
    }

    public function get_orc_panty(){
        $this->db->distinct();
        $this->db->where('panty_barcode is NOT NULL', NULL, false);
        $r = $this->db->get($this->table);

        return $r->result();
        // return $this->db->last_query();

    }    

    public function get_by_qty_size_boxes(){
        if(isset($_POST['selectedRow'])){
            $selRow = $_POST['selectedRow'];
            $orc = $selRow['orc'];
            $size = $selRow['size'];
            $color = $selRow['color'];
            $style = $selRow['style'];

            $this->db->where('orc', $orc);
            $this->db->where('size', $size);
            $this->db->where('color', $color);
            $this->db->where('style', $style);
            $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            return $rst->row();
        }
    }

    public function ajax_get_max_boxes($orc){
        $this->db->select('max(boxes) as max_boxes');
        $this->db->where('orc', $orc);

        $rst = $this->db->get($this->table);

        return $rst->row();
    }

	public function get_packing_list($orc){
		$this->db->distinct();
		$this->db->select('orc, style, size, color, qty_detail');
		$result = $this->db->get_where($this->table, array('orc' => $orc));

		return $result->result();
	}    

}
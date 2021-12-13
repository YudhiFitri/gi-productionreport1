<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewOutputMoldingModel extends CI_Model{
    var $table = "viewoutputmolding";

    var $column_order = array(
        'id_output_molding',
        'shift' ,
        'no_mesin',
        'tgl', 
        'orc', 
        'style', 
        'color', 
        'no_bundle_outer', 
        'size_outer', 
        'qty_outer', 
        'no_bundle_mid', 
        'size_mid', 
        'qty_mid', 
        'no_bundle_linning', 
        'size_linning', 
        'qty_linning'
    );
    var $column_search = array(
        'id_output_molding',
        'shift' ,
        'no_mesin',
        'tgl', 
        'orc', 
        'style', 
        'color', 
        'no_bundle_outer', 
        'size_outer', 
        'qty_outer', 
        'no_bundle_mid', 
        'size_mid', 
        'qty_mid', 
        'no_bundle_linning', 
        'size_linning', 
        'qty_linning'
    );
    var $order = array('id_output_molding' => 'asc');

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
}
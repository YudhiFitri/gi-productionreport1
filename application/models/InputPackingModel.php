<?php
defined("BASEPATH") or exit("direct script access not allowed");

class InputPackingModel extends CI_Model{
    var $table="input_packing";

    var $column_order = array('id_input_packing','orc','style','color','size','no_bundle', 'qty', 'tgl');
    var $column_search = array('id_input_packing','orc','style','color','size','no_bundle', 'qty', 'tgl');
    var $order = array('id_input_packing' => 'desc');    

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
	
	public function get_sewing_detail($barcode){
		$result = $this->db->get_where('output_sewing_detail', array('kode_barcode' => $barcode));

		return $result->row();
	}

	public function get_cutting_detail($barcode){
		// $result = $this->db->get_where('cutting_detail', array('kode_barcode' => $barcode));
		$result = $this->db->get_where('viewcuttingdone', array('kode_barcode' => $barcode));

		return $result->row();
	}

    public function save(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
			date_default_timezone_set('Asia/Jakarta');            

            $data = array(
				'kode_barcode' => $dataStr['kode_barcode'],
				'orc' => $dataStr['orc'],
				'style' => $dataStr['style'],
				'color' => $dataStr['color'],
                'tgl' => date('Y-m-d H:i:s'),
				'qty' => $dataStr['qty'],
				'actual_qty' => $dataStr['actual_qty'],
				'size' => $dataStr['size'],
				'no_bundle' => $dataStr['no_bundle']
			);

            $this->db->insert($this->table, $data);
            
            return $this->db->insert_id();
        }
	}
	
	public function check_input_packing($barcode){
		$rst = $this->db->get_where('input_packing', array('kode_barcode' => $barcode));

		return $rst->num_rows();
	}

	public function get_input_packing($barcode){
		$rst = $this->db->get_where('input_packing', array('kode_barcode' => $barcode));

		return $rst->result();		
	}

	public function check_input_packing1(){
		if(isset($_POST['dataForInputPacking'])){
			$dataForInputPacking = $_POST['dataForInputPacking'];
			$orc = $dataForInputPacking['orc'];
			$color = $dataForInputPacking['color'];
			$style = $dataForInputPacking['style'];
			$size = $dataForInputPacking['size'];

			$this->db->where('orc', $orc);
			$this->db->where('color', $color);
			$this->db->where('style', $style);
			$this->db->where('size', $size);
			$rst = $this->db->get('input_packing');

			return $rst->num_rows();
		}
    }
    
	public function get_by_orc()
	{
		if (isset($_POST['orc'])) {
			$orc = $_POST['orc'];
			$rst = $this->db->get_where($this->table, ['orc' => $orc]);
			// $rst = $this->db->get($this->table);

			return $rst->result();
		}
    }
    
	public function get_by_orc1($orc)
	{
		$rst = $this->db->get_where($this->table, ['orc' => $orc]);

		return $rst->result();
	}    

	public function get_all_distinct()
	{
		$this->db->distinct();
		$this->db->select('orc,style,color');
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result();
    }
    
	public function get_by_barcode($barcode)
	{
		$rst = $this->db->get_where($this->table, ['kode_barcode' => $barcode])->row();

		return $rst;
	}    
}

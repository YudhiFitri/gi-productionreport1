<?php
defined("BASEPATH") or exit("direct script access not allowed");

class OutputPackingDetailModel extends CI_Model{
	public function get_by_output_packing_id($id){
		$result = $this->db->get_where('output_packing_detail', array('id_output_packing' => $id));

		return $result->result();
	}

	public function check_by_barcode($barcode){
		$rowCount = $this->db->get_where('output_packing_detail', array('barcode'=>$barcode));

		return $rowCount->num_rows();
	}

	public function join_get_by_barcode($barcode)
	{
		$this->db->select('*');
		$this->db->from('output_packing');
		$this->db->join('output_packing_detail', 'output_packing_detail.id_output_packing = output_packing.id_output_packing');
		$this->db->where('output_packing_detail.barcode', $barcode);
		$row = $this->db->get();

		// print_r($row->row());

		return $row->row();
	}

	public function join_get_size_by_orc($orc)
	{
		$this->db->select('DISTINCT(output_packing_detail.size) as size');
		$this->db->from('output_packing_detail');
		$this->db->join('output_packing', 'output_packing_detail.id_output_packing = output_packing.id_output_packing');
		$this->db->where('output_packing.orc', $orc);
		$row = $this->db->get();

		return $row->result();
	}	
}

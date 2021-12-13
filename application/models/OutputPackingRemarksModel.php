<?php
defined("BASEPATH") or exit("direct script access not allowed");

class OutputPackingRemarksModel extends CI_Model{
	public function get_remarks_by_id_packing_detail($id){
		$result = $this->db->get_where('output_packing_detail_remarks', array('id_output_packing_detail' => $id));
		return $result->result();
	}
}

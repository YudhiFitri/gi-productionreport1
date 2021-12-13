<?php
defined('BASEPATH') or exit('direct access script not allowed');

class ViewPackingBarcodeModel extends CI_Model{
	public function get_by_orc($orc){
		// $this->db->order_by('size, no_box', 'asc');
		$result = $this->db->get_where('viewpackingbarcode', array('orc' => $orc));

		return $result->result();
	}

	public function get_by_orc_limit_offset($orc, $offset, $limit){
		$this->db->order_by('size,no_box');
		$result = $this->db->get_where('viewpackingbarcode', array('orc' => $orc),  $limit, $offset);

		return $result->result();		
	}

	public function get_by_orc_limit($orc, $limit){
		$this->db->order_by('size,no_box');
		$result = $this->db->get_where('viewpackingbarcode', array('orc' => $orc), $limit);

		return $result->result();		
	}

	public function get_by_barcode($code){
		$row = $this->db->get_where('viewpackingbarcode', array('barcode' => $code));

		return $row->row();
	}
	
	
}

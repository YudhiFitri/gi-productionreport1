<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeviceIdsModel extends CI_Model{
	var $table = "user_mekanik";

	// public function getAllDeviceIds(){
	// 	$this->db->select('device_id');
	// 	$this->db->from($this->table);
	// 	$rst = $this->db->get();

	// 	return $rst->result_array();
	// }

	public function getAllTokens(){
		$this->db->select('token');
		$this->db->from($this->table);
		$rst = $this->db->get();

		return $rst->result_array();
		// return $rst->result();
	}	

	public function getToken(){
		$this->db->select('token');
		$this->db->from($this->table);
		$rst = $this->db->get();

		return $rst->row();

	}
}

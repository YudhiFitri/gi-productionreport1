<?php
defined("BASEPATH") or exit("direct script access not allowed");

class VFPackingListModel extends CI_Model
{
	var $table = "solid_packing_list_vf";

	public function insert_bulk($data)
	{
		$this->db->db_debug = false;
		$inserted = $this->db->insert_batch($this->table, $data);
		if ($inserted > 0) {
			$rst = TRUE;
		} else {
			$rst = FALSE;
		}

		return $rst;
	}

	public function check_by_barcode($barcode)
	{
		$this->db->where('barcode', $barcode);
		$rst = $this->db->get($this->table);

		return $rst->num_rows();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function list_today_vf()
	{
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');

		$this->db->select('DISTINCT(orc) AS orc, DATE(tgl) AS tgl, po, style, color');
		$this->db->order_by('orc');
		$this->db->where('DATE(tgl)', $today);
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function list_all_vf()
	{
		$this->db->select('DISTINCT(orc) AS orc, DATE(tgl) AS tgl, po, style, color');
		$this->db->order_by('orc');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}	

	public function get_by_barcode($barcode)
	{
		$this->db->where('barcode', $barcode);
		$rst = $this->db->get($this->table);

		return $rst->row();
	}

	public function get_by_orc($orc)
	{
		$this->db->where('orc', $orc);
		$rst = $this->db->get($this->table);

		return $rst->result();
	}	
}

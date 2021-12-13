<?php
defined("BASEPATH") or exit("direct script access not allowed");

class LinePackingModel extends CI_Model
{
	protected $table = 'packing_preparation_line';

	public function get_all()
	{
		$rst = $this->db->get($this->table);

		return $rst->result();
	}
}

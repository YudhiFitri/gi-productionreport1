<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LineModel extends CI_Model
{
	var $table = "line";

	public function get_all()
	{
		$result = $this->db->get($this->table);
		return $result->result();
	}

	public function get_by_name($name)
	{
		$row = $this->db->get_where('name', $name);
		return $row->row();
	}

	public function get_group_line($name)
	{
		$row = $this->db->get_where('line', ['name' => $name])->row();
		return $row->location;
	}
}

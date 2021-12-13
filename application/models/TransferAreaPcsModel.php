<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransferAreaPcsModel extends CI_Model
{
	protected $table = 'transfer_area_pcs';

	public function check_by_barcode($barcode)
	{
		$row = $this->db->get_where($this->table, ['barcode' => $barcode]);

		return $row->num_rows();
	}

	public function save_transfer_area_pcs($data)
	{
		$orc = $data['orc'];
		$row = $this->db->get_where('order', ['orc' => $orc])->row();
		$data['po'] = $row->so;
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}
}

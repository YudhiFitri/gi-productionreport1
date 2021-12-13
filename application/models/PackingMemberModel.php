<?php
defined("BASEPATH") or exit("direct script access not allowed");

class PackingMemberModel extends CI_Model
{
	// var $column_order = array('id_packing_member', 'nik', 'nama', 'jnskelamin', 'no_ktp', 'alamat', 'email', 'tgl_lahir', 'zona_kerja', 'barcode');
	// var $column_search = array('id_packing_member', 'nik', 'nama', 'jnskelamin', 'no_ktp', 'alamat', 'email', 'tgl_lahir', 'zona_kerja', 'barcode');
	// var $order = array('id_packing_member' => 'desc');

	// private function _get_datatables_query()
	// {
	// 	$this->db->from('packing_member');

	// 	$i = 0;

	// 	foreach ($this->column_search as $item) {
	// 		if ($_POST['search']['value']) {

	// 			if ($i === 0) // first loop
	// 			{
	// 				$this->db->group_start();
	// 				$this->db->like($item, $_POST['search']['value']);
	// 			} else {
	// 				$this->db->or_like($item, $_POST['search']['value']);
	// 			}

	// 			if (count($this->column_search) - 1 == $i) //last loop
	// 				$this->db->group_end(); //close bracket
	// 		}
	// 		$i++;
	// 	}

	// 	if (isset($_POST['order'])) {
	// 		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	// 	} else if (isset($this->order)) {
	// 		$order = $this->order;
	// 		$this->db->order_by(key($order), $order[key($order)]);
	// 	}
	// }

	// function get_datatables()
	// {
	// 	$this->_get_datatables_query();
	// 	if ($_POST['length'] != -1)
	// 		$this->db->limit($_POST['length'], $_POST['start']);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function count_filtered()
	// {
	// 	$this->_get_datatables_query();
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }

	// public function count_all()
	// {
	// 	$this->db->from('packing_member');
	// 	return $this->db->count_all_results();
	// }

	var $table = 'packing_member_new';

	public function check_by_barcode($barcode)
	{
		$result = $this->db->get_where($this->table, array('barcode' => $barcode));

		return $result->num_rows();
	}

	public function save()
	{
		if (isset($_POST['nik'])) {
			$nik = $_POST['nik'];
			$barcode = $nik;
		}

		if (isset($_POST['nama_lengkap'])) {
			$namaLengkap = $_POST['nama_lengkap'];
		}

		if (isset($_POST['no_hp'])) {
			$noHP = $_POST['no_hp'];
		}

		if (isset($_POST['shift'])) {
			$shift = $_POST['shift'];
		}
		// if (isset($_POST['jnskelamin'])) {
		// 	$jnskelamin = $_POST['jnskelamin'];
		// }

		// if (isset($_POST['no_ktp'])) {
		// 	$no_ktp = $_POST['no_ktp'];
		// }

		// if (isset($_POST['alamat'])) {
		// 	$alamat = $_POST['alamat'];
		// }

		// if (isset($_POST['email'])) {
		// 	$email = $_POST['email'];
		// }

		// if (isset($_POST['tgl_lahir'])) {
		// 	$tgl_lahir = $_POST['tgl_lahir'];
		// }

		// if (isset($_POST['zona_kerja'])) {
		// 	$zona_kerja = $_POST['zona_kerja'];
		// }

		$dataInsert = array(
			'nik' => $nik,
			'nama_lengkap' => $namaLengkap,
			'no_hp' => $noHP,
			'shift' => $shift,
			'barcode' => $barcode,
		);

		$this->db->insert($this->table, $dataInsert);

		return $this->db->insert_id();
	}

	public function update()
	{
		if (isset($_POST['id_packing_member'])) {
			$idPackingMember = $_POST['id_packing_member'];
		}

		if (isset($_POST['nik'])) {
			$nik = $_POST['nik'];
			$barcode = $nik;
		}

		if (isset($_POST['nama_lengkap'])) {
			$namaLengkap = $_POST['nama_lengkap'];
		}

		if (isset($_POST['no_hp'])) {
			$noHP = $_POST['no_hp'];
		}

		if (isset($_POST['shift'])) {
			$shift = $_POST['shift'];
		}

		$dataUpdate = array(
			'nik' => $nik,
			'nama_lengkap' => $namaLengkap,
			'no_hp' => $noHP,
			'shift' => $shift,
			'barcode' => $barcode
		);

		$this->db->update($this->table, $dataUpdate, array('id_packing_member' => $idPackingMember));

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->delete($this->table, array('id_packing_member' => $id));

		return $this->db->affected_rows();
	}

	public function get_all()
	{
		$result = $this->db->get('packing_member_new');

		return $result->result_array();
		// return $result->result();
	}

	public function get_by_range_id($minId, $maxId)
	{
		$this->db->where("id_packing_member >=", $minId);
		$this->db->where("id_packing_member <=", $maxId);

		$result = $this->db->get($this->table);

		return $result->result_array();
	}

	public function get_by_id($id)
	{
		$result = $this->db->get_where($this->table, array('id_packing_member' => $id));

		return $result->row_array();
	}

	public function get_by_barcode($barcode)
	{
		$result = $this->db->get_where($this->table, array('barcode' => $barcode));

		return $result->row();
	}
}

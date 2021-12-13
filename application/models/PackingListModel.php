<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class PackingListModel extends CI_Model
{
	public function save_packing_list()
	{
		if (isset($_POST['dataPackingList'])) {
			$dataPackingList = $_POST['dataPackingList'];

			$countDataPackingList = count($dataPackingList);

			$this->db->insert_batch('packing_list', $dataPackingList);

			$first_id = $this->db->insert_id();

			$last_id = $first_id + ($countDataPackingList - 1);

			$this->db->where('id_packing_list >=', $first_id);
			$this->db->where('id_packing_list <=', $last_id);
			$result = $this->db->get('packing_barcode');

			return $result->result();

			// return $this->db->affected_rows();
		}
	}

	public function save_packing()
	{
		if (isset($_POST['dataPacking'])) {
			$dataPacking = $_POST['dataPacking'];
			$data = array(
				'orc' => $dataPacking['orc'],
				'color' => $dataPacking['color'],
				'style' => $dataPacking['style'],
				'size' => $dataPacking['size'],
				'qty' => $dataPacking['qty'],
				'box_capacity' => $dataPacking['box_capacity'],
				'total_box' => $dataPacking['total_box']
			);

			$this->db->insert('packing_list', $data);

			return $this->db->insert_id();
		}
	}

	public function insert_solid_packing_list_batch()
	{
		if (isset($_POST['arrPackingList'])) {
			$arrPackingList = $_POST['arrPackingList'];

			$this->db->insert_batch('solid_packing_list', $arrPackingList);

			return $this->db->affected_rows();
		}
	}

	public function get_solid_packing()
	{
		$this->db->distinct();
		$this->db->select('orc, color, style');
		$this->db->from('solid_packing_list');
		$rst = $this->db->get();

		$data = array(
			'data' => $rst->result()
		);
		// return $result->result();
		return $data;
		// return $this->db->last_query();
	}

	public function get_solid_packing_detail()
	{
		if (isset($_POST['dataPacking'])) {
			$dataPacking = $_POST['dataPacking'];
			$orc = $dataPacking['orc'];
			$style = $dataPacking['style'];

			$this->db->where('orc', $orc);
			$this->db->where('style', $style);
			$rst = $this->db->get('solid_packing_list');

			return $rst->result();
		}
	}

	public function get_by_orc($orc)
	{
		$result = $this->db->get_where('solid_packing_list', array('orc' => $orc));

		return $result->result_array();
	}

	public function save_solid_packing_list()
	{
		if (isset($_POST['dataSolidPackingList'])) {
			$dataPacking = $_POST['dataSolidPackingList'];
			$data = array(
				'orc' => $dataPacking['orc'],
				'color' => $dataPacking['color'],
				'style' => $dataPacking['style'],
				'size' => $dataPacking['size'],
				'qty' => $dataPacking['qty'],
				'box_capacity' => $dataPacking['box_capacity'],
				'total_box' => $dataPacking['total_box']
			);

			$this->db->insert('solid_packing_list', $data);

			return $this->db->insert_id();
		}
	}

	public function update_batch_solid_packing_list()
	{
		if (isset($_POST['arrPackingList'])) {
			$arrPackingList = $_POST['arrPackingList'];
			$dataPackingList = [];

			//delete solid_packing_barcodes dan solid_packing_list
			// foreach ($arrPackingList as $pl) {
			// 	$this->_delete_solid_packing_barcode($pl['id_packing_list']);
			// 	$this->_delete_solid_packing_list($pl['id_packing_list']);
			// 	$rKapasitasKarton = $this->_searchKapasitasKarton($pl['style'], $pl['size']);
			// 	if ($rKapasitasKarton == null){
			// 		$this->_addNewKapasitasKarton($pl['style'], $pl['size'], $pl['box_capacity']);
			// 	}else{
			// 		$this->_updateKapasitasKarton($rKapasitasKarton->id_packing_karton, $pl['style'], $pl['size'], $pl['box_capacity'] );
			// 	}
			// }

			//insert solid_packing_list
			foreach ($arrPackingList as $p) {
				$data = [
					'orc' => $p['orc'],
					'color' => $p['color'],
					'style' => $p['style'],
					'size' => $p['size'],
					'qty' => $p['qty'],
					'box_capacity' => $p['box_capacity'],
					'total_box' => $p['total_box']
				];
				array_push($dataPackingList, $data);
			}
			$this->db->insert_batch('solid_packing_list', $dataPackingList);

			return $this->db->affected_rows();
		}
	}

	function _addNewKapasitasKarton($style, $size, $kapasitas){
		$data = [
			'style' => $style,
			'size' => $size,
			'kapasitas_karton' => $kapasitas
		];

		$this->db->insert('kapasitas_karton', $data);
		$affRows = $this->db->affected_rows();
		if ($affRows > 0){
			return true;
		}
	}

	function _updateKapasitasKarton($id, $style, $size, $kapasitas){
		$data = [
			'style' => $style,
			'size' => $size,
			'kapasitas_karton' => $kapasitas
		];
		$this->db->update('kapasitas_karton', $data, ['id_packing_karton' => $id]);
		$affRows = $this->db->affected_rows();
		if ($affRows > 0){
			return true;
		}		
	}

	function _searchKapasitasKarton($style, $size){
		$this->db->where('style', $style);
		$this->db->where('size', $size);
		$rst = $this->db->get('kapasitas_karton');

		return $rst->row();
	}

	function _delete_solid_packing_barcode($id)
	{
		$this->db->where_in('id_packing_list', $id);
		$this->db->delete('solid_packing_barcode');
	}

	function _delete_solid_packing_list($id)
	{
		$this->db->delete('solid_packing_list', ['id_packing_list' => $id]);
	}
	
	public function check_solid_packing_list_by_orc($orc)
	{
		$rst = $this->db->get_where('solid_packing_list', ['orc' => $orc]);

		return $rst->num_rows();
	}
	
	public function delete_by_orc($orc)
	{
		$this->db->where('orc', $orc);
		$delete = $this->db->delete('solid_packing_list');

		return $delete ? true : false;
	}
	
	public function join_get_by_barcode($barcode)
	{
		$this->db->select('*');
		$this->db->from('solid_packing_list');
		$this->db->join('solid_packing_barcode', 'solid_packing_barcode.id_packing_list = solid_packing_list.id_packing_list');
		$this->db->where('solid_packing_barcode.barcode', $barcode);
		$row = $this->db->get();

		return $row->row();
	}	
	
}

<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class SolidPackingBarcodeModel extends CI_Model
{
	public function insert_solid_packing_barcode_batch()
	{
		if (isset($_POST['arrSolidPackingBarcode'])) {
			$arrSolidPackingBarcode = $_POST['arrSolidPackingBarcode'];
			$this->db->insert_batch('solid_packing_barcode', $arrSolidPackingBarcode);

			return $this->db->affected_rows();
		}
	}
	
	public function check_solid_packing_barcode($barcode)
	{
		$rst = $this->db->get_where('solid_packing_barcode', ['barcode' => $barcode]);
		return $rst->num_rows();
	}

	public function update_qty($id, $qty)
	{
		$this->db->set('qty', (int)$qty);
		$this->db->where('id_packing_list_barcode', (int)$id);

		$this->db->update('solid_packing_barcode');

		return $this->db->affected_rows();
		// return $this->db->last_query();
	}
	
	public function delete($ids)
	{
		if (is_array($ids)) {
			$this->db->where_in('id_packing_list', $ids);
		} else {
			$this->db->where('id_packing_list', $ids);
		}
		$delete = $this->db->delete('solid_packing_barcode');

		return $delete ? true : false;
	}	
}

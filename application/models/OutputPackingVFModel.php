<?php
defined("BASEPATH") or exit("direct script access not allowed");

class OutputPackingVFModel extends CI_Model
{
	var $table = 'output_packing_detail_vf';

	public function list_today_vf()
	{
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');

		// print_r($today);
		$this->db->where('DATE(tgl)', $today);
		$rst = $this->db->get('output_packing_detail_vf');

		return $rst->result();
		// return $this->db->last_query();
	}

	public function check_by_barcode($barcode)
	{
		$this->db->where('barcode', $barcode);
		$rst = $this->db->get($this->table);

		return $rst->num_rows();
	}

	public function save()
	{

		if (isset($_POST['dataOutputPacking'])) {
			$dataOutputPacking = $_POST['dataOutputPacking'];

			$rowSAM = $this->_get_sam(
				$dataOutputPacking['size'],
				$dataOutputPacking['color'],
				$dataOutputPacking['style'],
				$dataOutputPacking['qty']
			);

			$data = [
				'po' => $dataOutputPacking['po'], 
				'line' => $dataOutputPacking['line'],
				'orc' => $dataOutputPacking['orc'],
				'style' => $dataOutputPacking['style'],
				'color' => $dataOutputPacking['color'],
				'size' => $dataOutputPacking['size'],
				'no_box' => $dataOutputPacking['no_box'],
				'qty' => $dataOutputPacking['qty'],
				'barcode' => $dataOutputPacking['barcode'],
				'packing_sam' => $rowSAM['packingSAM'],
				'packing_sam_result' => $rowSAM['packingSAMResult'],
				'barcode_operator' => $dataOutputPacking['barcode_operator']
			];

			$this->load->model('OutputPackingVFModel');

			$this->db->insert($this->table, $data);

			return $this->db->insert_id();
		}
	}

	private function _get_sam($si, $co, $st, $aq)
	{
		$querySize = $this->db->get_where('master_size', array('size' => $si));
		$rowSize = $querySize->row();

		$group_size = $rowSize->group;

		$blackPattern = '/black/i';
		$whitePattern = '/white/i';
		if (preg_match($blackPattern, $co) == 1) {
			$colorGroup = 'Black';
		} else if (preg_match($whitePattern, $co) == 1) {
			$colorGroup = 'White';
		} else {
			$colorGroup = 'color';
		}

		$querySAM = "SELECT * FROM master_sam WHERE '$st' LIKE CONCAT('%', style, '%') AND color='$colorGroup' AND grup_size='$group_size'";

		// $result = $this->db->get($this->table);
		$rQuerySAM = $this->db->query($querySAM);

		// $rQuerySAM->row();					
		$packingSAM = $rQuerySAM->row()->packing_sam;

		$packing_sam_result = $packingSAM * $aq;

		return array(
			'packingSAM' => $packingSAM,
			'packingSAMResult' => $packing_sam_result
		);
	}
}

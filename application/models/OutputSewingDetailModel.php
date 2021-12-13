<?php
defined('BASEPATH') or exit('direct script not allowed access');
date_default_timezone_set("Asia/Jakarta");

class OutputSewingDetailModel extends CI_Model
{
	var $table = "output_sewing_detail";


	// public function save($idOutputSewing)
	public function save($data)	
	{

		$this->db->trans_start();

		$kode_barcode = $data['kode_barcode'];
		$tgl_ass = date('Y-m-d');
		$where = compact('kode_barcode', 'tgl_ass');

		$rowOutputSewingDetail = $this->db->limit(1)->get_where($this->table, $where)->row();
		if ($rowOutputSewingDetail === null) {
			$dataForOutputSewingDetail = [
				'id_output_sewing' => $data['id_output_sewing'],
				'orc' => $data['orc'],
				'no_bundle' => $data['no_bundle'],
				'assembly' => date('H:i:s'),
				'size' => $data['size'],
				'tgl_ass' => date('Y-m-d'),
				'qty' => $data['qtyPcsActual'],
				'assembly_sam_result' => $data['assembly_sam_result'],
				'kode_barcode' => $data['kode_barcode']
			];
			$this->db->insert($this->table, $dataForOutputSewingDetail);

			$idOutputSewingDetail = $this->db->insert_id();
			$dataForOutputSewingDetailLog = [
				'id_output_sewing_detail' => $idOutputSewingDetail,
				'tgl' => date('Y-m-d H:i:s'),
				'qty' => $data['qtyPcsActual'],
				'assembly_sam_result' => $data['assembly_sam_result']
			];
			$this->db->insert('output_sewing_detail_log', $dataForOutputSewingDetailLog);
		} else {
			// $dataForOutputSewingDetail = [
			// 	'id_output_sewing_detail' => $rowOutputSewingDetail->id_output_sewing_detail,
			// 	'id_output_sewing' => $data['id_output_sewing'],
			// 	'orc' => $data['orc'],
			// 	'no_bundle' => $data['no_bundle'],
			// 	'assembly' => date('H:i:s'),
			// 	'size' => $data['size'],
			// 	'tgl_ass' => date('Y-m-d'),
			// 	'qty' => (int)$data['qtyPcsActual'] + $rowOutputSewingDetail->qty,
			// 	'assembly_sam_result' => (float)$data['assembly_sam_result'] + $rowOutputSewingDetail->assembly_sam_result,
			// 	'kode_barcode' => $data['kode_barcode']
			// ];

			$this->db->set('qty', 'qty + ' . $data['qtyPcsActual'], false);
			$this->db->set('tgl_ass', date('Y-m-d'));
			// $this->db->set('assembly_sam_result', 'assembly_sam_result + ' . );
			$this->db->where('id_output_sewing_detail', $rowOutputSewingDetail->id_output_sewing_detail);
			$this->db->update('output_sewing_detail');			
			// if ($this->db->replace($this->table, $dataForOutputSewingDetail)) {
			if($this->db->affected_rows() > 0){
				$dataOutputSewingDetailLog = [
					'id_output_sewing_detail' => $rowOutputSewingDetail->id_output_sewing_detail,
					'tgl' => date('Y-m-d H:i:s'),
					'qty' => $data['qtyPcsActual'],
					'assembly_sam_result' => $data['assembly_sam_result']
				];
				$this->db->insert('output_sewing_detail_log', $dataOutputSewingDetailLog);
				$idLog = $this->db->insert_id();
			}
		}

		$this->db->select('qty, kode_barcode');
		$qtyOutputSewingDetail = $this->db->get_where($this->table, ['kode_barcode' => $kode_barcode])->row()->qty;

		$this->db->select('qty_pcs, kode_barcode');
		$qtyCuttingDetail = $this->db->get_where('cutting_detail', ['kode_barcode' => $kode_barcode])->row()->qty_pcs;
		if ($qtyOutputSewingDetail > $qtyCuttingDetail) {
			$this->db->set('qty', $qtyCuttingDetail);
			$this->db->where('kode_barcode', $kode_barcode);
			$this->db->update($this->table);
		}		
		$this->db->trans_complete();

		return $this->db->trans_status();		

		// if (isset($_POST['dataStr'])) {

		// 	$dataStr = $_POST['dataStr'];
		// 	//search qty in cutting based on orc
		// 	$rstCutting = $this->db->get_where('cutting', ['orc' => $dataStr['orc']])->row();
		// 	$qtyFromCutting = $rstCutting->qty;

		// 	//update output_sewing	
		// 	// $qtyPcsActual = strVal($dataStr["qtyPcsActual"]);

		// 	$this->db->set('orc', $dataStr['orc']);
		// 	$this->db->set('qty', $qtyFromCutting);
		// 	$this->db->set('actual_qty', 'actual_qty + ' . $dataStr['qtyPcsActual'], false);
		// 	$this->db->set('style', $rstCutting->style);
		// 	$this->db->where('id_output_sewing', $dataStr['id_output_sewing']);
		// 	$this->db->update('output_sewing');

		// 	$rowAffOutputSewing = $this->db->affected_rows();
		// 	if ($rowAffOutputSewing > 0) {
		// 		$this->db->where('kode_barcode', $dataStr['kode_barcode']);
		// 		$this->db->where('tgl_ass', date('Y-m-d'));
		// 		$rstOutputSewingDetail = $this->db->get($this->table)->row();

		// 		if ($rstOutputSewingDetail == NULL) {
		// 			$data = array(
		// 				'id_output_sewing' => $dataStr['id_output_sewing'],
		// 				'orc' => $dataStr['orc'],
		// 				'no_bundle' => $dataStr['no_bundle'],
		// 				'assembly' => date('H:i:s'),
		// 				'size' => $dataStr['size'],
		// 				'tgl_ass' => date('Y-m-d'),
		// 				'qty' => $dataStr['qtyPcsActual'],
		// 				'assembly_sam_result' => $dataStr['assembly_sam_result'],
		// 				'kode_barcode' => $dataStr['kode_barcode']
		// 			);
		// 			$this->db->insert($this->table, $data);

		// 			$idOutputSewingDetail = $this->db->insert_id();
		// 			$dataOutputSewingDetailLog = [
		// 				'id_output_sewing_detail' => $idOutputSewingDetail,
		// 				'tgl' => date('Y-m-d H:i:s'),
		// 				'qty' => $dataStr['qtyPcsActual'],
		// 				'assembly_sam_result' => $dataStr['assembly_sam_result']
		// 			];
		// 			$this->db->insert('output_sewing_detail_log', $dataOutputSewingDetailLog);
		// 			$idLog = $this->db->insert_id();
		// 			return $idLog;
		// 		} else {
		// 			$data = [
		// 				'id_output_sewing_detail' => $rstOutputSewingDetail->id_output_sewing_detail,
		// 				'id_output_sewing' => $dataStr['id_output_sewing'],
		// 				'orc' => $dataStr['orc'],
		// 				'no_bundle' => $dataStr['no_bundle'],
		// 				'assembly' => date('H:i:s'),
		// 				'size' => $dataStr['size'],
		// 				'tgl_ass' => date('Y-m-d'),
		// 				'qty' => (int)$dataStr['qtyPcsActual'] + $rstOutputSewingDetail->qty,
		// 				'assembly_sam_result' => (float)$dataStr['assembly_sam_result'] + $rstOutputSewingDetail->assembly_sam_result,
		// 				'kode_barcode' => $dataStr['kode_barcode']
		// 			];
		// 			if ($this->db->replace($this->table, $data)) {
		// 				$dataOutputSewingDetailLog = [
		// 					'id_output_sewing_detail' => $rstOutputSewingDetail->id_output_sewing_detail,
		// 					'tgl' => date('Y-m-d H:i:s'),
		// 					'qty' => $dataStr['qtyPcsActual'],
		// 					'assembly_sam_result' => $dataStr['assembly_sam_result']
		// 				];
		// 				$this->db->insert('output_sewing_detail_log', $dataOutputSewingDetailLog);
		// 				$idLog = $this->db->insert_id();
		// 				return $idLog;
		// 			}
		// 		}
		// 	}
		// }		
	}

	public function update()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'center_panel' => ($dataStr['center_panel'] != "00:00:00" ? date('H:i:s') : "00:00:00"),
				'back_wings' => ($dataStr['back_wings'] != "00:00:00" ? date('H:i:s') : "00:00:00"),
				'cups' => ($dataStr['cups'] != "00:00:00" ? date('H:i:s') : "00:00:00"),
				'assembly' => ($dataStr['assembly'] != "00:00:00" ? date('H:i:s') : "00:00:00"),
			);

			$code = $dataStr['kode_barcode'];

			$this->db->where('kode_barcode', $code);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
		}
	}

	public function update_cp()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'center_panel' => date('H:i:s'),
				'tgl_cp' => date('Y-m-d'),
				'center_panel_sam_result' => $dataStr['center_panel_sam_result']
			);

			$code = $dataStr['kode_barcode'];

			$this->db->where('kode_barcode', $code);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
		}
	}

	public function update_bw()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'back_wings' => date('H:i:s'),
				'tgl_bw' => date('Y-m-d'),
				'back_wings_sam_result' => $dataStr['back_wings_sam_result']
			);

			$code = $dataStr['kode_barcode'];

			$this->db->where('kode_barcode', $code);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
			// return $this->db->insert_id();
		}
	}

	public function update_cu()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'cups' => date('H:i:s'),
				'tgl_cu' => date('Y-m-d'),
				'cups_sam_result' => $dataStr['cups_sam_result']
			);

			$code = $dataStr['kode_barcode'];

			$this->db->where('kode_barcode', $code);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
		}
	}

	public function update_as()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'assembly' => date('H:i:s'),
				'tgl_ass' => date('Y-m-d'),
				'assembly_sam_result' => $dataStr['assembly_sam_result']
			);

			$code = $dataStr['kode_barcode'];

			$this->db->where('kode_barcode', $code);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
		}
	}

	public function get_by_barcode($code)
	{
		$rst = $this->db->get_where($this->table, array('kode_barcode' => $code));

		// return $rst->row();
		return $rst->result();
	}

	public function update_qty()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$dataUpdate = array(
				'qty' => $dataStr['qty']
			);

			$idOutputSewingDetail = $dataStr['idOutputSewingDetail'];

			$this->db->where('id_output_sewing_detail', $idOutputSewingDetail);
			$this->db->update($this->table, $dataUpdate);

			return $this->db->affected_rows();
		}
	}

	public function get_orc()
	{
		$this->db->distinct();
		$this->db->select('orc');
		$this->db->where('assembly !=', '00:00:00');
		$this->db->where('first_packing_inputed', null);

		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function delete_bundle($id)
	{

		$rowOutputSewingDetail = $this->db->get_where('output_sewing_detail', ['id_output_sewing_detail' => $id])->row();
		if ($rowOutputSewingDetail != null) {
			$idOutputSewing = $rowOutputSewingDetail->id_output_sewing;
			$qty = $rowOutputSewingDetail->qty;

			$this->db->where('id_output_sewing_detail', $id);
			$this->db->delete('output_sewing_detail_log');
			$rowsLogAffected = $this->db->affected_rows();
			if ($rowsLogAffected > 0) {
				$this->db->where('id_output_sewing_detail', $id);
				$this->db->delete('output_sewing_detail');
				$rowsAffectedDetail = $this->db->affected_rows();
				if ($rowsAffectedDetail > 0) {
					$this->db->set('actual_qty', 'actual_qty-' . $qty, false);
					$this->db->where('id_output_sewing', $idOutputSewing);
					$this->db->update('Output_Sewing');
					$rowsAffectedOutputSewing = $this->db->affected_rows();

					return $rowsAffectedOutputSewing;
				}
			}
		}		
	}

	// private function _insertOutputSewingDetail($dt)
	// {
	// 	$this->db->insert($this->table, $dt);

	// 	return $this->db->insert_id();
	// }

	// private function _updateOutputSewingDetail($ass, $aQty, $id)
	// {
	// 	$this->db->set('assembly', date('H:i:s'));
	// 	$this->db->set('qty', 'qty+' . $aQty, false);
	// 	$this->db->set('assembly_sam_result', 'assembly_sam_result+' . $ass, false);
	// 	$this->db->where('id_output_sewing_detail', $id);
	// 	$this->db->update($this->table);
	// 	return $this->db->affected_rows();
	// }	
}

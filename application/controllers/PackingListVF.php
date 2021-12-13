<?php
defined('BASEPATH') or exit('direct access script not allowed');

class PackingListVF extends CI_Controller
{
	public function index()
	{
		$this->load->view('packing/solid_packing_vf_view');
	}

	public function importVFPackingList()
	{
		$this->load->library('excel');
		if (isset($_FILES['file']['name'])) {
			$this->load->model('VFPackingListModel');
			$path = $_FILES['file']['tmp_name'];
			$obj = PHPExcel_IOFactory::load($path);

			// foreach ($obj->getWorksheetIterator() as $worksheet) {
			// 	$highestRow = $worksheet->getHighestRow();
			// 	$highestColumn = $worksheet->getHighestColumn();
			// 	for ($row = 2; $row <= $highestRow; $row++) {
			// 		$thisRow = $worksheet->getRowIterator($row)->current();
			// 		if ($this->isRowEmpty($thisRow) == false) {
			// 			$po = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			// 			$style = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			// 			$color = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			// 			$orc = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			// 			$size = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			// 			$carton_no = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
			// 			$qty_box = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
			// 			$barcode = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

			// 			$data[] = array(
			// 				'po' => $po,
			// 				'style' => $style,
			// 				'color' => $color,
			// 				'orc' => $orc,
			// 				'size' => $size,
			// 				'carton_no' => $carton_no,
			// 				'qty_box' => $qty_box,
			// 				'barcode' => $barcode,
			// 			);

			// 			$konfirmasi = $this->VFPackingListModel->insert_bulk($data);
			// 		}
			// 	}
			// }

			$sheet = $obj->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++) {
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
				$data = [
					'po' => $rowData[0][0],
					'style' => $rowData[0][1],
					'color' => $rowData[0][2],
					'orc' => $rowData[0][3],
					'size' => $rowData[0][4],
					'carton_no' => $rowData[0][5],
					'qty_box' => $rowData[0][6],
					'barcode' => $rowData[0][7]
				];
				$this->VFPackingListModel->save($data);
			}
			$konfirmasi = [
				'sukses' => TRUE
			];
			echo json_encode($konfirmasi);
		}

		// $fileName = $this->input->post('file', TRUE);
	}

	function isRowEmpty($r)
	{
		foreach ($r->getCellIterator() as $cell) {
			if ($cell->getValue()) {
				return false;
			}
		}

		return true;
	}

	public function get_all_lines()
	{
		$this->load->model('LineModel');

		$rst = $this->LineModel->get_all();

		echo json_encode($rst);
	}

	public function ajax_list_all_vf()
	{
		$this->load->model('VFPackingListModel');

		$rst['data'] = $this->VFPackingListModel->list_all_vf();

		echo json_encode($rst);
	}	


	public function ajax_list_today_vf()
	{
		$this->load->model('VFPackingListModel');

		$rst['data'] = $this->VFPackingListModel->list_today_vf();

		echo json_encode($rst);
	}

	public function ajax_get_barcode_packing_vf($barcode)
	{
		$this->load->model('VFPackingListModel');
		$rst = $this->VFPackingListModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_get_by_orc($orc)
	{
		$this->load->model('VFPackingListModel');
		$rst['data'] = $this->VFPackingListModel->get_by_orc($orc);

		$this->load->view('Packing/packing_list_detail_vf_view', $rst);

		// echo json_encode($rst);
	}	
}

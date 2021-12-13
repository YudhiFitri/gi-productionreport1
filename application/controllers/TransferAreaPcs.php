<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransferAreaPcs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransferAreaPcsModel');
	}

	public function ajax_check_by_barcode($barcode)
	{
		$numRows = $this->TransferAreaPcsModel->check_by_barcode($barcode);

		echo json_encode($numRows);
	}

	public function ajax_save_transfer_area_pcs()
	{
		if (isset($_POST['dataForTransferAreaPcs'])) {
			$dataForTransferAreaPcs = $_POST['dataForTransferAreaPcs'];
			$id = $this->TransferAreaPcsModel->save_transfer_area_pcs($dataForTransferAreaPcs);

			echo json_encode($id);
		}
	}
}

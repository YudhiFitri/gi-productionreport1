<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputSewing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('user');
			// } elseif ($this->session->userdata('username') != 'Admin Cutting') {
			// 	redirect('user/not_allowed');
		} else {
			// $this->load->library('excel');

			$this->load->model('LineModel');

			$this->load->model('InputSewingModel');
			$this->load->model('SizeModel');
			$this->load->model('SamModel');
			$this->load->model('InputCuttingModel');
			$this->load->model('OutputCuttingModel');
			$this->load->model('LineModel');
			$this->load->model('ViewCuttingDoneModel');
		}
	}

	public function index()
	{
		$this->load->view('sewing/input_sewing_view');
	}

	public function getInputSewingByLine()
	{
		$line = $this->session->userdata('username');
		$result['data'] = $this->InputSewingModel->get_by_line($line);

		echo json_encode($result);
	}

	public function checkInputCutting($barcode)
	{
		$rst = $this->InputCuttingModel->check_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_get_by_size()
	{
		$data = $this->SizeModel->get_by_size();

		echo json_encode($data);
	}

	public function ajax_get_sewing_sam()
	{
		$rst = $this->SamModel->get_sewing_sam();

		echo json_encode($rst);
	}

	public function ajax_save()
	{
		$rst = $this->InputSewingModel->save();

		echo json_encode($rst);
	}

	public function ajax_get_by_barcode()
	{
		// $rst = $this->ViewCuttingModel->get_by_barcode($barcode);
		// echo json_encode($rst);
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$line = $dataStr['line'];
			$barcode = $dataStr['barcode'];

			$rst = $this->InputSewingModel->get_by_line_barcode($line, $barcode);

			echo json_encode($rst);
		};
	}

	public function change_line()
	{
		$this->load->view('sewing/change_line_view');
	}

	public function ajax_get_by_orc1($orc)
	{
		$result = $this->InputSewingModel->get_by_orc1($orc);

		echo json_encode($result);
	}

	public function ajax_get_all_line()
	{
		$rst = $this->LineModel->get_all();

		echo json_encode($rst);
	}

	public function ajax_update()
	{
		$rst = $this->InputSewingModel->update_line();

		echo json_encode($rst);
	}

	public function ajax_check_midmold_barcode($barcode)
	{
		$rst = $this->InputSewingModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_check_barcode($barcode)
	{
		$rst = $this->InputSewingModel->get_by_barcode($barcode);

		// print_r($rst);

		echo json_encode($rst);
	}

	public function checkOutputCutting($barcode)
	{
		// $rst = $this->OutputCuttingModel->get_by_barcode($barcode);
		$rst = $this->InputSewingModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_update_change_line()
	{
		if (isset($_POST['dataUpdate'])) {
			$dataUpdate = $_POST['dataUpdate'];
			$id = $dataUpdate['id_input_sewing'];
			$line = $dataUpdate['line'];

			$rst = $this->InputSewingModel->update_change_line($id, $line);

			echo json_encode($rst);
		}
	}

	public function checkCuttingDetail($barcode)
	{
		$rst = $this->ViewCuttingDoneModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}
}

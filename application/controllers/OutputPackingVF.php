<?php
defined('BASEPATH') or exit('direct access script not allowed');

class OutputPackingVF extends CI_Controller
{
	public function index()
	{
		$this->load->view('packing/output_packing_vf_view');
	}

	public function ajax_get_all_lines()
	{
		$this->load->model('LineModel');
		$rst = $this->LineModel->get_all();

		echo json_encode($rst);
	}

	public function ajax_list_today_vf()
	{
		$this->load->model('OutputPackingVFModel');
		$rst['data'] = $this->OutputPackingVFModel->list_today_vf();

		echo json_encode($rst);
	}

	public function ajax_check_by_barcode($barcode)
	{
		$this->load->model('OutputPackingVFModel');
		$rst = $this->OutputPackingVFModel->check_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_save()
	{
		$this->load->model('OutputPackingVFModel');
		$rst = $this->OutputPackingVFModel->save();

		echo json_encode($rst);
	}
}

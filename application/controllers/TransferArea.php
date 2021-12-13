<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransferArea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransferAreaModel');
		$this->load->model('OrderModel');
		$this->load->model('LinePackingModel');
	}

	public function transferAreaInput()
	{
		$this->load->view('packing/transfer_area_input_view');
	}

	public function ajax_get_all_in()
	{
		$rst['data'] = $this->TransferAreaModel->get_all_in();

		echo json_encode($rst);
	}

	public function ajax_get_all_out()
	{
		$rst['data'] = $this->TransferAreaModel->get_all_out();

		echo json_encode($rst);
	}

	public function ajax_show_detail_in_by_orc($orc)
	{
		$rst['data'] = $this->TransferAreaModel->get_in_by_orc($orc);

		$this->load->view('packing/transfer_area_detail_in_view', $rst);
	}

	public function ajax_show_detail_out_by_orc($orc)
	{
		$rst['data'] = $this->TransferAreaModel->get_out_by_orc($orc);

		$this->load->view('packing/transfer_area_detail_out_view', $rst);
	}

	public function ajax_check_by_barcode($barcode)
	{
		$numRows = $this->TransferAreaModel->check_by_barcode($barcode);

		echo json_encode($numRows);
	}

	public function ajax_save_transfer_area()
	{
		if (isset($_POST['dataForTransferArea'])) {
			$dataForTransferArea = $_POST['dataForTransferArea'];
			$id = $this->TransferAreaModel->save_transfer_area($dataForTransferArea);

			echo json_encode($id);
		}
	}

	public function ajax_get_orcs()
	{
		$rst = $this->TransferAreaModel->get_orc_distinct();

		echo json_encode($rst);
	}

	public function ajax_get_po_by_orc($orc)
	{
		$row = $this->OrderModel->get_by_orc($orc);

		echo json_encode($row);
	}

	public function ajax_get_all_lokasi_packing()
	{
		$rst = $this->LinePackingModel->get_all();

		echo json_encode($rst);
	}

	public function ajax_save_batch_transfer_area()
	{
		if (isset($_POST['dataForTransferArea'])) {
			$dataForTransferArea = $_POST['dataForTransferArea'];

			$rowAff = $this->TransferAreaModel->save_batch_transfer_area($dataForTransferArea);

			echo json_encode($rowAff);
		}
	}

	public function transferAreaOutput()
	{
		$this->load->view('packing/transfer_area_output_view');
	}

	public function ajax_get_ta_by_line()
	{
		if (isset($_POST['line'])) {
			$line = $_POST['line'];
			$rst['data'] = $this->TransferAreaModel->get_ta_by_line($line);
		}

		echo json_encode($rst);
	}

	public function ajax_update_batch_transfer_area()
	{
		if (isset($_POST['dataForTransferAreaOut'])) {
			$dataForTransferAreaOut = $_POST['dataForTransferAreaOut'];

			$rowAff = $this->TransferAreaModel->update_batch_transfer_area($dataForTransferAreaOut);

			echo json_encode($rowAff);
		}
	}

	public function ajax_get_by_orc($orc)
	{
		$rst['data'] = $this->TransferAreaModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_update_lokasi()
	{
		if (isset($_POST['dataForUpdateTA'])) {
			$dataForUpdateTA = $_POST['dataForUpdateTA'];
			$affRow = $this->TransferAreaModel->update_lokasi($dataForUpdateTA);

			echo json_encode($affRow);
		}
	}
	
	public function ajax_show_summary_in_by_orc($orc)
	{
		$rst['data'] = $this->TransferAreaModel->summary_by_orc($orc);

		$this->load->view('packing/transfer_area_summary_in_view', $rst);
	}
	
	public function ajax_update_batch_lokasi()
	{
		if (isset($_POST['dataForUbahLinePacking'])) {
			$dataForUbahLinePacking = $_POST['dataForUbahLinePacking'];
			$affRows = $this->TransferAreaModel->update_batch_lokasi($dataForUbahLinePacking);

			echo json_encode($affRows);
		}
	}
	
	public function cekPosisiORC()
	{
		$rst['data'] = $this->TransferAreaModel->get_all_posisi_orc();

		$this->load->view('packing/cek_posisi_orc_view', $rst);
	}
	
	public function ajax_get_by_barcode($barcode)
	{
		$row = $this->TransferAreaModel->get_by_barcode($barcode);

		echo json_encode($row);
	}

	public function ajax_get_distinct_orc_packing()
	{
		$rst = $this->TransferAreaModel->get_distinct_orc_packing();

		echo json_encode($rst);
	}

	public function ajax_get_by_orc_in($orc)
	{
		$rst['data'] = $this->TransferAreaModel->get_by_orc_in($orc);

		// print_r($rst);

		echo json_encode($rst);
	}
	
	public function ajax_all_line_in()
	{
	}

	public function ajax_in_filter_by_orc()
	{
		$rst['data'] = $this->TransferAreaModel->in_filter_by_orc();

		echo json_encode($rst);
	}

	public function ajax_get_fg_results()
	{
		$data['count_cartons_all'] = $this->TransferAreaModel->get_count_cartons_all();
		$data['count_cartons_out'] = $this->TransferAreaModel->get_count_cartons_out();
		$data['count_cartons_in'] = $this->TransferAreaModel->get_count_cartons_in();

		$data['sum_pcs_all'] = $this->TransferAreaModel->get_sum_pcs_all();
		$data['sum_pcs_out'] = $this->TransferAreaModel->get_sum_pcs_out();
		$data['sum_pcs_in'] = $this->TransferAreaModel->get_sum_pcs_in();

		echo json_encode($data);
	}

	public function ajax_all_filter_by_line()
	{
		// echo json_encode($rst);
		$this->load->view('packing/dataAnalytic/all_filter_by_line_view');
	}

	public function ajax_out_filter_by_line()
	{
		$rst['data'] = $this->TransferAreaModel->out_filter_by_line();

		$this->load->view('packing/dataAnalytic/out_filter_by_line_view', $rst);

		// echo json_encode($rst);
	}

	public function ajax_in_filter_by_line()
	{
		$rst['data'] = $this->TransferAreaModel->in_filter_by_line();

		$this->load->view('packing/dataAnalytic/in_filter_by_line_view', $rst);

		// echo json_encode($rst);
	}

	public function ajax_show_detail_fg_by_lokasi($line)
	{
		$rst['data'] = $this->TransferAreaModel->get_fg_by_line(urldecode($line));

		$this->load->view('packing/fg_detail_view', $rst);
	}

	public function ajax_get_all_filter_by_line()
	{
		$rst['data'] = $this->TransferAreaModel->all_filter_by_line();

		echo json_encode($rst);
	}

	public function ajax_show_detail_fg_by_lokasi_out($lokasi)
	{
		$rst['data'] = $this->TransferAreaModel->get_fg_by_line_out(urldecode($lokasi));

		$this->load->view('packing/fg_detail_view', $rst);
	}

	public function ajax_show_detail_fg_by_lokasi_in($line)
	{
		$rst['data'] = $this->TransferAreaModel->get_fg_by_line_in(urldecode($line));

		$this->load->view('packing/fg_detail_view', $rst);
	}

	public function ajax_get_line_capacity()
	{
		$rst['data'] = $this->TransferAreaModel->get_line_capacity();

		echo json_encode($rst);
	}	

	public function ajax_get_all_lines()
	{
		$rst = $this->TransferAreaModel->get_all_lines();

		echo json_encode($rst);
	}

	public function ajax_get_count_status_in()
	{
		$rst = $this->TransferAreaModel->get_count_status_in();

		echo json_encode($rst);
	}	
}

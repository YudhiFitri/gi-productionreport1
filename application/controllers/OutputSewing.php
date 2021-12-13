<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OutputSewing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('user');
		} elseif (strpos($this->session->userdata('username'), 'Admin') !== false) {
			redirect('user/not_allowed');
		} else {
			$this->load->model('OutputSewingModel');
			$this->load->model('OutputSewingDetailModel');
			$this->load->model('InputSewingModel');

			$this->load->model('ViewOutputSewingModel');
			$this->load->model('InputCuttingModel');
		}
	}

	public function index()
	{
		// $data['output'] = $this->ViewoutputSewingModel->get_by_line_date_now();
		// $this->load->view('sewing/output_sewing_view');
		// $this->load->view('sewing/output_sewing_view');
		$this->load->view('sewing/output_sewing_view1');
	}

	public function ajax_list()
	{
		// $data = $this->ViewOutputSewingModel->get_by_line_date_now2();

		// $data = $this->ViewOutputSewingModel->get_last_record();
		$list = $this->ViewOutputSewingModel->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = $k->id_output_sewing_detail;
			$row[] = $k->orc;
			$row[] = $k->no_bundle;
			// $row[] = $k->center_panel;
			// $row[] = $k->back_wings;
			// $row[] = $k->cups;
			$row[] = $k->size;
			$row[] = date('d-m-Y', strtotime($k->tgl_ass)) . ' '  . $k->assembly;
			$row[] = $k->qty;

			$row[] = '<a class="btn btn-sm btn-danger mx-1" href="javascript:void(0)" title="Delete this bundle" onclick="deleteBundle(' . "'" . $k->id_output_sewing_detail . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
			// '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit Qty" onclick="editQty(' . "'" . $k->id_output_sewing_detail . "'" . ')"><i class="fa fa-pencil"></i> Edit Qty</a> 


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ViewOutputSewingModel->count_all(),
			"recordsFiltered" => $this->ViewOutputSewingModel->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
		// exit;        

	}

	public function ajax_list1()
	{
		$rst = $this->OutputSewingModel->get_by_line_date_now();

		echo json_encode($rst);
	}

	public function ajax_save()
	{
		$rst = $this->OutputSewingModel->save();

		echo json_encode($rst);
	}

	public function ajax_get_by_barcode($barcode)
	{
		$rst = $this->InputSewingModel->get_by_barcode1($barcode);

		echo json_encode($rst);
	}

	public function ajax_save_detail()
	{
		// $rstOutputSewing = $this->OutputSewingModel->get_by_line_date_now();

		// $rst = $this->OutputSewingDetailModel->save($rstOutputSewing->id_output_sewing);

		// $rst = $this->OutputSewingDetailModel->save();

		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			// $rowAffected = $this->OutputSewingModel->updateOutputSewing($dataStr);
			// if ($rowAffected > 0) {
			// 	$boolSuccess = $this->OutputSewingDetailModel->save($dataStr);

			// 	echo json_encode($boolSuccess);
			// }

			if ($this->OutputSewingDetailModel->save($dataStr)) {
				$rowAffected = $this->OutputSewingModel->updateOutputSewing($dataStr);

				echo json_encode($rowAffected);
			}			
		}

		// echo json_encode($rst);
	}

	public function ajax_get_by_barcode1($barcode)
	{
		$rst = $this->OutputSewingDetailModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_get_by_barcode2($barcode)
	{
		$rst = $this->ViewOutputSewingModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_update()
	{
		$r = $this->OutputSewingDetailModul->update();

		echo json_encode($r);
	}

	public function ajax_update_cp()
	{
		$r = $this->OutputSewingDetailModel->update_cp();

		echo json_encode($r);
	}

	public function ajax_update_bw()
	{
		$r = $this->OutputSewingDetailModel->update_bw();

		echo json_encode($r);
	}

	public function ajax_update_cu()
	{
		$r = $this->OutputSewingDetailModel->update_cu();

		echo json_encode($r);
	}

	public function ajax_update_as()
	{
		$r = $this->OutputSewingDetailModel->update_as();

		echo json_encode($r);
	}

	public function ajax_update_qty()
	{
		$r = $this->OutputSewingDetailModel->update_qty();

		echo json_encode($r);
	}

	public function ajax_check_barcode($code)
	{
		// $result = $this->InputCuttingModel->get_by_barcode($code);
		$result = $this->InputSewingModel->get_by_barcode1($code);

		echo json_encode($result);
	}

	public function ajax_get_by_line_date_now()
	{
		$rst = $this->ViewOutputSewingModel->get_by_line_date_now();

		echo json_encode($rst);
	}

	public function ajax_get_by_line_date_now1()
	{
		$rst = $this->OutputSewingModel->get_by_line_date_now();

		echo json_encode($rst);
	}

	public function ajax_delete_bundle($id)
	{
		$r = $this->OutputSewingDetailModel->delete_bundle($id);

		echo json_encode($r);
	}

	public function wip_global_sewing()
	{
		$this->load->view('sewing/wip_global_output_sewing_view');
	}

	public function wip_orc_sewing()
	{
		$this->load->view('sewing/wip_orc_output_sewing_view');
	}



	public function ajax_get_datatables_wip_global()
	{
		$list = $this->ViewOutputSewingModel->get_datatables_wip_global();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = $k->id_output_sewing_detail;
			$row[] = $k->orc;
			$row[] = $k->no_bundle;
			$row[] = $k->center_panel;
			$row[] = $k->back_wings;
			$row[] = $k->cups;
			$row[] = $k->assembly;
			$row[] = $k->qty;

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ViewOutputSewingModel->count_all_wip_global(),
			"recordsFiltered" => $this->ViewOutputSewingModel->count_filtered_wip_global(),
			"data" => $data,
		);
		echo json_encode($output);
		// print_r($output);
	}

	public function ajax_get_datatables_wip_orc($orc)
	{
		$list = $this->ViewOutputSewingModel->get_datatables_wip_orc($orc);

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = $k->id_output_sewing_detail;
			$row[] = $k->orc;
			$row[] = $k->no_bundle;
			$row[] = $k->center_panel;
			$row[] = $k->back_wings;
			$row[] = $k->cups;
			$row[] = $k->assembly;
			$row[] = $k->qty;

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ViewOutputSewingModel->count_all_wip_orc($orc),
			"recordsFiltered" => $this->ViewOutputSewingModel->count_filtered_wip_orc($orc),
			"data" => $data,
		);
		echo json_encode($output);
		// print_r($output);
	}

	public function ajax_get_output_sewing_detail_by_barcode($barcode)
	{
		$rst = $this->OutputSewingDetailModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}
}

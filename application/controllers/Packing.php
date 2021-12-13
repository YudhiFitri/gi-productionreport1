<?php
defined('BASEPATH') or exit('direct access script not allowed');

class Packing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') != TRUE) {
			redirect('user');
		// } elseif ($this->session->userdata('username') != "Admin Packing" ||
		// 		$this->session->userdata('username') != "Mover Packing" ||
		// 		$this->session->userdata('username') != "Operator Packing") {
		// 	redirect('user/not_allowed');
		} else {
			$this->load->model('PackingModel');
			$this->load->model('PackingDetailModel');
			$this->load->model('OutputSewingDetailModel');
			$this->load->model('ViewCuttingDoneModel');
			$this->load->model('SizeModel');
			$this->load->model('SamModel');
			$this->load->model('CuttingDetailModel');

			$this->load->model('InputSewingModel');

			$this->load->model('ViewOutputPackingModel');

			$this->load->model('InputPackingModel');
			$this->load->model('ViewOutputPackingModel1');
			$this->load->model('PackingMemberModel');
			$this->load->model('OrderModel');
			$this->load->model('OutputPackingModel');
			$this->load->model('OutputPackingDetailModel');
			$this->load->model('OutputPackingRemarksModel');
			$this->load->model('KapasitasKartonModel');
			$this->load->model('PackingListModel');
			$this->load->model('ViewPackingBarcodeModel');

			$this->load->library('Pdf');
		}
	}

	public function index()
	{
		$this->load->view('packing/output_packing_view');
	}

	public function ajax_list_input_packing()
	{
		// $list = $this->InputPackingModel->get_datatables();
		// $data = array();
		// $no = $_POST['start'];
		// foreach ($list as $k) {
		// 	$no++;
		// 	$row = array();
		// 	// $row[] = "";
		// 	$row[] = $k->id_input_packing;
		// 	$row[] = $k->orc;
		// 	$row[] = $k->style;
		// 	$row[] = $k->color;
		// 	$row[] = $k->size;
		// 	$row[] = $k->no_bundle;
		// 	$row[] = $k->qty;
		// 	$row[] = date('d-m-Y', strtotime($k->tgl));


		// 	$data[] = $row;

		// 	$rst['data'] = $this->InputPackingModel->get_all_distinct();

		// 	echo json_encode($rst);			
		// }
		// $output = array(
		// 	"draw" => $_POST['draw'],
		// 	"recordsTotal" => $this->InputPackingModel->count_all(),
		// 	"recordsFiltered" => $this->InputPackingModel->count_filtered(),
		// 	"data" => $data,
		// );
		// echo json_encode($output);

		$rst['data'] = $this->InputPackingModel->get_all_distinct();

		echo json_encode($rst);		
	}

	public function ajax_list()
	{
		$list = $this->PackingModel->get_datatables();
		// $list = $this->ViewOutputPackingModel1->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $k) {
			$no++;
			$row = array();
			// $row[] = "";
			$row[] = $k->id_output_packing;
			$row[] = date('d-m-Y', strtotime($k->tgl));
			$row[] = $k->orc;
			// $row[] = $k->qty_order;
			$row[] = $k->qty;
			// $row[] = $k->total_actual_qty_order;
			// $row[] = $k->total_actual_qty;
			$row[] = $k->boxes;
			$row[] = $k->total_actual_boxes;
			// $row[] = $k->style;
			// $row[] = $k->color;
			// $row[] = $k->size;
			// $row[] = $k->no_bundle;
			// $row[] = $k->qty;
			// $row[] = $k->actual_qty;
			// $row[] = $k->qty_remark;
			// $row[] = $k->remark;

			// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Show Detail" onclick="showDetail(' . "'" . $k->id_cutting . "'" . ')"><i class="fa fa-pencil"></i> Show Detail</a>';
			// $row[] = '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Take Action</button>
			//           <ul class="dropdown-menu">
			//             <li class="dropdown-item"><a href="javascript:void(0)" title="Update Data Packing" onclick="addPacking('. "'" . $k->id_output_packing . "'" . ')">Add Packing</a></li>
			//             <li class="dropdown-item"><a href="javascript:void(0)" title="Show Detail Packing" onclick="showDetail('. "'" . $k->id_output_packing . "'" . ')">Show Detail</a></li>
			//             <li class="dropdown-divider"></li>
			//             <li class="dropdown-item"><a href="#">Action 4</a></li>
			//           </ul>';

			// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Update Data Packing" onclick="addPacking(' . "'" . $k->id_output_packing . "'" . ')"><i class="fa fa-pencil"></i> Add Packing</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->ViewOutputPackingModel1->count_all(),
			"recordsTotal" => $this->PackingModel->count_all(),
			// "recordsFiltered" => $this->ViewOutputPackingModel1->count_filtered(),
			"recordsFiltered" => $this->PackingModel->count_filtered(),
			"data" => $data,
		);
		// var_dump($output);
		// print_r($output);
		echo json_encode($output);
		exit;
	}

	public function input_packing()
	{
		$this->load->view('packing/input_packing_view');
	}

	public function ajax_save()
	{
		$r = $this->PackingModel->save();

		echo json_encode($r);
	}

	public function ajax_save_detail()
	{
		$retVal = $this->PackingDetailModel->save_detail();

		echo json_encode($retVal);
	}

	public function ajax_get_orc()
	{
		$rst = $this->OutputSewingDetailModel->get_orc();

		echo json_encode($rst);
	}

	public function ajax_get_qty_order($orc)
	{
		$rst = $this->OrderModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function get_qty_order($orc)
	{
		$rst = $this->OrderModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_get_by_orc_for_packing($orc)
	{
		// $rst = $this->ViewCuttingDoneModel->get_by_orc_for_packing($orc);
		$rst = $this->InputSewingModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_get_by_size()
	{
		$data = $this->SizeModel->get_by_size();

		echo json_encode($data);
	}

	public function ajax_get_packing_sam()
	{
		$rst = $this->SamModel->get_packing_sam();

		echo json_encode($rst);
	}

	public function ajax_update_cutting_detail()
	{
		$rst = $this->CuttingDetailModel->update3();

		echo json_encode($rst);
	}

	public function ajax_get_by_orc_size()
	{
		$rst = $this->PackingModel->get_by_orc_size();

		echo json_encode($rst);
	}

	public function ajax_get_kap_karton()
	{
		$v = $this->KapasitasKartonModel->get_by_style_size();

		echo json_encode($v);
	}

	public function ajax_get_by_qty_size_boxes()
	{
		$rv = $this->ViewCuttingDoneModel->get_by_qty_size_boxes();

		echo json_encode($rv);
	}

	public function ajax_get_max_boxes($orc)
	{
		$r = $this->ViewCuttingDoneModel->ajax_get_max_boxes($orc);

		echo json_encode($r);
	}

	public function get_max_boxes($orc)
	{
		$r = $this->ViewCuttingDoneModel->ajax_get_max_boxes($orc);

		echo json_encode($r);
	}

	public function ajax_get_actual_boxes_qty()
	{
		$rst = $this->ViewOutputPackingModel->get_actual_boxes_qty();

		echo json_encode($rst);
	}

	public function ajax_update_packing()
	{
		$r = $this->PackingModel->update();

		echo json_encode($r);
	}

	public function ajax_get_sewing_detail($barcode)
	{
		$r = $this->InputPackingModel->get_sewing_detail($barcode);

		echo json_encode($r);
	}

	public function ajax_get_cutting_detail($barcode)
	{
		$r = $this->InputPackingModel->get_cutting_detail($barcode);

		echo json_encode($r);
	}

	public function ajax_save_input_packing()
	{
		$r = $this->InputPackingModel->save();

		echo json_encode($r);
	}

	public function ajax_check_input_packing($barcode)
	{
		$r = $this->InputPackingModel->check_input_packing($barcode);

		echo json_encode($r);
	}

	public function ajax_get_input_packing($barcode)
	{
		$r = $this->InputPackingModel->get_input_packing($barcode);

		echo json_encode($r);
	}

	public function entry_output_packing()
	{
		$this->load->view('packing/entry_output_packing_view');
	}

	public function ajax_check_packing_member($barcode)
	{
		$r = $this->PackingMemberModel->check_by_barcode($barcode);

		echo json_encode($r);
	}

	public function ajax_save_output_packing()
	{
		$r = $this->OutputPackingModel->save();

		echo json_encode($r);
	}

	public function ajax_save_output_packing_remark($id)
	{
		$retVal = $this->OutputPackingModel->save_remarks($id);

		echo json_encode($retVal);
	}

	public function ajax_get_output_packing_detail_by_id($id)
	{
		$retRow = $this->OutputPackingDetailModel->get_by_output_packing_id($id);

		echo json_encode($retRow);
	}

	public function ajax_get_remarks_packing($id)
	{
		$result = $this->OutputPackingRemarksModel->get_remarks_by_id_packing_detail($id);

		echo json_encode($result);
	}

	public function create_barcode()
	{
		$this->load->view('packing/create_barcode_view');
	}

	public function ajax_get_cutting_detail_by_orc($orc)
	{
		$result = $this->ViewCuttingDoneModel->get_by_orc($orc);

		echo json_encode($result);
	}

	public function ajax_get_packing_list($orc)
	{
		// $rst = $this->ViewCuttingDoneModel->get_packing_list($orc);
		// $rst = $this->ViewPackingBarcodeModel->get_by_orc($orc);
		$rst = $this->PackingListModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_get_kapasitas_karton()
	{
		$row = $this->KapasitasKartonModel->get_by_style_size();

		echo json_encode($row);
	}

	public function packing_list()
	{
		// $data['barcodes'] = $this->PackingListModel->save_packing_list();
		// $this->load->view('packing/generate_barcode_view', $data);
		// $result = $this->PackingListModel->save_packing_list();
		// $this->load->view('packing/print_barcode_view', $data); 
		// echo json_encode($result);

		// $this->load->view('packing/packing_list_view');
	}

	public function ajax_save_packing()
	{
		$result = $this->PackingListModel->save_packing();

		echo json_encode($result);
	}

	public function ajax_show_packing_list($orc)
	{
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');

		$result = $this->ViewPackingBarcodeModel->get_by_orc($orc);

		foreach ($result as $r) {
			$this->set_barcode($r->barcode);
		}

		$data['packing_list_barcode'] = $result;

		$this->load->view('packing/print_barcode_view', $data);

		// echo json_encode($result);
	}

	private function set_barcode($code)
	{
		$image_resources = Zend_Barcode::draw('code128', 'image', array('text' => $code), array());
		$image_name = $code . ".jpg";
		$image_dir = './assets/barcodes/';

		imagejpeg($image_resources, $image_dir . $image_name);
	}

	private function _print_barcode_packing1($orc, $rst)
	{
		$this->load->library('Pdf');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);
		// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156', '205'), TRUE, 'UTF-8', FALSE);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->setPrintFooter(FALSE);
		$pdf->setPrintHeader(FALSE);

		// $pdf->SetLeftMargin(4);
		// $pdf->SetTopMargin(8);
		// $pdf->SetRightMargin(4);
		// $pdf->SetMargins(4, 8, 4);

		$pdf->SetAutoPageBreak(TRUE, 10);

		//image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// font
		$pdf->SetFont('helvetica', 6);

		// $width = $pdf->pixelsToUnits(589.606);
		// $height = $pdf->pixelsToUnits(774.803);
		// $res = array($width, $height);


		$style = array(
			'position' => '',
			'align' => 'C',
			'stretch' => true,
			'fitwidth' => false,
			'cellfitalign' => '',
			'border' => true,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0, 0, 0),
			'bgcolor' => false, //array(255,255,255),
			'text' => true,
			'font' => 'helvetica',
			'fontsize' => 6,
			'stretchtext' => 0
		);

		$counter = 1;
		$limit = 30;
		$pages = (int)round(count($rst) / 30);

		for ($p = 1; $p <= $pages; $p++) {
			// $pdf->AddPage('P', $res, TRUE);
			$pdf->AddPage('P');
			$rows = $this->ViewPackingBarcodeModel->get_by_orc_limit_offset($orc, ($p * $limit) - $limit, $limit);
			foreach ($rows as $r) {
				$x = $pdf->GetX();

				$y = $pdf->GetY();

				$pdf->SetFontSize(6);

				$pdf->setCellMargins(0, 0, 6, 0);

				//barcode
				// $pdf->write1DBarcode($r->barcode, 'C128', $x, $y - 3.5, 50, 12, 0.4, $style, 'T');
				$pdf->write1DBarcode($r->barcode, 'C39', $x, $y - 3.5, 50, 12, 0.4, $style, 'N');

				// //color
				$pdf->SetXY($x, $y);
				$pdf->Cell(45, 22, $r->color, 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

				// //style
				$pdf->SetXY($x, $y);
				$pdf->Cell(45, 22, $r->style, 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

				// //size
				$pdf->SetXY($x, $y);
				$pdf->Cell(45, 27, $r->size, 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

				// //no_box
				$pdf->SetXY($x, $y);
				$pdf->Cell(45, 27, $r->box_capacity, 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

				if ($counter == 3) {
					// $pdf->Ln(5.7);
					// $pdf->Ln(17);
					$pdf->Ln(21);
					// $pdf->Ln(8);
					// $pdf->Ln(16);
					// $pdf->Ln(22);
					// $pdf->Ln(33.9);
					$counter = 1;
				} else {
					$counter++;
				}
			}
		}

		ob_end_clean();

		$pdf->Output('packing_list_barcodes.pdf', 'I');
	}

	private function _print_barcode_packing($orc, $rst)
	{
		$this->load->library('Pdf');

		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156','205'), true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		//margins
		// $pdf->setTopMargin(10);
		// $pdf->setLeftMargin(1);
		$pdf->SetMargins(3, 8.5, 4, true);
		// $pdf->SetMargins(1, 4, 1, FALSE);

		// $pdf->SetTopMargin(4);
		// $pdf->SetTopMargin(12);


		// $pdf->setHeaderMargin(13);
		// $pdf->setFooterMargin(13);

		//auto page breaks
		// $pdf->SetAutoPageBreak(true, 21);
		// $pdf->SetAutoPageBreak(true, 13);
		// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// $pdf->SetAutoPageBreak(TRUE, -10);
		$pdf->SetAutoPageBreak(TRUE, -8);
		// $pdf->SetAutoPageBreak(TRUE, -4);

		//image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		//font
		$pdf->SetFont('helvetica', 6);

		//add page
		// $width = $pdf->pixelsToUnits(593.385);
		// $height = $pdf->pixelsToUnits(774.803);

		$width = $pdf->pixelsToUnits(589.606);
		// $height = $pdf->pixelsToUnits(774.803);

		$height = $pdf->pixelsToUnits(740.787);
		$res = array($width, $height);


		$pdf->SetFont('helvetica', 6);

		$style = array(
			'position' => '',
			'align' => 'C',
			'stretch' => true,
			'fitwidth' => false,
			'cellfitalign' => '',
			'border' => false,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0, 0, 0),
			'bgcolor' => false, //array(255,255,255),
			'text' => true,
			'font' => 'helvetica',
			'fontsize' => 5,
			'stretchtext' => ''
		);
		// var_dump(count($rst));

		$counter = 1;
		$limit = 30;
		$pages = (int)round(count($rst) / 30);
		// var_dump($pages);
		// print_r($pages);
		for ($p = 1; $p <= $pages; $p++) {
			$pdf->AddPage('P', $res);
			// if($p == 0){
			// $rows = $this->ViewPackingBarcodeModel->get_by_orc_limit($orc, $limit);
			// }else{
			$rows = $this->ViewPackingBarcodeModel->get_by_orc_limit_offset($orc, ($p * $limit) - $limit, $limit);
			// }
			// var_dump($rows);
			foreach ($rows as $r) {
				$x = $pdf->GetX();

				$y = $pdf->GetY();

				$pdf->SetFontSize(4);

				$pdf->setCellMargins('0', '1', '6.5', '1');

				//barcode
				// $pdf->write1DBarcode($r->barcode, 'C128', $x, $y - 3.5, 50, 12, 0.4, $style, 'T');
				$pdf->write1DBarcode($r->barcode, 'UPC', $x + 1.5, $y - 0.2, 47, 12, 0.4, $style, 'T');

				// //color
				$pdf->SetXY($x + 1.5, $y - 0.2);
				$pdf->Cell(47, 21, $r->color, 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

				// //style
				$pdf->SetXY($x + 1.5, $y - 0.2);
				$pdf->Cell(47, 21, $r->style, 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

				// //size
				$pdf->SetXY($x + 1.5, $y - 0.2);
				$pdf->Cell(47, 26, $r->size, 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

				// //box_capacity
				$pdf->SetXY($x + 1.5, $y - 0.2);
				$pdf->Cell(47, 26, $r->box_capacity, 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

				if ($counter == 3) {
					// $pdf->Ln(5.7);
					// $pdf->Ln(17);
					$pdf->Ln(21);
					// $pdf->Ln(8);
					// $pdf->Ln(16);
					// $pdf->Ln(22);
					// $pdf->Ln(33.9);
					$counter = 1;
				} else {
					$counter++;
				}
			}
		}

		ob_end_clean();

		$pdf->Output('packing_list_barcodes.pdf', 'I');
	}

	private function _print_barcode_packing2($orc, $rst)
	{
		$this->load->library('Pdf');

		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156','205'), true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->SetMargins(3, 7, 2);
		$width = 216;
		$height = 330;

		$pageRes = array($width, $height);

		$pdf->AddPage('P', $pageRes);
		$barcodeStyle = array(
			'position' => '',
			'align' => 'C',
			'stretch' => true,
			'fitwidth' => false,
			'cellfitalign' => '',
			'border' => false,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0, 0, 0),
			'bgcolor' => false,
			'text' => false,
			'font' => 'helvetica',
			'fontsize' => 6,
			'stretchtext' => ''
		);

		$counterCols = 1;
		$counterRows = 1;

		$labelCols = 3;
		$labelRows = 10;
		$labelWidth = 70;
		$labelWidthBaseMargin = 1;
		// $labelHeight = 15;
		$labelHeight = 12;
		$labelHeightBaseMargin = 20;
		$labelHeightMargin = $labelHeight - 7.5;

		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$totBox = 0;

		for ($i = 0; $i <= count($rst) - 1; $i++) {
			if ($y >= 300) {
				$pdf->AddPage('P', $pageRes);
				$y = $pdf->GetY();
			}

			$styleArr = explode(" ", $rst[$i]->style);

			if (count($styleArr) > 1) {
				$style = $styleArr[0] . " " . $styleArr[1] . "...";
				$pdf->SetFont('Helvetica', 'B', 10);
			} else {
				$style = $rst[$i]->style;
				$pdf->SetFont('Helvetica', 'B', 12);
			}

			$colorArr = explode(" ", $rst[$i]->color);
			if (count($colorArr) > 1) {
				$color = $colorArr[0] . " " . $colorArr[1] . '...';
				$pdf->SetFont('Helvetica', 'B', 10);
			} else {
				$color = $rst[$i]->color;
				$pdf->SetFont('Helvetica', 'B', 12);
			}

			//barcode
			$pdf->SetFont('Helvetica', 'B', 11);
			$pdf->write1DBarcode($rst[$i]->barcode, 'C128', $x, $y - 3, $labelWidth, $labelHeight, 0.4, $barcodeStyle, 'L');

			//style, color
			$pdf->SetXY($x + 1, $y + $labelHeight - 3);
			$pdf->Cell(
				$labelWidth,
				5,
				$style . "  " . $color,
				0,
				0,
				'L',
				FALSE,
				'',
				0,
				FALSE,
				'C',
				'B'
			);

			//orc, size, qty, box capacity
			$pdf->SetXY($x + 1, $y + $labelHeight);
			$pdf->SetFont('Helvetica', 'B', 11);
			$pdf->Cell($labelWidth, 7, $orc . "  " . $rst[$i]->size . " " . $rst[$i]->qty . " " . $rst[$i]->pcs . " ", 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

			//nmr box
			$pdf->SetXY($x, $y + $labelHeight);

			$pdf->SetFont('Helvetica', 'B', 11);
			$pdf->Cell($labelWidth, 7, str_repeat("0", 4 - (strlen(strval($rst[$i]->no_box)))) . strval($rst[$i]->no_box), 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

			$x = $x + $labelWidth + $labelWidthBaseMargin;
			if ($counterCols == $labelCols) {
				$pdf->ln($labelHeight);
				$counterCols = 1;
				$x = $pdf->GetX();
				$y = $y + $labelHeightMargin + $labelHeightBaseMargin;
			} else {
				$counterCols++;
			}
		}

		ob_end_clean();
		$pdf->Output('packingBarcodes.pdf', 'I');
	}

	private function _print_packing_list($rst){
		$this->load->library('Pdf');

		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->SetMargins(5, 10);

	}

	public function ajax_barcode_print_preview($orc)
	{

		$result = $this->ViewPackingBarcodeModel->get_by_orc($orc);

		// $this->_print_barcode_packing($orc, $result);
		// $this->_print_barcode_packing1($orc, $result);
		$this->_print_barcode_packing2($orc, $result);
	}

	public function ajax_packing_list_print_preview($orc){
		$data['packingList'] = $this->PackingListModel->get_by_orc($orc);;
		// $this->load->library('Pdf');

		$this->load->view('packing/print_packing_list_view', $data);
	}

	public function box_capacity()
	{
		$this->load->view('packing/box_packing_capacity_view');
	}

	public function ajax_get_kapasitas_karton_by_style_distinct()
	{
		$rst = $this->KapasitasKartonModel->get_kapasitas_karton_by_style_distinct();

		echo json_encode($rst);
	}

	public function ajax_get_kapasitas_karton_by_style()
	{
		// $styleReplaced = str_replace("%20", " ", $style);
		// $rst = $this->KapasitasKartonModel->get_kapasitas_karton_by_style($styleReplaced);

		$rst = $this->KapasitasKartonModel->get_kapasitas_karton_by_style();

		echo json_encode($rst);
	}

	public function ajax_get_by_style()
	{
		$r = $this->KapasitasKartonModel->get_by_style();
		// $data['styles'] = $r;

		// echo json_encode($r);
		// $this->load->view('packing/edit_kapasitas_karton_view', $data);

		echo json_encode($r);
	}

	public function edit_kapasitas_karton()
	{
		$this->load->view('packing/edit_kapasitas_karton_view');
	}

	public function ajax_update_kapasitas_karton()
	{
		$affectedRow = $this->KapasitasKartonModel->update_kapasitas_karton();

		echo json_encode($affectedRow);
	}

	public function ajax_save_kapasitas_karton()
	{
		$affRow = $this->KapasitasKartonModel->save_kapasitas_karton();

		echo json_encode($affRow);
	}

	public function ajax_get_barcode_packing($code)
	{
		$row = $this->ViewPackingBarcodeModel->get_by_barcode($code);

		echo json_encode($row);
	}

	public function packing_member()
	{
		$this->load->view('packing/packing_member_view');
	}

	public function ajax_list_packing_member()
	{
		$list = $this->PackingMemberModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = "";
			$row[] = $k->id_packing_member;
			$row[] = $k->nik;
			$row[] = $k->nama;
			$row[] = $k->jnskelamin;
			$row[] = $k->no_ktp;
			$row[] = $k->alamat;
			$row[] = $k->email;
			$row[] = $k->tgl_lahir;
			$row[] = $k->zona_kerja;
			$row[] = $k->barcode;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->PackingMemberModel->count_all(),
			"recordsFiltered" => $this->PackingMemberModel->count_filtered(),
			"data" => $data,
		);
		// var_dump($output);
		// print_r($output);
		echo json_encode($output);
		exit;
	}

	public function add_packing_member()
	{
		$this->load->view('packing/add_packing_member_view');
	}

	public function insert_packing_member()
	{
		$rst = $this->PackingMemberModel->save();

		echo json_encode($rst);
	}

	public function edit_packing_member()
	{
		$rst = $this->PackingMemberModel->update();

		echo json_encode($rst);
	}

	public function delete_packing_member($id)
	{
		$row_affected = $this->PackingMemberModel->delete($id);

		echo json_encode($row_affected);
	}

	private function _print_barcode_data($packingMembers)
	{
		$this->load->library('Pdf');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Yudhi Prasetya');
		$pdf->SetTitle('Daftar Barcode Packing Member');

		// set default header data
		$pdf->SetHeaderData('', '', "Daftar Barcode Packing Member", "");

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf->AddPage('L');

		$html = "";
		$html .= '<style>
					th {
						border-top: 1px solid black;
						border-bottom: 2px solid black;
						font-size: 14pt;
						font-weight: bold;
					}

					td {
						border-bottom: 1px solid black;
					}

				</style>
					
				<body>
					<table cellpadding="5px" cellspacing="5px">
						<thead>
							<tr>
								<th width="85" align="left" ><strong>NIK</strong></th>
								<th width="175" align="left">Nama Lengkap</th>
								<th width="80" align="left">Gender</th>
								<th width="175" align="left">Alamat</th>
								<th width="175" align="left">Email</th>
								<th width="175" align="center">Barcode</th>
							</tr>
						</thead>
						<tbody>';

		foreach ($packingMembers as $pm) {
			$params = $pdf->serializeTCPDFtagParameters(array($pm['barcode'], 'C128', '', '', 50, 15, 0.4, array('position' => 'S', 'border' => false, 'padding' => 1, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4), 'N'));
			// var_dump($params);
			$html .= '<tr>
						<td width="85">' . $pm['nik'] . '</td>
						<td width="175">' . $pm['nama'] . '</td>
						<td width="80">' . $pm['jnskelamin'] . '</td>
						<td width="175" align="left">' . $pm['alamat'] . '</td>
						<td width="175" align="left">' . $pm['email'] . '</td>';
			$html .= '<td width="175" align="center"><tcpdf method="write1DBarcode" params="' . $params . '" /></td><br/></tr>';
		}
		$html .= '</tbody></table></body>';
		// var_dump($html);
		// print_r($html);

		// output the HTML content
		$pdf->writeHTML($html, true, 0, true, 0);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------
		ob_end_clean();

		//Close and output PDF document
		$pdf->Output('PackingMembers.pdf', 'I');
	}

	public function print_all_packing_member_barcode()
	{
		// $packingMembers = $this->PackingMemberModel->get_all();
		// $this->load->library('Pdf');
		$data['packingMembers'] = $this->PackingMemberModel->get_all();

		$this->load->view('packing/print_packing_members_view', $data);

		// $this->_print_barcode_data($packingMembers);
	}

	public function print_packing_members_view1($packingMembers)
	{
		$data['packingMembers'] = $packingMembers;

		$this->load->view('packing/print_packing_members_view', $data);
	}

	public function print_selected_packing_member_barcode($dataId)
	{
		// if(isset($_POST['dataId'])){
		// 	// $data['packingMembers'] = $_POST['dataSelectedRows'];
		// 	$dataIds = $_POST['dataId'];

		// 	$packingMembers = array();
		// 	for($x = 0; $x <= count($dataIds)-1; $x++){
		// 		$rst = $this->PackingMemberModel->get_by_id($dataIds[$x]);

		// 		array_push($packingMembers, $rst);
		// 	}

		// 	$data['packingMembers'] = $packingMembers;
		// 	echo json_encode($data);

		// }
		// $this->load->view('packing/print_packing_members_view', $data);


		$dataArray = explode("-", $dataId);
		$packingMembers = array();
		for ($x = 0; $x <= count($dataArray) - 1; $x++) {
			$rst = $this->PackingMemberModel->get_by_id($dataArray[$x]);

			array_push($packingMembers, $rst);
		}
		$data['packingMembers'] = $packingMembers;
		$this->load->view('packing/print_packing_members_view', $data);

		// print_r($dataArray);


	}

	public function ajax_get_packing_members_all()
	{
		$rst['data'] = $this->PackingMemberModel->get_all();

		echo json_encode($rst);
	}

	public function ajax_get_packing_members_by_ids()
	{
		if (isset($_POST['dataId'])) {
			$dataIds = $_POST['dataId'];

			$packingMembers = array();
			for ($x = 0; $x <= count($dataIds) - 1; $x++) {
				$rst = $this->PackingMemberModel->get_by_id($dataIds[$x]);

				array_push($packingMembers, $rst);
			}

			$data['packingMembers'] = $packingMembers;

			echo json_encode($data['packingMembers']);

			// $this->load->view('packing/print_packing_members_view', $data);

		}
	}

	public function ajax_check_input_packing1()
	{
		$rst = $this->InputPackingModel->check_input_packing1();

		echo json_encode($rst);
	}

	public function ajax_check_output_packing_detail($barcode)
	{
		$rst = $this->OutputPackingDetailModel->check_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function add_solid_packing()
	{
		$data['mode'] = 'Add New';
		$this->load->view('packing/add_solid_packing_view', $data);
	}

	public function edit_solid_packing($orc){
		$data['mode'] = 'Edit Data';
		$data['packingList'] = $this->PackingListModel->get_by_orc($orc);

		// print_r($data['packingList']);

		$this->load->view('packing/edit_solid_packing_view', $data);
	}

	public function packing_solid()
	{
		$this->load->view('packing/solid_packing_view');
	}

	public function ajax_insert_solid_packing_list()
	{
		$rst = $this->PackingListModel->insert_solid_packing_list_batch();

		echo json_encode($rst);
	}

	public function ajax_get_solid_packing()
	{
		$rst = $this->PackingListModel->get_solid_packing();
		echo json_encode($rst);
	}

	public function ajax_get_solid_packing_detail()
	{
		$rst = $this->PackingListModel->get_solid_packing_detail();
		echo json_encode($rst);
	}

	public function ajax_save_solid_packing_list(){
		$rst = $this->PackingListModel->save_solid_packing_list();

		echo json_encode($rst);
	}

	public function ajax_update_batch_solid_packing_list(){
		$rst = $this->PackingListModel->update_batch_solid_packing_list();

		echo json_encode($rst);

	}
	
	public function ajax_get_packing_member_by_barcode($barcode)
	{
		$rst = $this->PackingMemberModel->get_by_barcode($barcode);

		echo json_encode($rst);
	}

	public function ajax_get_cutting_orc($orc)
	{
		$this->load->model('CuttingModel');

		$rst = $this->CuttingModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_get_packing_orc($orc)
	{
		$this->load->model('PackingListModel');

		$rst = $this->PackingListModel->get_by_orc($orc);

		echo json_encode($rst);
	}

	public function ajax_insert_solid_packing_barcode_batch()
	{
		$this->load->model('SolidPackingBarcodeModel');

		$rst = $this->SolidPackingBarcodeModel->insert_solid_packing_barcode_batch();

		echo json_encode($rst);
	}

	public function ajax_get_styles()
	{
		$rst = $this->SamModel->get_style();

		echo json_encode($rst);
	}	
	
	public function ajax_check_solid_packing_barcode($barcode)
	{
		$this->load->model('SolidPackingBarcodeModel');

		$numRows = $this->SolidPackingBarcodeModel->check_solid_packing_barcode($barcode);

		echo json_encode($numRows);
	}	

	public function ajax_update_qty_solid_packing_barcode()
	{
		if (isset($_POST['dataSolidPackingBarcode'])) {
			$dataSolidPackingBarcode = $_POST['dataSolidPackingBarcode'];
			$id = $dataSolidPackingBarcode['id_packing_list_barcode'];
			$qty = $dataSolidPackingBarcode['qty'];

			$this->load->model('SolidPackingBarcodeModel');

			$rst = $this->SolidPackingBarcodeModel->update_qty($id, $qty);

			echo json_encode($rst);
		}
	}	

	public function ajax_get_input_packing_by_orc()
	{
		$rst = $this->InputPackingModel->get_by_orc();

		echo json_encode($rst);
	}
	
	public function ajax_check_solid_packing_list_by_orc($orc)
	{
		// $this->load->model('SolidPackingListModel');

		$rst = $this->PackingListModel->check_solid_packing_list_by_orc($orc);

		echo json_encode($rst);
	}
	
	public function ajax_delete_packing_list($orc)
	{
		$rst = $this->PackingListModel->get_by_orc($orc);
		$ids = [];
		if ($rst != null) {
			foreach ($rst as $r) {
				array_push($ids, $r['id_packing_list']);
			}
			$this->load->model('SolidPackingBarcodeModel');
			$delete = $this->SolidPackingBarcodeModel->delete($ids);
			if ($delete) {
				$del = $this->PackingListModel->delete_by_orc($orc);

				echo json_encode($del);
			}
		}
	}
	
	public function ajax_get_all_lines()
	{
		$this->load->model('LineModel');
		$rst = $this->LineModel->get_all();

		echo json_encode($rst);
	}	

	public function ajax_join_get_by_barcode($barcode)
	{
		// $row = $this->OutputPackingDetailModel->join_get_by_barcode($barcode);
		$row = $this->PackingListModel->join_get_by_barcode($barcode);

		echo json_encode($row);
	}

	public function ajax_join_get_size_by_orc($orc)
	{
		$rst = $this->OutputPackingDetailModel->join_get_size_by_orc($orc);

		echo json_encode($rst);
	}	
}

<?php
defined("BASEPATH") or exit("direct script access not allowed");

class OutputPackingModel extends CI_Model{
	public function get_by_orc($orc){
		$val = $this->db->get_where('output_packing', array('orc' => $orc));

		return $val->row();
	}

	private function _get_sam($si, $co, $st, $aq){
		$querySize = $this->db->get_where('master_size', array('size' => $si));
		$rowSize = $querySize->row();

		$group_size = $rowSize->group;

		$blackPattern = '/black/i';
		$whitePattern = '/white/i';
		if(preg_match($blackPattern, $co) == 1){
			$colorGroup = 'Black';
		}else if(preg_match($whitePattern, $co) == 1){
			$colorGroup = 'White';
		}else{
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

	public function save(){
		if(isset($_POST['dataOutputPacking'])){
			date_default_timezone_set('Asia/Jakarta');

			$dataOutputPacking = $_POST['dataOutputPacking'];
			$orc = $dataOutputPacking['orc'];
			$style = $dataOutputPacking['style'];
			$color = $dataOutputPacking['color'];
			$size = $dataOutputPacking['size'];
			$no_box = $dataOutputPacking['no_box'];
			$qty= $dataOutputPacking['qty'];
			$box_capacity = $dataOutputPacking['box_capacity'];
			$barcode = $dataOutputPacking['barcode'];
			$barcodeOp = $dataOutputPacking['barcode_operator'];

			$outputPackingRetVal = $this->get_by_orc($orc);
			$packingSAMRetVal = $this->_get_sam($size, $color, $style, $box_capacity);

			$boxes = $this->_get_max_boxes($orc);
			$qtyOrder = $this->_get_qty_order($orc);

			if($outputPackingRetVal == null){
				// insert new output_packing
				$data = array(
					'orc' => $orc,
					'boxes' => $boxes->max_boxes,
					'total_actual_boxes' => 1,
					'qty' => $qtyOrder->qty,
				);
				$this->db->insert('output_packing', $data);
				$idOutputPacking = $this->db->insert_id();

				if($idOutputPacking > 0){
					$dataOutputPackingDetail = array(
						'id_output_packing' => $idOutputPacking,
						'style' => $style,
						'color' => $color,
						'size' => $size,
						'no_box' => $no_box,
						'qty' => (int)$qty,
						'box_capacity' => $box_capacity,
						'packing_sam' => (float)$packingSAMRetVal['packingSAM'],
						'packing_sam_result' => $packingSAMRetVal['packingSAMResult'],
						'barcode' => $barcode,
						'barcode_operator' => $barcodeOp
					);
					$this->db->insert('output_packing_detail', $dataOutputPackingDetail);
					$idOutputPackingDetail = $this->db->insert_id();
				}
			}else{
				//update output_packing
				$data = array(
					'tgl' => date('Y-m-d H:i:s'),
					'total_actual_boxes' => $outputPackingRetVal->total_actual_boxes + 1,
					// 'qty' => $qtyOrder->qty,
					// 'total_actual_qty' => $outputPackingRetVal->total_actual_qty + $actual_qty
				);
				$this->db->update('output_packing',$data,array('id_output_packing' => $outputPackingRetVal->id_output_packing));
				$dataOutputPackingDetail = array(
					'id_output_packing' => $outputPackingRetVal->id_output_packing,
					// 'tgl' => date('Y-m-d H:i:s'),
					'style' => $style,
					'color' => $color,
					'size' => $size,
					'no_box' => $no_box,
					'qty' => (int)$qty,
					'box_capacity' => $box_capacity,
					'packing_sam' => (float)$packingSAMRetVal['packingSAM'],
					'packing_sam_result' => $packingSAMRetVal['packingSAMResult'],
					'barcode' => $barcode,
					'barcode_operator' => $barcodeOp
				);
				$this->db->insert('output_packing_detail', $dataOutputPackingDetail);
				$idOutputPackingDetail = $this->db->insert_id();
			}
			return $idOutputPackingDetail;
		}		
	}

	public function save_remarks($id){
		if(isset($_POST['dataOutputPackingRemarks'])){
			date_default_timezone_set('Asia/Jakarta');
			
			$dataOutputPackingRemarks = $_POST['dataOutputPackingRemarks'];
			$dataForRemarks = array();

			foreach($dataOutputPackingRemarks as $remarks){
				// array_push(
				// 	$dataForRemarks,
				// 	array(
				// 		'qty_remark' => $remarks['qty_remark'],
				// 		'remark' => $remarks['remark']
				// 	)					
				// );
				array_push($dataForRemarks, array(
					'id_output_packing_detail' => $id,
					'tgl' => $remarks['tgl'],
					'qty_remark' => $remarks['qty_remark'],
					'remark' => $remarks['remark']
					)
				);
			}

			$this->db->insert_batch('output_packing_detail_remarks', $dataForRemarks);

			return $this->db->affected_rows();
			// var_dump($dataForRemarks);
		}
	}

	private function _get_max_boxes($orc){
        $this->db->select('max(boxes) as max_boxes');
        $this->db->where('orc', $orc);

        $rst = $this->db->get('viewcuttingdone');

        return $rst->row();
	}

	private function _get_qty_order($orc){
        $rst = $this->db->get_where('order', array('orc' => $orc));
        return $rst->row();		
	}
}

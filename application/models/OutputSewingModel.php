<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class OutputSewingModel extends CI_Model{
    var $table = "output_sewing";

    public function save(){
		$line = $this->session->userdata('username');

		// if (isset($_POST['center_panel_op'])) {
		// 	$centerPanelOP = $_POST['center_panel_op'];
		// }
		// if (isset($_POST['back_wings_op'])) {
		// 	$backWingsOP = $_POST['back_wings_op'];
		// }
		// if (isset($_POST['cups_op'])) {
		// 	$cupsOP = $_POST['center_panel_op'];
		// }

		if (isset($_POST['assembly_op'])) {
			$assemblyOP = $_POST['assembly_op'];
		}

		$data = [
			'line' => $line,
			'center_panel_op' => 0,
			'back_wings_op' => 0,
			'cups_op' => 0,
			'assembly_op' => $assemblyOP,
			'qty' => 0,
			'actual_qty' => 0
		];

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
    }

    public function get_by_line_date_now(){
        $userName = $this->session->userdata('username');
        $dateNow = date('Y-m-d');

        $this->db->where('line', $userName);
        $this->db->where('tgl', $dateNow);

        $rst = $this->db->get($this->table);

        return $rst->row();        
	}
	
	public function updateOutputSewing($data)
	{
		$idOutPutSewing = $data['id_output_sewing'];
		$rowCutting = $this->db->get_where('cutting', ['orc' => $data['orc']])->row();
		$qtyFromCutting = $rowCutting->qty;
		$styleFromCutting = $rowCutting->style;

		$this->db->set('orc', $data['orc']);
		$this->db->set('qty', $qtyFromCutting);
		$this->db->set('actual_qty', 'actual_qty + ' . $data['qtyPcsActual'], false);
		$this->db->set('style', $styleFromCutting);
		$this->db->where('id_output_sewing', $idOutPutSewing);
		$this->db->update('output_sewing');

		return $this->db->affected_rows();
	}	


}
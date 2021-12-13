<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PackingMember extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('PackingMemberModel');
	}

	public function ajax_get_by_barcode($barcode)
	{
		$row = $this->PackingMemberModel->get_by_barcode($barcode);

		echo json_encode($row);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputSewingModel extends CI_Model
{
	var $table = "input_sewing";

	var $column_order = array('id_input_sewing', 'line', 'tgl', 'orc', 'style', 'color', 'no_bundle', 'size', 'qty_pcs');
	var $column_search = array('id_input_sewing', 'line', 'tgl', 'orc', 'style', 'color', 'no_bundle', 'size', 'qty_pcs');
	var $order = array('id_input_sewing' => 'desc');

	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_all()
	{
		$this->db->limit(1000);
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_input_sewing', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];
			$data = array(
				'line' => $dataStr['line'],
				'tgl' => date('Y-m-d'),
				'orc' => $dataStr['orc'],
				'style' => $dataStr['style'],
				'color' => $dataStr['color'],
				'no_bundle' => $dataStr['no_bundle'],
				'size' => $dataStr['size'],
				'qty_pcs' => $dataStr['qty_pcs'],
				'center_panel_sam' => $dataStr['center_panel_sam'],
				'back_wings_sam' => $dataStr['back_wings_sam'],
				'cups_sam' => $dataStr['cups_sam'],
				'assembly_sam' => $dataStr['assembly_sam'],
				'kode_barcode' => $dataStr['kode_barcode'],
				'outputed' => "No",
			);

			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	public function get_by_barcode($code)
	{
		// $rst = $this->db->get_where('input_cutting', array('kode_barcode' => $code));
		$rst = $this->db->get_where('input_sewing', array('kode_barcode' => $code));

		return $rst->row();
	}

	public function get_by_line_barcode($l, $c)
	{
		// $this->db->where('line', $l);
		$this->db->where('kode_barcode', $c);

		$rst = $this->db->get($this->table);

		// if ($rst->num_rows() == 0) {
		// 	$result = $this->get_by_barcode($c);
		// } else {
		// 	$result = 0;
		// }

		// return $result;
		// return $rst->num_rows();
		return $rst->row();
	}

	public function get_by_barcode1($code)
	{
		$rst = $this->db->get_where($this->table, array('kode_barcode' => $code));

		return $rst->row();
	}

	public function get_by_orc($orc)
	{
		$this->db->distinct();
		$this->db->select('orc,size,color,style,qty_pcs');
		$this->db->where('to_packing', NULL);
		$this->db->where('orc', $orc);
		$rst = $this->db->get($this->table);
		// $rst = $this->db->get_where($this->table, array('orc' => $orc));

		return $rst->result();
		// return $this->db->last_query();
	}

	public function get_by_orc1($orc)
	{
		// $this->db->where('orc', $orc);
		// $rst = $this->db->get_where($this->table, array('orc' => $orc));
		$this->db->where('orc', $orc);
		$this->db->where('outputed', 'No');
		$rst = $this->db->get($this->table);

		return $rst->result();
		// return $this->db->last_query();
	}

	public function get_orc_not_in_sewing()
	{
		$query = "SELECT DISTINCT(orc) FROM input_sewing where orc NOT IN (SELECT orc FROM output_sewing_detail)";
		// $query = "SELECT DISTINCT(orc) FROM input_sewing";

		$r = $this->db->query($query);

		return $r->result();
	}

	public function update_line()
	{
		if (isset($_POST['dataInputSewing'])) {
			$dataInputSewing = $_POST['dataInputSewing'];

			// foreach($dataInputSewing as $dis){
			//     $data = array(
			//         'id_input_sewing' => $dis['id_input_sewing'],
			//         'line' => $dis['line']
			//     );
			// }

			$this->db->update_batch($this->table, $dataInputSewing, 'id_input_sewing');

			return $this->db->affected_rows();
			// return $this->db->last_query();
		}
	}

	public function get_by_line($line)
	{
		$this->db->order_by('tgl', 'DESC');

		$rst = $this->db->get_where($this->table, ['line' => $line], 100);

		return $rst->result();
	}

	public function update_change_line($id, $line)
	{
		$this->db->set('line', $line);
		$this->db->where('id_input_sewing', $id);

		$this->db->update($this->table);

		return $this->db->affected_rows();
	}

	public function get_group_line_by_barcode($code)
	{

		$data['row'] = $this->db->get_where($this->table, array('kode_barcode' => $code))->row();
		$data['groupLine'] = $this->db->get_where('line', ['name' => $data['row']->line])->row()->location;

		return $data;
	}
}

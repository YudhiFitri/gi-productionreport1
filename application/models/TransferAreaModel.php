<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransferAreaModel extends CI_Model
{
	protected $table = 'transfer_area';

	public function get_all_in()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(orc) AS orc, DATE(tgl_in) AS tgl, po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, lokasi'
		);
		$this->db->group_by('orc');
		$this->db->order_by('orc');
		$this->db->where('status', 'in');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_all_out()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(orc) AS orc, DATE(tgl_out) AS tgl, po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs'
		);
		$this->db->group_by('orc');
		$this->db->order_by('orc');
		$this->db->where('status', 'out');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_in_by_orc($orc)
	{
		$this->db->where('orc', $orc);
		$this->db->where('status', 'in');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_out_by_orc($orc)
	{
		$this->db->where('orc', $orc);
		$this->db->where('status', 'out');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function check_by_barcode($barcode)
	{
		$row = $this->db->get_where($this->table, ['barcode' => $barcode]);

		return $row->num_rows();
	}

	public function save_transfer_area($data)
	{
		$orc = $data['orc'];
		$row = $this->db->get_where('order', ['orc' => $orc])->row();
		$data['po'] = $row->so;
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function get_orc_distinct()
	{
		$this->db->select('DISTINCT(orc) AS orc, style, color');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function save_batch_transfer_area($data)
	{
		$this->db->insert_batch($this->table, $data);

		return $this->db->affected_rows();
	}

	public function get_ta_by_line($line)
	{
		// print_r($line);
		$this->db->where('lokasi', $line);
		$this->db->where('status', 'in');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function update_batch_transfer_area($data)
	{
		// print_r($data);
		$this->db->update_batch($this->table, $data, 'id_transfer_area');

		// return $this->db->last_query();

		return $this->db->affected_rows();
	}

	public function get_by_orc($orc)
	{
		$row = $this->db->get_where($this->table, ['orc' => $orc]);

		return $row->row();
	}	

	public function update_lokasi($data)
	{
		$this->db->set('lokasi', $data['lokasi']);
		$this->db->where('id_transfer_area', $data['id_transfer_area']);
		$this->db->update($this->table);

		return $this->db->affected_rows();
	}
	
	public function summary_by_orc($orc)
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('tgl_in, po, orc, style, color, size, count(carton_no) as jmlBox, sum(qty_box) as jmlQty');
		$this->db->from($this->table);
		$this->db->group_by('size');
		$this->db->where('orc', $orc);
		$rst = $this->db->get();

		return $rst->result();
	}
	
	public function update_batch_lokasi($data)
	{
		$this->db->update_batch($this->table, $data, 'id_transfer_area');

		return $this->db->affected_rows();
	}
	
	public function get_all_posisi_orc()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

		// $result = $this->db->get($this->table);
		$this->db->select(
			'DISTINCT(orc) AS orc, DATE(tgl_in) AS tgl, po, 
			style, color, lokasi'
		);
		$this->db->group_by('orc');
		$this->db->order_by('orc');
		$result = $this->db->get($this->table);

		return $result->result();
	}
	
	public function get_by_barcode($barcode)
	{
		$row = $this->db->get_where($this->table, ['barcode' => $barcode]);

		return $row->row();
	}

	public function get_distinct_orc_packing()
	{
		$this->db->select('DISTINCT(orc) as orc');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_by_orc_in($orc)
	{
		$this->db->where('orc', $orc);
		$this->db->where('status', 'in');

		$rst = $this->db->get($this->table);


		return $rst->result();
	}
	
	public function in_filter_by_orc()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(orc) AS orc, DATE(tgl_in) AS tgl, po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, lokasi'
		);
		$this->db->group_by('orc');
		$this->db->order_by('orc');
		$this->db->where('status', 'in');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function in_filter_by_line()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_in) AS tgl_in,po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
		);
		$this->db->group_by('lokasi');
		$this->db->order_by('lokasi');
		$this->db->where('status', 'in');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}
	public function out_filter_by_line()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_out) AS tgl_out,po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
		);
		$this->db->group_by('lokasi');
		$this->db->order_by('lokasi');
		$this->db->where('status', 'out');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function all_filter_by_line()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select(
			'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_in) AS tgl_in, DATE(tgl_out) AS tgl_out,po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
		);
		$this->db->group_by('lokasi');
		$this->db->order_by('lokasi');
		$rst = $this->db->get($this->table);

		return $rst->result();
	}

	public function get_count_cartons_all()
	{
		$this->db->select('count(carton_no) as count_cartons_all');
		$row = $this->db->get($this->table);

		return $row->row();
	}

	public function get_count_cartons_out()
	{
		$this->db->select('count(carton_no) as count_cartons_out');
		$this->db->where('status', 'out');
		$row = $this->db->get($this->table);

		return $row->row();
	}

	public function get_count_cartons_in()
	{
		$this->db->select('count(carton_no) as count_cartons_in');
		$this->db->where('status', 'in');
		$row = $this->db->get($this->table);

		return $row->row();
	}

	public function get_sum_pcs_all()
	{
		$this->db->select('sum(qty_box) as sum_pcs_all');
		$row = $this->db->get($this->table);

		return $row->row();
	}
	public function get_sum_pcs_out()
	{
		$this->db->select('sum(qty_box) as sum_pcs_out');
		$this->db->where('status', 'out');
		$row = $this->db->get($this->table);

		return $row->row();
	}
	public function get_sum_pcs_in()
	{
		$this->db->select('sum(qty_box) as sum_pcs_in');
		$this->db->where('status', 'in');
		$row = $this->db->get($this->table);

		return $row->row();
	}

	public function get_fg_by_line($line)
	{
		$this->db->where('lokasi', $line);
		$rst = $this->db->get($this->table);

		// print_r($rst->result());

		return $rst->result();
	}

	public function get_fg_by_line_out($line)
	{
		$this->db->where('lokasi', $line);
		$this->db->where('status', 'out');

		$rst = $this->db->get($this->table);

		// print_r($rst->result());

		return $rst->result();
	}

	public function get_fg_by_line_in($lokasi)
	{
		$this->db->where('lokasi', $lokasi);
		$this->db->where('status', 'in');

		$rst = $this->db->get($this->table);
		return $rst->result();
	}

	public function get_line_capacity()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('packing_preparation_line.id_line,
						   packing_preparation_line.line,
						   packing_preparation_line.max_box_capacity,
						   count(transfer_area.carton_no) AS jmlCarton, transfer_area.status AS status');
		$this->db->from('packing_preparation_line');
		$this->db->join('transfer_area', 'packing_preparation_line.line = transfer_area.lokasi', 'left');
		$this->db->group_by('packing_preparation_line.line');
		$this->db->order_by('packing_preparation_line.id_line');
		$rst = $this->db->get();

		return $rst->result();
		// return $this->db->last_query();
	}
	
	public function get_all_lines()
	{
		$this->db->select('id_line, line, max_box_capacity');
		$this->db->from('packing_preparation_line');
		$rst = $this->db->get();

		return $rst->result();
	}

	public function get_count_status_in()
	{
		$this->db->select('lokasi, COUNT(carton_no) AS jmlKarton');
		$this->db->group_by('lokasi');
		$this->db->where('status', 'in');

		$rst = $this->db->get($this->table);
		return $rst->result();
	}	
	
}

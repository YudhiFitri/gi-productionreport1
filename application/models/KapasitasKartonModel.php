<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class KapasitasKartonModel extends CI_Model{
    var $table = 'kapasitas_karton';

    public function get_by_style_size(){
        if(isset($_POST['dataPacking'])){
            $dataPacking = $_POST['dataPacking'];
            $style = $dataPacking['style'];
            $size = $dataPacking['size'];

            $sql = "SELECT * FROM kapasitas_karton WHERE '$style' LIKE CONCAT('%', style, '%') AND size='$size'";            

            // $this->db->like('style', $style, 'after');
            // $this->db->where('size', $size);
            // $r = $this->db->get($this->table);
            $r = $this->db->query($sql);

            return $r->row();
            // return $this->db->last_query();
        }
	}
	
	public function get_kapasitas_karton_by_style_distinct(){
		$this->db->distinct();
		$this->db->select('style');
		// $this->db->select('id_packing_karton, style');
		$result = $this->db->get($this->table);

		// var_dump($result->result());
		$data = array(
			'data' => $result->result()
		);
		// return $result->result();
		return $data;
	}

	public function get_kapasitas_karton_by_style(){
		if(isset($_POST['style'])){
			$style = $_POST['style'];
			$rst = $this->db->get_where($this->table, array('style' => $style));
			return $rst->result();
		}

	}

	public function get_by_style(){
		if(isset($_POST['dataStyle'])){
			$dataStyle = $_POST['dataStyle'];

			$style = $dataStyle['style'];
			$rst = $this->db->get_where($this->table, array('style' => $style));

			// print_r($rst->result());

			return $rst->result();
		}

		// $data = array(
		// 	'data' => $rst->result()
		// );

		// return $data;

	}

	public function update_kapasitas_karton(){
		if(isset($_POST['dataKapasitasKarton'])){
			$dataKapsitasKarton = $_POST['dataKapasitasKarton'];

			$id = $dataKapsitasKarton['id_packing_karton'];
			$style = $dataKapsitasKarton['style'];
			$size = $dataKapsitasKarton['size'];
			$kapasitas_karton = $dataKapsitasKarton['kapasitas_karton'];

			$data = array(
				'style' => $style,
				'size' => $size,
				'kapasitas_karton' => $kapasitas_karton
			);

			$this->db->update($this->table, $data, array('id_packing_karton' => $id));

			return $this->db->affected_rows();
		}
	}

	public function save_batch_kapasitas_karton(){
		if(isset($_POST['arrDataTable'])){
			$arrDataTable = $_POST['arrDataTable'];

			$this->db->insert_batch($this->table, $arrDataTable);
			return $this->db->affected_rows();
		}
	}

	public function save_kapasitas_karton(){
		if(isset($_POST['kapasitasKarton'])){
/* 			$kapasitasKarton = $_POST['kapasitasKarton'];
			$style = $kapasitasKarton['style'];
			$size = $kapasitasKarton['size'];
			$kapasitas_karton = $kapasitasKarton['kapasitas_karton'];
			$data = [
				"style" => $style,
				"size" => $size,
				"kapasitas_karton" => $kapasitas_karton
			];

			$this->db->insert($this->table, $data);

			return $this->db->affected_rows(); */
			
			$kapasitasKarton = $_POST['kapasitasKarton'];
			$data = [];
			foreach ($kapasitasKarton as $kk) {
				$dataForInsert = [
					'style' => $kk['style'],
					'size' => $kk['size'],
					'kapasitas_karton' => $kk['kapasitas_karton']
				];
				array_push($data, $dataForInsert);
			}
			$this->db->insert_batch($this->table, $data);
			
			return $this->db->affected_rows();			
		}
	}
}

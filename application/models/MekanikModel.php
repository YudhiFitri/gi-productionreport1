<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MekanikModel extends CI_Model
{
    public function get_machines_breakdown_repairing()
    {
        date_default_timezone_set('Asia/Jakarta');

        $userName = $this->session->userdata['username'];
        $this->db->where('line', $userName);
        $this->db->group_start();
        $this->db->or_where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        $rst = $this->db->get('machine_breakdown');

        // return $this->db->last_query();
        // return $rst->result();

        if ($rst->result() != null) {
            $arrDataReturn = array();
            foreach ($rst->result() as $r) {
                if ($r->status == "Waiting...") {
                    $startTime = new DateTime($r->start_waiting);
                } else {
                    $startTime = new DateTime($r->end_waiting);
                }
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "barcode_machine" => $r->barcode_machine,
                    "machine_brand" => $r->machine_brand,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }
            return $arrDataReturn;
        }
    }

    public function get_machine_by_barcode($code)
    {
        $db2 = $this->load->database('database2', true);

        $dataMekanik = $db2->get_where('barang', array('kode_barcode' => $code));

        return $dataMekanik->row();
    }

    public function add_machine_breakdown()
    {
        if (isset($_POST['dataBarcode'])) {
            // $this->load->helper('date');
            date_default_timezone_set('Asia/Jakarta');

            $dataBarcode = $_POST['dataBarcode'];

            $codeMesin = $dataBarcode['codeMesin'];
            $codeSympton = $dataBarcode['codeSympton'];
			
			//var_dump($codeSympton);

            $dataSympton = $this->db->get_where('masalah_mesin', array('barcode' => $codeSympton))->row();

            //var_dump($dataSympton);

            // if($codeMesin != "" && $codeSympton != ""){
            $db2 = $this->load->database('database2', true);
            $dataMesin = $db2->get_where('barang', array('kode_barcode' => $codeMesin))->row();
            $dataMerk = $db2->get_where('merk', array('id_merk' => $dataMesin->id_merk))->row();



            $dataMekanik = array(
                'line' => $this->session->userdata['username'],
                'tgl' => date('Y-m-d'),
                'barcode_machine' => $codeMesin,
                'machine_brand' => $dataMerk->name,
                'machine_type' => $dataMesin->kode_barang,
                'machine_sn' => $dataMesin->no_seri,
                'type' => $dataMesin->type,
                'barcode_sympton' => $codeSympton,
                'sympton' => $dataSympton->masalah_mesin,
                'status' => 'Waiting...',
                // 'start_waiting' => mdate("%H:%i:%s"),
                'start_waiting' => date('H:i:s'),
                'end_waiting' => "00:00:00"
            );


            $this->db->insert('machine_breakdown', $dataMekanik);
            // return $this->db->last_query();
            $id = $this->db->insert_id();

            return $id;
            // if($id > 0){
            //     $this->db->where('id_machine_breakdown',$id);
            //     $rst = $this->db->get('machine_breakdown');

            //     return $rst->row();
            // }

            // }
        }
    }

    public function check_machine_breakdown_by_barcode($code)
    {
        $line = $this->session->userdata('username');
        $arrWhere = array('barcode_machine' => $code, 'line' => $line, 'status' => 'Waiting...');
        $this->db->where($arrWhere);

        $result = $this->db->get("machine_breakdown");

        return $result->row();
    }

    public function get_mekanik_by_barcode($code)
    {
        $result = $this->db->get_where('mekanik_member', array('barcode' => $code));
        return $result->row();
    }

    public function add_mekanik_repairing()
    {
        if (isset($_POST['dataMekanikRepairing'])) {
            date_default_timezone_set('Asia/Jakarta');

            $dataMR = $_POST['dataMekanikRepairing'];
            $idMachineBreakdown = $dataMR['id_machine_breakdown'];
            $idMekanikMember = $dataMR['id_mekanik_member'];
            $barcode = $dataMR['barcode'];

            $line = $this->session->userdata('username');
            $data = array(
                'id_machine_breakdown' => $idMachineBreakdown,
                'id_mekanik_member' => $idMekanikMember,
                'tgl' => date('Y-m-d'),
                'line' => $line,
                'start_repairing' => date('H:i:s'),
                'end_repairing' => "00:00:00",
                'barcode' => $barcode,
                'status' => 'Repairing'
            );
            $this->db->insert('mekanik_repairing', $data);

            // return $this->db->last_query();

            $returnId = $this->db->insert_id();
            if ($returnId > 0) {
                $rst = $this->db->get_where('machine_breakdown', array('id_machine_breakdown' => $idMachineBreakdown));

                return $rst->row();
            }


            // return $this->db->insert_id();
        }
    }

    public function get_by_id_machine_breakdown($id)
    {
        $rst = $this->db->get_where('machine_breakdown', array('id_machine_breakdown' => $id));

        return $rst->row();
    }

    public function get_machine_repairing($code)
    {
        $line = $this->session->userdata('username');
        $where = array('barcode' => $code, 'line' => $line, 'end_repairing' => '00:00:00');

        $result = $this->db->get_where('mekanik_repairing', $where);

        return $result->row();
        // return $this->db->last_query();
    }

    public function get_machine_repairing1($code)
    {
        $result = $this->db->get_where('mekanik_repairing', array('barcode' => $code));

        return $result->row();
    }

    public function add_settled_machine()
    {
        if (isset($_POST['dataMachineState'])) {
            date_default_timezone_set("Asia/Jakarta");
            $dataMachineState = $_POST['dataMachineState'];

            $data = array(
                'id_mekanik_repairing' => $dataMachineState['id_mekanik_repairing'],
                'id_machine_breakdown' => $dataMachineState['id_machine_breakdown'],
                'id_mekanik_member' => $dataMachineState['id_mekanik_member'],
                'line' => $dataMachineState['line'],
                'spv_name' => $dataMachineState['spv_name'],
                'status' => $dataMachineState['status'],
                'date' => date('Y-m-d H:i:s'),
                'barcode_machine' => $dataMachineState['barcode_machine'],
            );
            $this->db->insert('machine_settled', $data);
            $id = $this->db->insert_id();

            // return $this->db->insert_id();
            return $id;
        }
    }

    public function count_all_machines()
    {
        $this->db->select('count(line) as countLine');
        $this->db->from('machine_breakdown');
        $this->db->where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');

        return $this->db->get()->row();
    }

    public function count_machines_breakdown()
    {
        $this->db->select('count(line) as countLine');
        $this->db->from('machine_breakdown');
        $this->db->where('status', 'Waiting...');
        return $this->db->get()->row();
        // return $this->db->last_query();
    }

    public function count_machines_repairing()
    {
        $this->db->select('count(line) as countLine');
        $this->db->from('machine_breakdown');
        $this->db->where('status', 'Repairing...');
        return $this->db->get()->row();
        // return $this->db->last_query();
    }

    public function list_machine_breakdown()
    {
        $rst = $this->db->get_where('viewmachinesbreakdown', array('status' => 'Waiting...'));
        return $rst->result();
    }

    public function get_viewmachinebreakdown_by_barcode($code)
    {
        $this->db->order_by('id_machine_breakdown', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get_where('viewmachinesbreakdown', array('barcode_machine' => $code));
        return $result->row();
    }

    public function list_machine_repairing()
    {
        $rst = $this->db->get_where('viewmachinesbreakdown', array('status' => 'Repairing...'));
        return $rst->result();
    }

    public function get_machines_1st_floor()
    {
        $this->db->select('count(line) as countLine');
        $this->db->where('floor', '1st Floor');
        $this->db->group_start();
        $this->db->or_where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();

        $rst = $this->db->get('viewmachinesbreakdown');

        return $rst->row();
    }

    public function get_machines_2nd_floor()
    {
        $this->db->select('count(line) as countLine');
        $this->db->where('floor', '2nd Floor');
        $this->db->group_start();
        $this->db->or_where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        $rst = $this->db->get('viewmachinesbreakdown');

        return $rst->row();
    }

    public function get_machines_3rd_floor()
    {
        $this->db->select('count(line) as countLine');
        $this->db->where('floor', '3rd Floor');
        $this->db->group_start();
        $this->db->or_where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        $rst = $this->db->get('viewmachinesbreakdown');

        return $rst->row();
    }

    public function get_machines_breakdown()
    {
        $rst = $this->db->get_where('viewmachinesbreakdown', array('status' => 'Waiting...'));

        return $rst->result();
    }

    public function add_settlement()
    {
        if (isset($_POST['dataForSettlement'])) {
            date_default_timezone_set('Asia/Jakarta');

            $dataSettlement = $_POST['dataForSettlement'];

            $idBreakdown = $dataSettlement['id_machine_breakdown'];
            $idRepairing = $dataSettlement['id_mekanik_repairing'];

            $barcodeSettlement = $dataSettlement['barcode_settlement'];
            switch ($barcodeSettlement) {
                case "D-001":
                    $settlementDate = date('Y-m-d', strtotime('+1 day'));
                    break;
                case "D-002":
                    $settlementDate = date('Y-m-d', strtotime('+2 days'));
                    break;
                case "D-003":
                    $settlementDate = date('Y-m-d', strtotime('+3 days'));
                    break;
                case "D-007":
                    $settlementDate = date('Y-m-d', strtotime('+7 days'));
                    break;
                case "D-014":
                    $settlementDate = date('Y-m-d', strtotime('+14 days'));
                    break;
            }

            $data = array(
                'id_machine_breakdown' => $idBreakdown,
                'id_mekanik_repairing' => $idRepairing,
                'settlement_date' => $settlementDate
            );

            $this->db->insert('machine_settlement', $data);

            // return $this->db->last_query();

            return $this->db->insert_id();
        }
    }

    // public function get_machines_settlement(){
    //     $result = $this->db->get('viewmachinesettlement');

    //     return $result->result();
    // }
    var $table = "viewmachinesettlement";

    var $column_order = array('id_settlement', 'machine_type', 'machine_brand', 'type', 'machine_sn', 'sympton', 'settlement_date');
    var $column_search = array('id_settlement', 'machine_type', 'machine_brand', 'type', 'machine_sn', 'sympton', 'settlement_date');
    var $order = array('id_settlement' => 'desc');

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

    public function check_machine_at_breakdown($code)
    {
        $this->db->order_by('id_machine_breakdown', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get_where('machine_breakdown', array('barcode_machine' => $code));

        return $result->row();
    }

    public function get_machine_breakdown($code)
    {
        $result = $this->db->get_where('machine_breakdown', array('barcode_machine' => $code));
        return $result->result();
    }

    public function update_mekanik_status($id)
    {
        $this->db->update('mekanik_repairing', array('status' => 'Not finish'), array('id_mekanik_repairing' => $id));

        return $this->db->affected_rows();
    }

    public function cancel_breakdown()
    {
        if (isset($_POST['dataCancellingBreakdown'])) {
            $dataCancel = $_POST['dataCancellingBreakdown'];
            $barcodeMesin = $dataCancel['barcode_machine'];
            $status = $dataCancel['status'];

            $where = array(
                'barcode_machine' => $barcodeMesin,
                'status' => $status
            );

            $this->db->update('machine_breakdown', array('status' => 'Canceled'), $where);

            return $this->db->affected_rows();
        }
    }

    public function get_mekanik_repairing_by_barcode($barcode)
    {
        $this->db->order_by('id_mekanik_repairing', 'DESC');
        $rst = $this->db->get_where('mekanik_repairing', array('barcode' => $barcode));

        return $rst->row();
    }

	public function get_machine_breakdown_by_status($status)
	{
		$this->db->where('status', $status);
		$rst = $this->db->get('machine_breakdown');

		return $rst->result();
	}

	public function get_machines_breakdown_or_repairing()
	{
		$this->db->from('viewmachinesbreakdown');
		$this->db->where('status', 'Waiting...');
		$this->db->or_where('status', 'Repairing...');
		$rst = $this->db->get();

		return $rst->result();
	}

	public function clear_machine_breakdown_or_repairing($id)
	{
		// $affRow = 0;
		$rst = $this->db->get_where('machine_breakdown', ['id_machine_breakdown' => $id])->row();

		if ($rst->status == 'Waiting...') {
			$affRow = $this->_deleteMachineBreakdown($id);
		} else if ($rst->status == 'Repairing...') {
			$this->db->delete('mekanik_repairing', ['id_machine_breakdown' => $id]);
			$rows = $this->db->affected_rows();
			if ($rows > 0) {
				$affRow = $this->_deleteMachineBreakdown($id);
			}
		}

		return $affRow;
	}

	private function _deleteMachineBreakdown($id)
	{
		$this->db->delete('machine_breakdown', ['id_machine_breakdown' => $id]);
		return $this->db->affected_rows();
	}    
}

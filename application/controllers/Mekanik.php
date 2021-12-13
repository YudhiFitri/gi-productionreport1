<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mekanik extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MekanikModel');
        $this->load->model('ViewMachinesBreakdownModel');
        $this->load->model('SpvModel');
        $this->load->model('DeviceIdsModel');
    }

    public function index(){
        // $rst['data'] = $this->MekanikModel->add_machine_breakdown();
        $this->load->view('mekanik/calling_mekanik_view');
    }

    public function ajax_get_machines_breakdown_repairing(){
        $rst = $this->MekanikModel->get_machines_breakdown_repairing();

        echo json_encode($rst);
    }

    public function ajax_get_machine_by_barcode($code){
        $rst = $this->MekanikModel->get_machine_by_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_add_machine_breakdown(){
        $rst = $this->MekanikModel->add_machine_breakdown();

        echo json_encode($rst);
    }

    public function ajax_check_machine_breakdown_by_barcode($barcode){
        $rst = $this->MekanikModel->check_machine_breakdown_by_barcode($barcode);

        echo json_encode($rst);
    }

    public function ajax_get_mekanik_by_barcode($code){
        $rst = $this->MekanikModel->get_mekanik_by_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_add_mekanik_repairing(){
        $rst = $this->MekanikModel->add_mekanik_repairing();

        echo json_encode($rst);
    }

    public function show_machine_breakdown_repairing(){
        $this->load->view('mekanik/show_machines_breakdown_repairing_view');
    }

    public function show_machine_breakdown_repairing_1st(){
        $this->load->view('mekanik/show_machines_breakdown_repairing_1st_view');
    }
    
    public function show_machine_breakdown_repairing_2nd(){
        $this->load->view('mekanik/show_machines_breakdown_repairing_2nd_view');
    }

    public function show_machine_breakdown_repairing_3rd(){
        $this->load->view('mekanik/show_machines_breakdown_repairing_3rd_view');
    }

    public function ajax_get_all_machines(){
        $result = $this->ViewMachinesBreakdownModel->get_all();

        echo json_encode($result);
    }

    public function ajax_get_by_id_machine_breakdown($id){
        $result = $this->MekanikModel->get_by_id_machine_breakdown($id);

        echo json_encode($result);
    }

    public function ajax_get_machine_repairing($code){
        $rst = $this->MekanikModel->get_machine_repairing($code);

        echo json_encode($rst);
    }

    public function ajax_get_machine_repairing1($code){
        $rst = $this->MekanikModel->get_machine_repairing1($code);

        echo json_encode($rst);
    }

    public function ajax_add_settled_machine(){
        $rst = $this->MekanikModel->add_settled_machine();

        echo json_encode($rst);
    }

    public function ajax_get_spv_by_barcode($code){
        $rst = $this->SpvModel->get_spv_by_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_add_machine_settled(){
        $rst = $this->MekanikModel->add_settled_machine();

        echo json_encode($rst);
    }

    public function ajax_get_1stfloor_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_1stfloor_data();

        echo json_encode($rst);
    }

    public function ajax_get_2ndfloor_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_2ndfloor_data();

        echo json_encode($rst);
    }
    
    public function ajax_get_3rdfloor_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_3rdfloor_data();

        echo json_encode($rst);
    }    

    public function ajax_count_machines_breakdown(){
        $rst = $this->MekanikModel->count_machines_breakdown();

        echo json_encode($rst);
    }

    public function ajax_count_all_machines(){
        $rst = $this->MekanikModel->count_all_machines();

        echo json_encode($rst);
    }    
    
    public function ajax_count_machines_repairing(){
        $rst = $this->MekanikModel->count_machines_repairing();

        echo json_encode($rst);
    }
    
    public function ajax_list_machine_breakdown(){
        $rst = $this->MekanikModel->list_machine_breakdown();
        echo json_encode($rst);
    }

    public function ajax_list_machine_repairing(){
        $rst = $this->MekanikModel->list_machine_repairing();
        echo json_encode($rst);
    }

    public function ajax_get_machines_1st_floor(){
        $rst = $this->MekanikModel->get_machines_1st_floor();

        echo json_encode($rst);
    }

    public function ajax_get_machines_2nd_floor(){
        $rst = $this->MekanikModel->get_machines_2nd_floor();

        echo json_encode($rst);
    }
    
    public function ajax_get_machines_3rd_floor(){
        $rst = $this->MekanikModel->get_machines_3rd_floor();

        echo json_encode($rst);
    }    

    public function show_machine_breakdown(){
        $this->load->view('mekanik/machine_breakdown_view');
    }
    
    public function ajax_get_machines_breakdown(){
        $rst = $this->MekanikModel->get_machines_breakdown();

        echo json_encode($rst);
    }

    public function ajax_add_settlement(){
        $rst = $this->MekanikModel->add_settlement();

        echo json_encode($rst);
    }

    public function show_machine_settlement(){
        $this->load->view('mekanik/machine_settlement_view');
    }

    // public function ajax_get_machines_settlement(){
    //     $rst = $this->MekanikModel->get_machines_settlement();

    //     echo json_encode($rst);
    // }

    public function ajax_machine_settlement_list(){
        $list = $this->MekanikModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_settlement;
            $row[] = $k->machine_type;
            $row[] = $k->machine_brand;
            $row[] = $k->type;
            $row[] = $k->machine_sn;
            $row[] = $k->sympton;
            $row[] = date('d-m-Y', strtotime($k->settlement_date));

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->MekanikModel->count_all(),
            "recordsFiltered" => $this->MekanikModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    } 
    
    public function show_machines_repairing(){
        $this->load->view('mekanik/show_machines_repairing_view');
    }

    public function ajax_get_all_machines_repairing(){
        $rst = $this->ViewMachinesBreakdownModel->get_all_machines_repairing();

        echo json_encode($rst);
    }

    public function ajax_get_all_machines_waiting(){
        $rst = $this->ViewMachinesBreakdownModel->get_all_machines_waiting();

        echo json_encode($rst);
    }
    
    public function ajax_get_1stfloor_repairing_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_1stfloor_repairing_data();

        echo json_encode($rst);
    }

    public function ajax_get_1stfloor_waiting_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_1stfloor_waiting_data();

        echo json_encode($rst);
    }    

    public function ajax_get_2ndfloor_repairing_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_2ndfloor_repairing_data();

        echo json_encode($rst);
    }

    public function ajax_get_2ndfloor_waiting_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_2ndfloor_waiting_data();

        echo json_encode($rst);
    }    
    
    public function ajax_get_3rdfloor_repairing_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_3rdfloor_repairing_data();

        echo json_encode($rst);
    }
    
    public function ajax_get_3rdfloor_waiting_data(){
        $rst = $this->ViewMachinesBreakdownModel->get_3rdfloor_waiting_data();

        echo json_encode($rst);
    }
    
    public function ajax_calling_mechanic_3rdFloor(){
        $this->load->view('mekanik/show_calling_mechanic_3rdFloor_view');
    }

    public function ajax_calling_mechanic_2ndFloor(){
        $this->load->view('mekanik/show_calling_mechanic_2ndFloor_view');
    }
    
    public function ajax_calling_mechanic_1stFloor(){
        $this->load->view('mekanik/show_calling_mechanic_1stFloor_view');
    }

    public function ajax_check_machine_at_breakdown($code){
        $rst = $this->MekanikModel->check_machine_at_breakdown($code);

        echo json_encode($rst);
    }

    public function ajax_get_viewmachinebreakdown_by_barcode($code){
        $rst = $this->MekanikModel->get_viewmachinebreakdown_by_barcode($code);

        echo json_encode($rst);
    }

    public function ajax_get_machine_breakdown($code){
        $rst = $this->MekanikModel->get_machine_breakdown($code);

        echo json_encode($rst);
    }

    public function ajax_update_mekanik_status($idMekanik){
		$rst = $this->MekanikModel->update_mekanik_status($idMekanik);

		echo json_encode($rst);
	}

	public function ajax_cancel_breakdown(){
		$rst = $this->MekanikModel->cancel_breakdown();

		echo json_encode($rst);
	}

	public function ajax_get_mekanik_repairing_by_barcode($barcode){
		$rst = $this->MekanikModel->get_mekanik_repairing_by_barcode($barcode);

		echo json_encode($rst);
    }
    
	public function sendNotification()
	{
		if (isset($_POST['dataNotif'])) {
			$title = $_POST['dataNotif']['title'];
			$id = $_POST['dataNotif']['id'];
			$rst = $this->MekanikModel->get_by_id_machine_breakdown($id);

			$line = $rst->line;
			$brandMachine = $rst->machine_brand;
			$typeMachine = $rst->machine_type;
			$snMachine = $rst->machine_sn;
			$symptom = $rst->sympton;

			$message = "New Machine Breakdown available";

			// $message = "LINE->" . $rst->line . '\n' .
			// 	"Merk Mesin->" . $rst->machine_brand . '\n' .
			// 	"Tipe Mesin->" . $rst->machine_type . '\n' .
			// 	"Mesin SN--->" . $rst->machine_sn . '\n' .
			// 	"Symtomp---->" . $rst->sympton .'\n';
			// // $token = $this->DeviceIdsModel->getToken();
			$tokens = $this->DeviceIdsModel->getAllTokens();

			$regIds = [];
			foreach ($tokens as $t) {
				array_push($regIds, $t['token']);
				// print_r($t['token']);
			}

			// echo print_r($regIds);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => '{
				"registration_ids": ' . json_encode($regIds) . ',
				"notification": {
					"title": "' . $title . " - " . $line .'",
					"body": "' . $message . '"
				},
				"data": {
					"Line": "' . $line . '",
					"Machine Brand": "' . $brandMachine . '",
					"Machine Type": "' . $typeMachine . '",
					"Machine SN": "' . $snMachine . '",
					"Symptom": "' . $symptom . '"
				} 
			}',
				CURLOPT_HTTPHEADER => array(
					'Authorization: key=AAAA8o0O1Wg:APA91bFVnYzfYuZ3OWu8uxrVoFW7Rk2SH7SDO5FnjhRpYFWex56uXPuk9E1SIA_iy3fnbTmh2kYk15jnon7kHcy6uMSjzlK1gbkx2PNUbkFe9yIepuMtDsqQxhEZvxH69lq-HRi-2x7t',
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}
    }    
    
	public function clearingMachinesBreakdown()
	{
		$this->load->view('mekanik/clearing_machines_breakdown_view');
	}

	public function ajax_get_machines_breakdown_or_repairing()
	{
		$rst['data'] = $this->MekanikModel->get_machines_breakdown_or_repairing();

		echo json_encode($rst);
	}

	public function ajax_clear_machine_breakdown_or_repairing($id)
	{
		$rst = $this->MekanikModel->clear_machine_breakdown_or_repairing($id);

		echo json_encode($rst);
	}    

}
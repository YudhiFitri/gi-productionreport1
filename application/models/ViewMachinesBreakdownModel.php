<?php
defined('BASEPATH') or exit('Direct script access not allowed!');

class ViewMachinesBreakdownModel extends CI_Model{

    var $view = "viewmachinesbreakdown";

    public function get_all(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                if($r->status == "Waiting..."){
                    $startTime = new DateTime($r->start_waiting);
                }else if($r->status == "Repairing..."){
                    $startTime = new DateTime($r->end_waiting);                    
                }
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "type" => $r->type,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }

        // return $result->result();
    }

    public function get_all_machines_repairing(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->or_where('status', 'Repairing...');
        $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->end_waiting);                
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);
                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "type" => $r->type,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );
                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }

        // return $result->result();
    }

    public function get_all_machines_waiting(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->or_where('status', 'Waiting...');
        $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->start_waiting);
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "type" => $r->type,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }

        // return $result->result();
    }    

    public function get_1stfloor_data(){
        date_default_timezone_set('Asia/Jakarta');
	   
        // $timeNow = date('H:i:s');
        // if($timeNow >= date("H:i:s", strtotime('07:00:00')) && $timeNow <= date("H:i:s", strtotime('14:30:00'))){
        //      $shift = 1;
        // }else if($timeNow >= date("H:i:s",strtotime("14:31:00")) && $timeNow <= date("H:i:s",strtotime("22:15:00"))){
        //      $shift = 2;
        // }

        $this->db->where('floor', '1st Floor');
        // $this->db->where('shift', $shift);
        $this->db->group_start();
        $this->db->where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                if($r->status == "Waiting..."){
                    $startTime = new DateTime($r->start_waiting);
                }else if($r->status == "Repairing..."){
                    $startTime = new DateTime($r->end_waiting);                    
                }
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );
                // print_r($data);

                array_push($arrDataReturn, $data);
            }
            // print_r($arrDataReturn);

            return $arrDataReturn;
        }        

        // $result = $this->db->get($this->view);

        // return $this->db->last_query();
        // return $result->result();
    }

    public function get_1stfloor_repairing_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '1st Floor');
        $this->db->where('status', 'Repairing...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->end_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }

    public function get_1stfloor_waiting_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '1st Floor');
        $this->db->where('status', 'Waiting...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->start_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }

    public function get_2ndfloor_data(){
        date_default_timezone_set('Asia/Jakarta');

	    // $timeNow = date('H:i:s');
	    // if($timeNow >= date("H:i:s", strtotime('07:00:00')) && $timeNow <= date("H:i:s", strtotime('14:30:00'))){
		//     $shift = 1;
	    // }else if($timeNow >= date("H:i:s",strtotime("14:31:00")) && $timeNow <= date("H:i:s",strtotime("22:15:00"))){
		//     $shift = 2;
		// }        

        $this->db->distinct();
        $this->db->where('floor', '2nd Floor');
	    // $this->db->where('shift', $shift);
        $this->db->group_start();
        $this->db->where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                if($r->status == "Waiting..."){
                    $startTime = new DateTime($r->start_waiting);
                }else if($r->status == "Repairing..."){
                    $startTime = new DateTime($r->end_waiting);                    
                }
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }
    }
    
    public function get_2ndfloor_repairing_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '2nd Floor');
        $this->db->where('status', 'Repairing...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->end_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }
    
    public function get_2ndfloor_waiting_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '2nd Floor');
        $this->db->where('status', 'Waiting...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->start_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }    

    public function get_3rdfloor_data(){
        date_default_timezone_set('Asia/Jakarta');

        // $timeNow = date('H:i:s');
        // if($timeNow >= date("H:i:s", strtotime('07:00:00')) && $timeNow <= date("H:i:s", strtotime('14:30:00'))){
        //      $shift = 1;
        // }else if($timeNow >= date("H:i:s",strtotime("14:31:00")) && $timeNow <= date("H:i:s",strtotime("22:15:00"))){
        //      $shift = 2;
        //  }        

        $this->db->where('floor', '3rd Floor');
        // $this->db->where('shift', $shift);
        $this->db->group_start();
        $this->db->where('status', 'Waiting...');
        $this->db->or_where('status', 'Repairing...');
        $this->db->group_end();
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                if($r->status == "Waiting..."){
                    $startTime = new DateTime($r->start_waiting);
                }else if($r->status == "Repairing..."){
                    $startTime = new DateTime($r->end_waiting);                    
                }
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }
    }
    
    public function get_3rdfloor_repairing_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '3rd Floor');
        $this->db->where('status', 'Repairing...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->end_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }
    
    public function get_3rdfloor_waiting_data(){
        date_default_timezone_set('Asia/Jakarta');

        $this->db->where('floor', '3rd Floor');
        $this->db->where('status', 'Waiting...');
        // $this->db->order_by('floor', 'asc');
        $result = $this->db->get($this->view);
        if($result->result() != null){
            $arrDataReturn = array();
            foreach($result->result() as $r){
                $startTime = new DateTime($r->start_waiting);                    
                $endTime = new DateTime();
                $duration = $startTime->diff($endTime);

                $data = array(
                    "id_machine_breakdown" => $r->id_machine_breakdown,
                    "machine_brand" => $r->machine_brand,
                    "line" => $r->line,
                    "tgl" => $r->tgl_breakdown,
                    "machine_type" => $r->machine_type,
                    "machine_sn" => $r->machine_sn,
                    "type" => $r->type,
                    "floor" => $r->floor,
                    "sympton" => $r->sympton,
                    "status" => $r->status,
                    "start_waiting" => $r->start_waiting,
                    "inisial" => $r->mekanik_inisial,
                    "duration" => $duration->format("%H:%I:%S")
                );

                array_push($arrDataReturn, $data);
            }

            return $arrDataReturn;
        }        
    }    
}
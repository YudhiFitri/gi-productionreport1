<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputMoldingModel extends CI_Model{
    var $table="output_molding";
    
    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_output_molding',$id);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function save()
    {
        if(isset($_POST['dataStr'])){
            date_default_timezone_set('Asia/Jakarta');
            $dataStr = $_POST['dataStr'];
            $data = array(
                'shift' => $dataStr['shift'],
                'no_mesin' => $dataStr['no_mesin'],
                'tgl' => date('Y-m-d H:i:s'),
                'orc' => $dataStr['orc'],
                'style' => $dataStr['style'],
                'color' => $dataStr['color']
            );

            $this->db->insert($this->table, $data);

            return $this->db->insert_id();
        }
    }     
}
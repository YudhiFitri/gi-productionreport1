<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputCuttingModel extends CI_Model{
    public function comparing_inputcutting_inputsewing($orc){
        // $rstInputCutting = $this->db->get_where('input_cutting', array('orc' => $orc));

        // $rstInputSewing = $this->db->get_where('input_sewing', array('orc' => $orc));

        // $data = array(
        //     'inputCutting' => $rstInputCutting->result(),
        //     'inputSewing' => $rstInputSewing->result()
        // );

        // return $data;

        // $query = "SELECT A.orc, A.style, A.size, A.no_bundle, A.kode_barcode FROM input_cutting A" .
        // " LEFT OUTER JOIN input_sewing B ON A.orc = B.orc" .
        // " WHERE A.orc = '" . $orc ."'" . 
        // " AND B.orc is null ORDER BY A.orc, A.no_bundle";

        $this->db->select("A.orc, A.style, A.size, A.no_bundle, A.kode_barcode");
        $this->db->from("input_cutting A");
        // $this->db->join("input_sewing B ", "A.orc = B.orc", "left outer");
        $this->db->join("input_sewing B", "A.kode_barcode = B.kode_barcode", "left outer");
        $this->db->where("A.orc", $orc);
        $this->db->where("B.orc is null");
        $this->db->order_by("A.orc, A.no_bundle");


        // $this->db->query($query);
        $result = $this->db->get();
        $data = array(
            'count' => $result->num_rows(),
            'rows' => $result->result()
        );

        return $data;
        // return $this->db->last_query();

    }
}
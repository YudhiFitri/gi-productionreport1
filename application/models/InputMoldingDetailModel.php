<?php
defined('BASEPATH') or exit('No direct access script allowed');

class InputMoldingDetailModel extends CI_Model
{
    var $table = "input_molding_detail";

    public function check_outermold_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('outermold_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function check_midmold_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('midmold_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function check_linningmold_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('linningmold_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function save_outer_mold()
    {
        if (isset($_POST['dataOuterMold'])) {
            $dataOM = $_POST['dataOuterMold'];

            $data = array(
                'id_input_molding' => $dataOM['id_input_molding'],
                'no_bundle' => $dataOM['no_bundle'],
                'size' => $dataOM['size'],
                'group_size' => $dataOM['group_size'],
                'qty_pcs' => $dataOM['qty_pcs'],
                'outermold_sam' => $dataOM['outermold_sam'],
                'outermold_barcode' => $dataOM['outermold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function save_mold1($data)
    {

        $this->db->insert($this->table, $data);

        return $this->db->affected_rows();
    }

    public function update_outer_mold()
    {
        if (isset($_POST['dataOuterMold'])) {
            $dataOM = $_POST['dataOuterMold'];

            $id = $dataOM['id_input_molding'];
            $noBundle = $dataOM['no_bundle'];

            $data = array(
                'outermold_sam' => $dataOM['outermold_sam'],
                'outermold_barcode' => $dataOM['outermold_barcode']
            );

            // $this->db->insert($this->table, $data);
            $this->db->where("id_input_molding", $id);
            $this->db->where("no_bundle", $noBundle);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function update_mold1($dt)
    {
        $id = $dt['id_input_molding'];
        $noBundle = $dt['no_bundle'];

        if($dt['outermold_barcode']  != null){
            $data = array(
                'outermold_sam' => $dt['outermold_sam'],
                'outermold_barcode' => $dt['outermold_barcode']
            );
        }else if($dt['midmold_barcode'] != null){
            $data = array(
                'mildmold_sam' => $dt['mildmold_sam'],
                'midmold_barcode' => $dt['midmold_barcode']
            );
        }else if($dt['linningmold_barcode'] != null){
            $data = array(
                'linningmold_sam' => $dt['linningmold_sam'],
                'linningmold_barcode' => $dt['linningmold_barcode']
            );            
        }

        // $this->db->insert($this->table, $data);
        $this->db->where("id_input_molding", $id);
        $this->db->where("no_bundle", $noBundle);
        $this->db->update($this->table, $data);

        // return $this->db->last_query();
        // print_r($this->db->last_query());

        return $this->db->affected_rows();
    }

    public function update_mid_mold()
    {
        if (isset($_POST['dataMidMold'])) {
            $dataMid = $_POST['dataMidMold'];

            $id = $dataMid['id_input_molding'];
            $noBundle = $dataMid['no_bundle'];

            $data = array(
                'mildmold_sam' => $dataMid['mildmold_sam'],
                'midmold_barcode' => $dataMid['midmold_barcode']
            );

            // $this->db->insert($this->table, $data);
            $this->db->where("id_input_molding", $id);
            $this->db->where("no_bundle", $noBundle);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function update_linning_mold()
    {
        if (isset($_POST['dataLinningMold'])) {
            $dataL = $_POST['dataLinningMold'];

            $id = $dataL['id_input_molding'];
            $noBundle = $dataL['no_bundle'];

            $data = array(
                'linningmold_sam' => $dataL['linningmold_sam'],
                'linningmold_barcode' => $dataL['linningmold_barcode']
            );

            // $this->db->insert($this->table, $data);
            $this->db->where("id_input_molding", $id);
            $this->db->where("no_bundle", $noBundle);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function save_mid_mold()
    {
        if (isset($_POST['dataMidMold'])) {
            $dataMM = $_POST['dataMidMold'];

            $data = array(
                'id_input_molding' => $dataMM['id_input_molding'],
                'no_bundle' => $dataMM['no_bundle'],
                'size' => $dataMM['size'],
                'group_size' => $dataMM['group_size'],
                'qty_pcs' => $dataMM['qty_pcs'],
                'mildmold_sam' => $dataMM['midmold_sam'],
                'midmold_barcode' => $dataMM['midmold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function save_linning_mold()
    {
        if (isset($_POST['dataLinningMold'])) {
            $dataLM = $_POST['dataLinningMold'];

            $data = array(
                'id_input_molding' => $dataLM['id_input_molding'],
                'no_bundle' => $dataLM['no_bundle'],
                'size' => $dataLM['size'],
                'group_size' => $dataLM['group_size'],
                'qty_pcs' => $dataLM['qty_pcs'],
                'linningmold_sam' => $dataLM['linningmold_sam'],
                'linningmold_barcode' => $dataLM['linningmold_barcode']
            );

            $this->db->insert($this->table, $data);

            return $this->db->affected_rows();
        }
    }

    public function get_by_outermold_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function check_barcode_mold($barcode){
        $prefix = substr($barcode,0,1);

        $rst = $this->db->get_where($this->table, array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $barcode));
        // return $this->db->last_query();
        return $rst->num_rows();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputMoldingModel extends CI_Model
{
    var $table = "input_molding";
    var $column_order = array('id_input_molding', 'tgl', 'orc', 'style', 'color', 'no_bundle', 'size', 'qty_pcs', 'outer_mold', 'mid_mold', 'linning_mold');
    var $column_search = array('id_input_molding', 'tgl', 'orc', 'style', 'color', 'no_bundle', 'size', 'qty_pcs', 'outer_mold', 'mid_mold', 'linning_mold');
    var $order = array('id_input_molding' => 'asc');

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
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_input_molding', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save()
    {
        // $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];
            $data = array(
                'tgl' => date('Y-m-d'),
                'orc' => $dataStr['orc'],
                'style' => $dataStr['style'],
                'color' => $dataStr['color']
            );

            $this->db->insert($this->table, $data);

            return $this->db->insert_id();
        }
    }

    public function save1($d)
    {
        $data = array(
            'tgl' => date('Y-m-d'),
            'orc' => $d->orc,
            'style' => $d->style,
            'color' => $d->color
        );

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }



    public function get_by_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->row();
    }

    public function cek_by_orc($orc)
    {
        $rst = $this->db->get_where($this->table, array('orc' => $orc));

        return $rst->num_rows();
    }

    public function get_by_orc($orc)
    {
        $rst = $this->db->get_where($this->table, array('orc' => $orc));

        return $rst->row();
    }

    public function saveOuter($code)
    {
        //1. check at
    }
}

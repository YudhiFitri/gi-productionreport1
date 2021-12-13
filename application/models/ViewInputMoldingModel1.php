<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewInputMoldingModel1 extends CI_Model
{
    var $table = "viewinputmolding1";
    var $column_order = array(
        'id_input_molding',
        'tgl',
        'orc',
        'style',
        'color',
        'size',
        'no_bundle',
        'qty_pcs',
        'outer',
        'mid',
        'linning'

    );
    var $column_search = array(
        'id_input_molding',
        'tgl',
        'orc',
        'style',
        'color',
        'size',
        'no_bundle',
        'qty_pcs',
        'outer',
        'mid',
        'linning'
    );
    var $order = array('id_input_molding' => 'desc');

    public function get_all()
    {
        $rst = $this->db->get($this->table);

        return $rst->result();
    }

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

    public function get_by_barcode($barcode)
    {
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        return $rst->row();
    }

    public function get_by_outermold_barcode($code)
    {
        // $rst = $this->db->get_where($this->table, array('outer' => $code));
        $this->db->like('outer', $code);
        $rst = $this->db->get($this->table);

        return $rst->row();
        // return $this->db->last_query();
    }

    public function get_by_midmold_barcode($code)
    {
        $rst = $this->db->get_where($this->table, array('mid' => $code));

        return $rst->row();
    }

    public function get_by_linningmold_barcode($code)
    {
        $rst = $this->db->get_where($this->table, array('linning' => $code));

        return $rst->row();
    }

    public function get_by_orc_nobundle($data)
    {
        // $rst = $this->db->get_where($this->table, array("orc" => $orc));
            // $dataStr = $_POST['dataStr'];
            $orc = $data['orc'];
            $noBundle = $data['no_bundle'];

            $this->db->where('orc', $orc);
            $this->db->where('no_bundle', $noBundle);
            $rst = $this->db->get($this->table);

            return $rst->row();
    }

    public function get_by_orc_nobundle1($data)
    {
        // $rst = $this->db->get_where($this->table, array("orc" => $orc));
            $orc = $data->orc;
            $noBundle = $data->no_bundle;

            $this->db->where('orc', $orc);
            $this->db->where('no_bundle', $noBundle);
            $rst = $this->db->get($this->table);

            return $rst->row();
    }    

    public function cek_by_orc_nobundle()
    {
        if (isset($_POST['dataStr'])) {
            $dataSearch = $_POST['dataStr'];

            $this->db->where('orc', $dataSearch['orc']);
            $this->db->where('no_bundle', $dataSearch['no_bundle']);
            $rst = $this->db->get($this->table);

            return $rst->num_rows();
            // return $this->db->last_query();

        }
    }

    public function cek_by_orc_nobundle1($orc, $noBundle)
    {

        $this->db->where('orc', $orc);
        $this->db->where('no_bundle', $noBundle);
        $rst = $this->db->get($this->table);

        return $rst->num_rows();
        // return $this->db->last_query();
    }
}

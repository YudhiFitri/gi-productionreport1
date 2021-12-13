<?php
defined('BASEPATH') or exit('no direct script access allowed!');
class ViewOutputSewingModel extends CI_Model
{
    var $table = "viewoutputsewing";


    var $column_order = array(
        'id_output_sewing_detail',
        'orc',
        'no_bundle',
        'center_panel',
        'back_wings',
        'cups',
        'assembly',
        'qty'
    );
    var $column_search = array(
        'id_output_sewing_detail',
        'orc',
        'no_bundle',
        'center_panel',
        'back_wings',
        'cups',
        'assembly',
        'qty'
    );
    var $order = array('id_output_sewing_detail' => 'desc');

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

    function get_datatables_wip_global()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_wip_orc($orc)
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $this->db->where('orc', $orc);
        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $this->db->where('line', $this->session->userdata['username']);
        // $this->db->where('tgl', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->where('line', $this->session->userdata['username']);
        // $this->db->where('tgl', date('Y-m-d'));        
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_wip_global()
    {
        $this->db->from($this->table);
        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_wip_orc($orc)
    {
        $this->db->from($this->table);
        $this->db->where('orc', $orc);
        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');

        $query = $this->db->get();
        return $query->num_rows();
    }    

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->where('line', $this->session->userdata['username']);
        // $this->db->where('tgl', date('Y-m-d'));        
        return $this->db->count_all_results();
    }

    public function count_all_wip_global()
    {
        $this->db->from($this->table);
        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');
        return $this->db->count_all_results();
    }

    public function count_all_wip_orc($orc)
    {
        $this->db->from($this->table);
        $this->db->where('orc', $orc);
        $this->db->where('line', $this->session->userdata['username']);
        $this->db->where('assembly', '00:00:00');
        return $this->db->count_all_results();
    }    

    public function get_by_line_date_now()
    {
        if (isset($_POST['dataOrcBundle'])) {
            $dataOrcBundle = $_POST['dataOrcBundle'];

            $this->db->where('line', $this->session->userdata('username'));
            $this->db->where('orc', $dataOrcBundle['orc']);
            $this->db->where('no_bundle', $dataOrcBundle['no_bundle']);

            $rst = $this->db->get($this->table);

            return $rst->row();
        }

        // if(isset($_GET['no_bundle'])){
        //     $noBundle = $_GET['no_bundle'];
        //     $userName = $this->session->userdata('username');
        //     $dateNow = date('Y-m-d');

        //     $this->db->where('line', $userName);
        //     $this->db->where('tgl', $dateNow);
        //     $this->db->where('no_bundle', $noBundle);

        //     $rst = $this->db->get($this->table);

        //     return $rst->row();
        // };
    }

    public function get_by_line_date_now1()
    {
        $userName = $this->session->userdata('username');
        $dateNow = date('Y-m-d');

        $this->db->where('line', $userName);
        $this->db->where('tgl', $dateNow);

        $rst = $this->db->get($this->table);

        return $rst->row();
    }

    public function get_by_line_date_now2()
    {
        $userName = $this->session->userdata('username');

        $dateNow = date('Y-m-d');

        $this->db->where('line', $userName);
        $this->db->where('tgl', $dateNow);

        $rst = $this->db->get($this->table);

        return $rst->result();
    }

    public function get_last_record()
    {
        $this->db->where('line', $this->session->userdata('username'));
        $this->db->where('tgl', date('Y-m-d'));
        $this->db->order_by('id_output_sewing_detail', 'desc')->limit(1);
        $rst = $this->db->get($this->table);

        return $rst->row();
    }

    public function get_by_barcode($code)
    {
        $rst = $this->db->get_where($this->table, array('kode_barcode' => $code));

        return $rst->row();
    }

    public function get_by_assembly_not_scanned1($line, $orc)
    {
        $this->db->where('line', $line);
        $this->db->where('assembly', '00:00:00');
        $this->db->where('orc', $orc);

        $result = $this->db->get($this->table);
        $data = array($result->result());
        return $data;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class SamModel extends CI_Model
{
    var $table = "master_sam";

    var $column_order = array('id_master_sam', 'style', 'color', 'grup_size');
    var $column_search = array('id_master_sam', 'style', 'color', 'grup_size');
    var $order = array('id_master_sam' => 'asc');

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
        $this->db->where('id_packing', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save()
    {
        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];
            $data = array(
                'style' => $dataStr['style'],
                'color' => $dataStr['color'],
                'grup_size' => $dataStr['grup_size'],
                'sam_cutting' => $dataStr['sam_cutting'],
                'linning_sam' => $dataStr['linning_sam'],
                'mid_sam' => $dataStr['mid_sam'],
                'outer_sam' => $dataStr['outer_sam'],
                'total_mold_sam' => $dataStr['total_mold_sam'],
                'center_panel_sam' => $dataStr['center_panel_sam'],
                'back_wings_sam' => $dataStr['back_wings_sam'],
                'cups_sam' => $dataStr['cups_sam'],
                'assembly_sam' => $dataStr['assembly_sam'],
                'total_sewing_sam' => $dataStr['total_sewing_sam'],
                'packing_sam' => $dataStr['packing_sam'],
            );

            $this->db->insert($this->table, $data);

            return $this->db->insert_id();
        }
    }

    public function update()
    {
        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];
            $id = $dataStr['idSAM'];
            $data = array(
                'style' => $dataStr['style'],
                'color' => $dataStr['color'],
                'grup_size' => $dataStr['grup_size'],
                'sam_cutting' => $dataStr['sam_cutting'],
                'linning_sam' => $dataStr['linning_sam'],
                'mid_sam' => $dataStr['mid_sam'],
                'outer_sam' => $dataStr['outer_sam'],
                'total_mold_sam' => $dataStr['total_mold_sam'],
                'center_panel_sam' => $dataStr['center_panel_sam'],
                'back_wings_sam' => $dataStr['back_wings_sam'],
                'cups_sam' => $dataStr['cups_sam'],
                'assembly_sam' => $dataStr['assembly_sam'],
                'total_sewing_sam' => $dataStr['total_sewing_sam'],
                'packing_sam' => $dataStr['packing_sam'],
            );
            $this->db->where('id_master_sam',$id);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        }
    }    

    public function get_cutting_sam()
    {
        if (isset($_POST['dataForCuttingSAM'])) {
            $dataCuttingSAM = $_POST['dataForCuttingSAM'];
            $style = $dataCuttingSAM['style'];
            $color = $dataCuttingSAM['color'];
            $grup_size = $dataCuttingSAM['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            // $result = $this->db->get($this->table);
            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_sewing_sam()
    {
        if (isset($_POST['dataForSewingSAM'])) {
            $dataCuttingSAM = $_POST['dataForSewingSAM'];
            $style = $dataCuttingSAM['style'];
            $color = $dataCuttingSAM['color'];
            $grup_size = $dataCuttingSAM['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            // $result = $this->db->get($this->table);
            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_outermold_sam()
    {
        if (isset($_POST['dataForOuterMoldSAM'])) {
            $data = $_POST['dataForOuterMoldSAM'];
            $style = $data['style'];
            $color = $data['color'];
            $grup_size = $data['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_midmold_sam()
    {
        if (isset($_POST['dataForMidMoldSAM'])) {
            $data = $_POST['dataForMidMoldSAM'];
            $style = $data['style'];
            $color = $data['color'];
            $grup_size = $data['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_linningmold_sam()
    {
        if (isset($_POST['dataForLinningMoldSAM'])) {
            $data = $_POST['dataForLinningMoldSAM'];
            $style = $data['style'];
            $color = $data['color'];
            $grup_size = $data['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_packing_sam()
    {
        if (isset($_POST['dataForPackingSAM'])) {
            $dataPackingSAM = $_POST['dataForPackingSAM'];
            $style = $dataPackingSAM['style'];
            $color = $dataPackingSAM['color'];
            $grup_size = $dataPackingSAM['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            // $result = $this->db->get($this->table);
            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_sam()
    {
        if (isset($_POST['dataForSAM'])) {
            $dataForSAM = $_POST['dataForSAM'];
            $style = $dataForSAM['style'];
            $color = $dataForSAM['color'];
            $grup_size = $dataForSAM['grup_size'];

            $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

            // $result = $this->db->get($this->table);
            $result = $this->db->query($sql);

            return $result->row();
        }
    }

    public function get_sam1($dataForSAM)
    {
        $style = $dataForSAM['style'];
        $color = $dataForSAM['color'];
        $group_size = $dataForSAM['group_size'];

        $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$group_size'";

        // $result = $this->db->get($this->table);
        $result = $this->db->query($sql);

        return $result->row();
    }

    public function get_style()
    {
        $this->db->distinct();
        $this->db->select('style');

        $rst = $this->db->get($this->table);
        return $rst->result();
    }
}

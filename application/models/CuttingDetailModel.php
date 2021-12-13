
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CuttingDetailModel extends CI_Model{
    var $table = 'cutting_detail';   

    var $column_order = array('id_cutting_detail', 'size', 'qty', 'no_bundle');
    var $column_search = array('id_cutting_detail', 'size', 'qty', 'no_bundle');
    var $order = array('id_cutting_detail' => 'asc');
    
    private function _get_datatables_query(){
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {

                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
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

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_cutting_detail',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id_cutting($idCutting){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_cutting',$idCutting);
        // $this->db->where('cutting_date',null);
        $this->db->order_by('no_bundle', 'ASC');
        $query = $this->db->get();
        // $query = $this->db->get_where($this->table, array("id_cutting" => $idCutting));
        // print_r($query->result());
        // print_r($this->db->last_query());

        // $query = $this->db->get_where($this->table, array('id_cutting' => $idCutting));

        return $query->result();        
    }

    public function get_by_id_cutting_molding($idCutting){
        $this->db->select('*');
        $this->db->from($this->table);
        $where = "id_cutting =" . $idCutting . " AND (outermold_barcode !='' OR midmold_barcode !='' OR linningmold_barcode !='')";
        $this->db->where($where);

        $this->db->order_by('kode_barcode', 'asc');
        $query = $this->db->get();
        // $query = $this->db->get_where($this->table, array("id_cutting" => $idCutting));
        // print_r($query->result());
        // print_r($this->db->last_query());

        // $query = $this->db->get_where($this->table, array('id_cutting' => $idCutting));

        return $query->result();        
    }

    public function get_cutting_done($idCutting){
        $this->db->select('id_cutting_detail, size, qty, no_bundle,cutting_date,printed_date');
        $this->db->from($this->table);
        $this->db->where('id_cutting',$idCutting);
        $this->db->where('cutting_date is not null');
        $this->db->where('printed_date',"0000-00-00");
        $query = $this->db->get();

        // print_r($query->result());
        // print_r($this->db->last_query());

        return $query->result();        
    }

    public function save()
    {
        // $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
        
        if(isset($_POST['dataCuttingDetail'])){
            $dataCuttingDetail = $_POST['dataCuttingDetail'];
            // $dataCuttingDetail = $_POST['dataCuttingDetail'];

            // return $dataCuttingDetail;

            // $this->db->insert_batch($this->table, $dataCuttingDetail);

            // return $dataCuttingDetail[0]['id_cutting'];
            // foreach($dataCuttingDetail as $dataCutDet){
            //     $data.push(
            //         array(
            //             'id_cutting' => $dataCutDet['id_cutting'],
            //             'size' => $dataCutDet['size'],
            //             'grup_size' => $dataCutDet['grup_size'],
            //             'qty_pcs' => $dataCutDet['qty_pcs'],
            //             'cutting_sam'=> $dataCutDet['sam_cutting'],
            //             'sam_result' => $dataCutDet['sam_result'],                
            //             'qty' => $dataCutDet['qty'],
            //             'no_bundle' => $dataCutDet['no_bundle'],
            //             'kode_barcode' => $dataCutDet['kode_barcode'],
            //             'outermold_barcode' => $dataCutDet['outermold_barcode'],
            //             'midmold_barcode' => $dataCutDetetail['midmold_barcode'],
            //             'linningmold_barcode' => $dataCutDet['linningmold_barcode']  
            //         )                  
            //     );
            // }
            // return $data;
            // $this->db->insert_batch($this->table, $data);

            
            $this->db->trans_start();
            foreach($dataCuttingDetail as $dataCutDet){
                $data = array(
                    'id_cutting' => $dataCutDet['id_cutting'],
                    'size' => $dataCutDet['size'],
                    'grup_size' => $dataCutDet['grup_size'],
                    'qty_pcs' => $dataCutDet['qty_pcs'],
                    'cutting_sam'=> $dataCutDet['cutting_sam'],
                    'sam_result' => $dataCutDet['sam_result'],                
                    'qty' => $dataCutDet['qty'],
                    'no_bundle' => $dataCutDet['no_bundle'],
                    'kode_barcode' => $dataCutDet['kode_barcode'],
                    'outermold_barcode' => $dataCutDet['outermold_barcode'],
                    'midmold_barcode' => $dataCutDet['midmold_barcode'],
                    'linningmold_barcode' => $dataCutDet['linningmold_barcode'],
                    'panty_barcode' => $dataCutDet['panty_barcode']                
                );
                $this->db->insert($this->table, $data);
            }
            $this->db->trans_complete();

            // if(isset($_POST['dataCuttingDetail'])){
            //     $dataCuttingDetail = $_POST['dataCuttingDetail'];
            //     $data = array();                                
            // }
            // $this->db->insert($this->table, $data);
            // $this->db->insert_batch($this->table, $dataCuttingDetail);

            return "OK";
        }
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_cutting_detail', $id);
        $this->db->delete($this->table);
    }

    public function update2(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $id = $dataStr['id'];
            $tgl = $dataStr['tgl'];

            $this->db->update($this->table, array("cutting_date" => date('Y-m-d', strtotime($tgl))), array("id_cutting_detail" => $id));
            return $this->db->affected_rows();
        }
    }

    public function update3(){
        if(isset($_POST['data'])){
            $data = $_POST['data'];

            $where = array(
                'orc' => $data['orc'],
                'size' => $data['size'],
                'color' => $data['color'],
                'style' => $data['style']
            );


            $this->db->update($this->table, array("packed" => 'yes'), $where);
            return $this->db->affected_rows();
        }
    }    

    public function get_by_barcode($barcode){
        // $this->db->like('kode_barcode', $barcode);
        $val = $this->db->get_where($this->table, array('kode_barcode' => $barcode));

        // $val = $this->db->get($this->table);

        return $val->row();
    }

    public function get_mold_barcode($code){
        $this->db->where('outermold_barcode', $code);
        $this->db->or_where('midmold_barcode', $code);
        $this->db->or_where('linningmold_barcode', $code);

        $rst = $this->db->get($this->table);
        return $rst->num_rows();
    }

    public function get_by_outermold_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('outermold_barcode' => $barcode));

        return $rst->row();
    }

    public function get_by_midmold_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('midmold_barcode' => $barcode));

        return $rst->row();
    }
    
    public function get_by_linningmold_barcode($barcode){
        $rst = $this->db->get_where($this->table, array('linningmold_barcode' => $barcode));

        return $rst->row();
    }
    
    public function check_outer_mold($barcode){
        $rst = $this->db->get_where($this->table, array('outermold_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function check_mid_mold($barcode){
        $rst = $this->db->get_where($this->table, array('midmold_barcode' => $barcode));

        return $rst->num_rows();
    }
    
    public function check_linning_mold($barcode){
        $rst = $this->db->get_where($this->table, array('linningmold_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function check_barcode_mold($barcode){
        $prefix = substr($barcode, 0, 1);

        $rst = $this->db->get_where($this->table, array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $barcode));
        return $rst->num_rows();
        // return $this->db->last_query();
        // return $prefix;
    }
    


}

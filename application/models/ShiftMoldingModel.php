<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShiftMoldingModel extends CI_Model{
    var $table = "shift_molding";

    public function get_shift(){
        date_default_timezone_set('Asia/Jakarta');

        $curTime = date('H:i:s');

        $day = date('w');

        $this->db->where('day', $day);
        $this->db->where('DATE_FORMAT(start, "%H:%i:%s") <= ', $curTime);
        $this->db->where('DATE_FORMAT(end, "%H:%i:%s") >= ', $curTime);
        // $this->db->query('SELECT * FROM shift_molding where day=' . $day . ' AND CURRENT_TIME >= DATE_FORMAT(start,"%H:%i:%s") AND CURRENT_TIME <= DATE_FORMAT(end,"%H:%i:%s");');
        $rst = $this->db->get($this->table);

        // return $this->db->last_query();

        return $rst->row();
    }
}
<?php

class Frame_detail_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function get($frame_id)
    {
        $this->db->select('*');
        $this->db->where("frame_id",$frame_id);
        $this->db->from('tbl_framedetail');
        
        $query = $this->db->get();
        return $query->result();
    }
}
?>

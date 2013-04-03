<?php

class Frame_detail_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Get frame details for a frame
     * @param type $frame_id
     * @return type
     */
    function get($frame_id)
    {
        $this->db->select('*');
        $this->db->where("frame_id",$frame_id);
        $this->db->from('tbl_framedetail');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Delete frame details
     * @param int $frame_id
     */
    function delete($frame_id) {
        $this->db->where('frame_id', $frame_id);
        $this->db->delete('tbl_framedetail');
    }
}
?>

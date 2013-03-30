<?php

/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0
 */
class Frame_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * add a frame
     * @param string $name
     * @param string $description
     * @param string $link
     * @param int $category_id
     */
    function add($name, $description, $link, $category_id, $x = array(), $y = array(), $width = array(), $height = array(), $degree = array(),$frame_width,$frame_height,$pattern) {
        $frame = array(
            'name' => $name,
            'description' => $description,
            'link' => $link,
            'category_id' => $category_id,
            'width'=>$frame_width,
            'height'=>$frame_height,
            'pattern'=>$pattern
        );
        $this->db->insert('tbl_frame', $frame);
        if ($this->db->affected_rows() > 0) {
            $id = $this->db->insert_id();
            $count = count($x);
            for ($i = 0; $i < $count; $i++) {
                $frame_detail = array(
                    'frame_id' => $id,
                    'x' => $x[$i],
                    'y' => $y[$i],
                    'width' => $width[$i],
                    'height' => $height[$i],
                    'degree' => $degree[$i]
                );
                $this->db->insert('tbl_framedetail', $frame_detail);
            }
        }
    }

    /**
     * get a list of frame
     * @param int $id
     * @param string $name
     * @param int $limit
     * @param int $offset
     * @return type
     */
    function get($id = 0, $name = '', $limit = -1, $offset = 10) {
        $this->db->select('id, name, description, link, category_id, pattern, width, height');
        $this->db->from('tbl_frame');

        if ($id == 0) {
            if ($limit > 0) {
                $this->db->limit($limit, $offset);
            }

            if ($name != '') {
                $this->db->like('name', $name);
            }

            $query = $this->db->get();
            return $query->result();
        } elseif ($id > 0) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->result();
        }
    }

    /**
     * 
     * @param type $category_id
     * @param type $limit
     * @param type $offset
     * @return type
     */
    function get_by_category($category_id, $limit = -1, $offset = 0) {
        $this->db->select('id, name, description, link, category_id, pattern, width, height');
        $this->db->from('tbl_frame');

        $this->db->where('category_id', $category_id);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get pattern by category
     * @param type $category_id
     * @param type $limit
     * @param type $offset
     * @return type
     */
    function get_pattern_by_category($category_id, $limit = 0, $offset = 0){
        $this->db->select('id, name, description, link, category_id, pattern,width,height');
        $this->db->from('tbl_frame');

        $this->db->where('category_id', $category_id);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Delete a frame
     * @param int $id
     */
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_frame');
    }

    /**
     * 
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $link
     * @param int $category_id
     */
    function edit($id, $name, $description, $link, $category_id,$frame_width,$frame_height,$pattern) {
        $arr = array(
            'name' => $name,
            'description' => $description,
            'link' => $link,
            'category_id' => $category_id,
            'width'=>$frame_width,
            'height'=>$frame_height,
            'pattern'=>$pattern
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_frame', $arr);
    }

}

?>

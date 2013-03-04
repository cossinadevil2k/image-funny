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
    function add($name, $description, $link, $category_id) {
        $frame = array(
            'name' => $name,
            'description' => $description,
            'link' => $link,
            'category_id' => $category_id
        );

        $this->db->insert('tbl_frame', $frame);
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
        $this->db->select('id,name,description,link,category_id');
        $this->db->from('tbl_frame');

        if ($id == 0) {
            if ($limit > 0) {
                $this->db->limit($limit, $offset);
            }
            
            if($name!='')
            {
                $this->db->like('name',$name);
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
     * Delete a frame
     * @param int $id
     */
    function delete($id)
    {
        $this->db->where('id',$id);
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
    function edit($id,$name,$description,$link,$category_id)
    {
        $arr = array(
            'name'=>$name,
            'description'=>$description,
            'link'=>$link,
            'category_id'=>$category_id
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_frame',$arr);
        
    }
}

?>

<?php

/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0
 */
class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get list of Category
     * @param int $id
     * @param int $limit
     * @param int $offset
     * @return array categories
     */
    public function get($id = 0, $limit = -1, $offset = 0, $isReturnArray = FALSE) {
        $this->db->select('id, name, description, frame_type');
        $this->db->from('tbl_category');

        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        if ($id == 0) {
            $query = $this->db->get();
        } elseif ($id > 0) {
            $this->db->where('id', $id);
            $query = $this->db->get();            
        }
        if ($isReturnArray){
            return $query->result_array();
        }
        return $query->result();
    }
    
    /**
     * Get Non-Facebook Categories
     * @return boolean
     */
    public function get_non_facebook_category(){
        $sql = "SELECT * FROM tbl_category WHERE frame_type != 1";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0)
        {
            $result = $query->result_array();
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * Check a frame which is a text frame or not
     * @param type $category_id
     * @return boolean
     */
    public function is_text_frame($category_id = 0){
        if ($category_id != 0){
            $sql = "SELECT id FROM tbl_category WHERE frame_type = 2 AND id = {$category_id} ";
            $query = $this->db->query($sql);
            if ($query->num_rows > 0)
            {
                return TRUE;
            }
        }
        return FALSE;
    }
    
    /**
     * Add a category
     * @param string $name
     * @param string $description
     */
    public function add($name, $description) {
        $category = array(
            'name' => $name,
            'description' => $description
        );

        $this->db->insert('tbl_category', $category);
    }

    /**
     * delete a category
     * @param type $id
     */
    public function delete($id = 0) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_category');
    }

    /**
     * update an category
     * @param int $id
     * @param string $name
     * @param string $description
     */
    public function edit($id, $name, $description) {
        $this->db->where('id', $id);
        $arr = array(
            'name' => $name,
            'description' => $description
        );
        $this->db->update('tbl_category',$arr);
    }

}

?>

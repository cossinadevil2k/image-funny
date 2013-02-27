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
    public function get($id = 0, $limit = -1, $offset = 10) {
        $this->db->select('id,name,description');
        $this->db->from('tbl_category');

        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        if ($id == 0) {
            $query = $this->db->get();
            return $query->result();
        } elseif ($id > 0) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->result();
        }
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

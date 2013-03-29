<?php

/**
 * Description of status
 *
 * @author Tan
 */
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('frame_model');
    } 
    
    public function index(){
        $category_arr = $this->category_model->get_all_category();        
        foreach ($category_arr as &$category){
            $frame_arr = $this->frame_model->get_by_category($category['id'], $this->config->item('pattern_number'), 0);
            $category['frame_list'] = $frame_arr;
            $category['offset'] = count($frame_arr);
        }
        $arr['category_arr'] = $category_arr;
        $this->load->view('home', $arr);
    }
    
    public function get_more_frame(){
        $category_id = $this->input->post('categoryID');
        $offset = $this->input->post('offset');
        $frame_arr = $this->frame_model->get_by_category($category_id, $this->config->item('pattern_number'), $offset);
        if (count($frame_arr) == 0){
            echo json_encode(array('status' => 'NO_DATA'));
        }else{
            $offset += count($frame_arr);
            echo json_encode(array('status' => 'SUCCESS', 'offset' => $offset, 'frame_list' => $frame_arr));
        }
        die();
    }
}

?>
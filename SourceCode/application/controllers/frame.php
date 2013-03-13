<?php

/**
 * Description of status
 *
 * @author Tan
 */
class Frame extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('frame_model');
    } 
    
    public function index($category_id = 0, $frame_id = 0){
        $category_arr = $this->category_model->get(null, null, null, TRUE);
        if ($category_id !=0){            
            $frame_list = $this->frame_model->get_by_category($category_id, 10, 0);    
            $arr['category_enable'] = $category_id;
        }else{
            $frame_list = $this->frame_model->get_by_category($category_arr[0]['id'], 10, 0);
            $arr['category_enable'] = $category_arr[0]['id'];
        }
        
        if ($frame_id != 0){
            $selected_frame = $this->frame_model->get($frame_id);
            $arr['selected_frame'] = $selected_frame[0];
            $arr['category_enable'] = $selected_frame[0]->category_id;
        }else{
            if (!empty($frame_list)){
                $selected_frame = $frame_list[0];
                $arr['selected_frame'] = $selected_frame;                 
            }            
        } 
        
        $arr['category_arr'] = $category_arr;        
        $arr['frame_list'] = $frame_list;
        
        $this->load->view('frame', $arr);
    }
    
    public function create_frame($frame_id = 1){
        
    }
}

?>

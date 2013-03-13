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
    
    public function index($frame_id = 1){
        if (($frame_id != 0) && (is_numeric($frame_id))){
            $category_arr = $this->category_model->get(null, null, null, TRUE);
            $selected_frame = $this->frame_model->get($frame_id);
            $frame_list = $this->frame_model->get_by_category($selected_frame[0]->category_id, 10, 0);

            $arr['category_arr'] = $category_arr;
            $arr['selected_frame'] = $selected_frame[0];
            $arr['frame_list'] = $frame_list;
            $arr['category_enable'] = $selected_frame[0]->category_id;
            $this->load->view('frame', $arr);
        }else{
            redirect('/tao-khung');
        }
    }
    
    public function create_frame($frame_id = 1){
        
    }
}

?>

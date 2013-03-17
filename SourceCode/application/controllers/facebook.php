<?php

/**
 * Description of status
 *
 * @author Tan
 */
class Facebook extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('frame_model');
        $this->load->model('frame_detail_model');
        $this->load->library('ImageLib');
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
        
        foreach ($frame_list as $frame){
            $arr_frame_detail = $this->frame_detail_model->get($frame->id);
            $frame_detail[] = $arr_frame_detail;
        }

        if ($frame_id != 0){
            $selected_frame = $this->frame_model->get($frame_id);
            $arr['selected_frame'] = $selected_frame[0];
            $arr['category_enable'] = $selected_frame[0]->category_id;
        }else{
            if (!empty($frame_list)){
                $selected_frame = $frame_list[0];
                $frame_id = $selected_frame->id;
                $arr['selected_frame'] = $selected_frame;                 
            }            
        }
        
        $arr['category_arr'] = $category_arr;        
        $arr['frame_list'] = $frame_list;
        $arr['frame_detail_list'] = $frame_detail;
        
        $this->load->view('facebook', $arr);
    }
}

?>

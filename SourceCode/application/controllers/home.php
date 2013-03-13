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
        $category_arr = $this->category_model->get(null, null, null, TRUE);
        foreach ($category_arr as &$category){
            $frame_arr = $this->frame_model->get_by_category($category['id'], $this->config->item('pattern_number'), 0);
            $category['frames'] = $frame_arr;
        }
        $arr['category_arr'] = $category_arr;
        $this->load->view('home', $arr);
    }
}

?>
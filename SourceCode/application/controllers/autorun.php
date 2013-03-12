<?php

class Autorun extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("Frame_model");
        $this->load->model("Frame_detail_model");
        $this->load->library('ImageLib');
    }
    
    function index()
    {
        $lstFrame = $this->Frame_model->get_by_category(2);
        foreach ($lstFrame as $item)
        {            
            $arr_frame_detail = $this->Frame_detail_model->get($item->id);
            ImageLib::AddFrameArray('./images/anh_mau.jpg',  str_replace('/ImageFunny', '.', $item->link) ,$arr_frame_detail);
        }
    }
}
?>

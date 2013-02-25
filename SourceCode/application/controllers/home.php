<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function index() {
//        $config['image_library'] = 'gd2';
//        $config['source_image'] = './images/a.jpg';
//        $config['new_image'] = './images/new_image.jpg';
//        $config['wm_text'] = 'Copyright 2013';
//        $config['wm_type'] = 'text';
//        $config['wm_font_path'] = './system/fonts/texb.ttf';
//        $config['wm_font_size'] = '32';
//        $config['wm_font_color'] = 'ffffff';
//        $config['wm_vrt_alignment'] = 'top';
//        $config['wm_hor_alignment'] = 'center';
//        $config['wm_padding'] = '100';
//
//        $this->image_lib->initialize($config);
//
//        $this->image_lib->watermark();
//        
//        $this->image_lib->resize();
//        if (!$this->image_lib->watermark()) {
//            echo $this->image_lib->display_errors();
//        }
        echo "Index";
    }
    
    public function test(){
        echo "test";
    }

}

?>

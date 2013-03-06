<?php

class Demo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ImageLib');
    }

    /**
     * add 1 frame đơn giản
     */
    function oneFrame() {
        $image = './images/a.jpg';
        $frame = './images/0001.png';

        $result = ImageLib::AddFrame($image, $frame, 272, 272, 333, 325, 0);

        $data['result'] = $result;
        $this->load->view('demo_index', $data);
    }

    function filterNegate() {        
        $image = './images/b.jpg';
        $result = ImageLib::FilterColorize($image,10,0,50);
        $data['source'] = base_url().$image;
        $data['result'] = $result;
        $this->load->view('demo_index', $data);
    }

}

?>

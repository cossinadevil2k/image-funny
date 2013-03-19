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

        $result[] = ImageLib::AddFrame($image, $frame, 272, 272, 333, 325, 0,145,433,879,847);
        $data['source'] = base_url().$image;
        $data['result'] = $result;
        $this->load->view('demo_index', $data);
    }

    function index() {        
        $image = './images/b.jpg';
        $result = array();
        $result[] = ImageLib::FilterNegate($image,'b_negate.jpg');
        $result[] = ImageLib::FilterBrightness($image, 50,'b_bright_50.jpg');
        $result[] = ImageLib::FilterBrightness($image, 5,'b_bright_5.jpg');
        $result[] = ImageLib::FilterColorize($image, 100, 0, 0,'b_color_100_0_0.jpg');
        $result[] = ImageLib::FilterColorize($image, 0, 100, 0,'b_color_0_100_0.jpg');
        $result[] = ImageLib::FilterColorize($image, 0, 0, 100,'b_color_0_0_100.jpg');
        $result[] = ImageLib::FilterColorize($image,50,50,50,'b_color_50_50_50.jpg');
        $result[] = ImageLib::FilterColorize($image,100,100,-100,'b_color_100_100__100.jpg');
        $result[] = ImageLib::FilterEdgedetect($image,'b_edgedetect.jpg');
        $result[] = ImageLib::FilterEmboss($image,'b_emboss.jpg');
        $result[] = ImageLib::FilterGaussianBlur($image,'b_gaussianblur.jpg');
        $result[] = ImageLib::FilterSelectiveBlur($image,'b_selectiveblur.jpg');
        $result[] = ImageLib::FilterMeanRemoval($image,'b_meanremoval.jpg');
        $result[] = ImageLib::FilterSmooth($image,50,'b_smooth.jpg');
        $data['source'] = base_url().$image;
        $data['result'] = $result;
        $this->load->view('demo_index', $data);
    }

    function watermark()
    {
         $this->load->view('demo_watermark');       
    }
    
    function createWaterMark()
    {
        $detail = $this->input->post('detail');
        $details = explode("^", $detail);
        $arr = array();
        foreach ($details as $watermark)
        {
            $watermarks = explode("|", $watermark);
            if($watermarks[0]=='tBlock')
            {
                $blockDetail = new stdClass();
                
                $blockDetail->type = 'tBlock';
                $blockDetail->blockText = $watermarks[1];                
                $blockDetail->blockFont= $watermarks[2];
                $blockDetail->blockFontSize= $watermarks[3];
                $blockDetail->blockStyle= $watermarks[4];
                $blockDetail->blockTextDecoration= $watermarks[5];
                $blockDetail->blockColor= substr($watermarks[7],1,strlen($watermarks[7])-1);
                $blockDetail->blockLeft= $watermarks[8];
                $blockDetail->blockTop= $watermarks[9];
                $blockDetail->blockDepth= $watermarks[10];
                
                $arr[] = $blockDetail;
            }
        }
        
        $a = ImageLib::AddWaterMark('./images/anh_mau.jpg', $arr);
        
        echo json_encode($a);
    }
}

?>

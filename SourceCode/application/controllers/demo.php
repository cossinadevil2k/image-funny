<?php

class Demo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ImageLib');
        $this->load->model("Frame_detail_model");
    }

    function instagram()
    {
        $image = './images/anh_mau.jpg';
        echo ImageLib::Instagram_Array($image,array('kenvin'));
    }
    
    function a()
    {
        $image = './images/anh_mau.jpg';
        $frame = './images/d.png';
        
        ImageLib::AddFrameNew($image, $frame);
    }
    
    /**
     * add 1 frame đơn giản
     */
    function oneFrame() {
        $image = './images/anh_mau.jpg';
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
        $imagePath = $this->input->post('imagePath');
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
        
        $a = ImageLib::AddWaterMark($imagePath, $arr);
        
        echo json_encode($a);
    }
    
    function abc()
    {
        $imageArray = array();
        $image = new stdClass();
        $image->path = "./images/a.jpg";
        $image->crop_x = 197;
        $image->crop_y = 389;
        $image->crop_width = 827;
        $image->crop_height = 891;
        $imageArray[] = $image;
        
        $image1 = new stdClass();
        $image1->path = "./images/a.png";
        $image1->crop_x = 0;
        $image1->crop_y = 0;
        $image1->crop_width = 200;
        $image1->crop_height = 200;
        $imageArray[] = $image1;
        
        $image2 = new stdClass();
        $image2->path = "./images/anh_mau.jpg";
        $image2->crop_x = 1;
        $image2->crop_y = 34;
        $image2->crop_width = 433;
        $image2->crop_height = 495;
        $imageArray[] = $image2;
        
        
        $arr_frame_detail = $this->Frame_detail_model->get(6);
        ImageLib::AddImageFrame($imageArray, "./resources/frames/khungteen/1.png", $arr_frame_detail);
       
    }
}

?>

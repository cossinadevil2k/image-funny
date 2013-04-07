<?php

/**
 * Description of status
 *
 * @author Tan
 */
require 'UploadHandler.php';
require 'facebook.php';
require_once('./PHPImageWorkshop/ImageWorkshop.php');

class Frame extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('frame_model');
        $this->load->model('frame_detail_model');
        $this->load->library('ImageLib');
        $this->load->model("Watermark");
    }

    public function index($category_id = 0, $frame_id = 0) {
        $category_arr = $this->category_model->get_normal_category();
        if ($category_id > 0) {
            $frame_list = $this->frame_model->get_by_category($category_id, 10, 0);
            $is_text_frame = $this->category_model->is_text_frame($category_id);
            $arr['category_enable'] = $category_id;
        } else {
            $frame_list = $this->frame_model->get_by_category($category_arr[0]['id'], 10, 0);
            $arr['category_enable'] = $category_arr[0]['id'];
            $is_text_frame = $this->category_model->is_text_frame($category_arr[0]['id']);
        }

        foreach ($frame_list as $frame) {
            $arr_frame_detail = $this->frame_detail_model->get($frame->id);
            $frame_detail[] = $arr_frame_detail;
        }

        if ($frame_id != 0) {
            $selected_frame = $this->frame_model->get($frame_id);
            if (!empty($selected_frame)){
                $arr['selected_frame'] = $selected_frame[0];
                $arr['category_enable'] = $selected_frame[0]->category_id;
            }else{
                redirect('index');
            }            
        } else {
            if (!empty($frame_list)) {
                $selected_frame = $frame_list[0];
                $frame_id = $selected_frame->id;
                $arr['selected_frame'] = $selected_frame;
            }
        }

        $arr['category_arr'] = $category_arr;
        $arr['frame_list'] = $frame_list;
        $arr['is_text_frame'] = $is_text_frame;
        if (isset($frame_detail)) {
            $arr['frame_detail_list'] = $frame_detail;
        }
        $arr['fb_app_id'] = $this->config->item('FACEBOOK_APP_ID');
        $this->load->view('frame', $arr);
    }
    
    public function get_more_frame(){
        $category_id = $this->input->post('categoryID');
        $offset = $this->input->post('offset');
        $frame_arr = $this->frame_model->get_by_category_array($category_id, $this->config->item('pattern_number'), $offset);
        
        if (count($frame_arr) == 0){
            echo json_encode(array('status' => 'NO_DATA'));
        }else{
            $offset += count($frame_arr);
            foreach ($frame_arr as &$frame) {
                $frame_detail = $this->frame_detail_model->get($frame['id']);
                $frame['details'] = $frame_detail;
            }
            echo json_encode(array('status' => 'SUCCESS', 'offset' => $offset, 'frame_list' => $frame_arr));
        }
        die();
    }

    public function create_frame() {
        $frame_id = $this->input->post('frame_id');
        $image_string = $this->input->post('imageString');
        $temps = explode("#", $image_string);

        $imageArray = array();
        foreach ($temps as $temp) {
            $temp = explode("|", $temp);
            if (!empty($temp[0])) {
                $image = new stdClass();
                $image->frame_detail_id = $temp[0];
                $image->path = $temp[1];
                $image->crop_x = $temp[2];
                $image->crop_y = $temp[3];
                $image->crop_width = $temp[4];
                $image->crop_height = $temp[5];
                $imageArray[] = $image;
            }
        }

        $selected_frame = $this->frame_model->get($frame_id);
        $arr_frame_detail = $this->frame_detail_model->get($frame_id);

        $result = ImageLib::AddImageFrame($imageArray, $selected_frame[0]->link, $arr_frame_detail);
        if ($result === "") {
            echo json_encode(array('status' => 'error'));
        } else {
            $temp = explode(base_url(), $result);
            $real_path = $temp[1];
            $imgbinary = fread(fopen($real_path, "r"), filesize($real_path));
            $filetype = "png";
            $image = 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
            echo json_encode(array('status' => 'success', 'image_path' => $result, 'data' => $image));
        }
        die();
    }

    public function get_frame_detail() {
        $frame_id = $this->input->post('frame_id');
        $arr_frame_detail = $this->frame_detail_model->get($frame_id);
        if ($arr_frame_detail) {
            echo json_encode(array('status' => 'success', 'frame_detail' => $arr_frame_detail));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function get_image_dimensions() {
        $path = $this->input->post('image_path');
        $this->session->set_userdata('UserImage', $path);
        $image_info = getimagesize($path);
        $temp = explode('"', $image_info[3]);
        $dimensions['width'] = $temp[1];
        $dimensions['height'] = $temp[3];
        echo json_encode($dimensions);
        die();
    }

    public function download() {
        $image_path = $this->input->get('image');
        header('Content-Description: File Transfer');
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($image_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        flush();
        readfile($image_path);
        die();
    }

    public function post_to_facebook() {
        $image_path = $this->input->post('imagePath');
        $temp = explode(base_url(), $image_path);
        $real_path = $temp[1];

        $config = array();
        $config['appId'] = $this->config->item('FACEBOOK_APP_ID');
        $config['secret'] = $this->config->item('FACEBOOK_APP_SECRET');
        $config['fileUpload'] = true;

        $facebook = new Facebook($config);
        $user = $facebook->getUser();
        if ($user) {
            $facebook->setFileUploadSupport(true);
            $args = array('message' => $this->config->item('MESSAGE'));
            $args['image'] = '@' . realpath($real_path);
            $data = $facebook->api('/me/photos', 'POST', $args);
            if (!empty($data)){
                echo json_encode(array('status' => 'SUCCESS'));
            }else{
                echo json_encode(array('status' => 'FAIL'));
            }
            die();
        }
    }

    public function facebook($frame_id = 0) {
        $category_arr = $this->category_model->get_facebook_category();
        if ($category_arr) {
            $frame_list = $this->frame_model->get_by_category($category_arr[0]['id'], 10, 0);
        }

        if (!empty($frame_list)){
            foreach ($frame_list as $frame) {
                $arr_frame_detail = $this->frame_detail_model->get($frame->id);
                $frame_detail[] = $arr_frame_detail;
            } 
            $arr['frame_list'] = $frame_list;
        }        

        if ($frame_id != 0) {
            $selected_frame = $this->frame_model->get($frame_id);
            $arr['selected_frame'] = $selected_frame[0];
        } else {
            if (!empty($frame_list)) {
                $selected_frame = $frame_list[0];
                $frame_id = $selected_frame->id;
                $arr['selected_frame'] = $selected_frame;
            }
        }

        if (isset($frame_detail)) {
            $arr['frame_detail_list'] = $frame_detail;
        }

        $arr['fb_app_id'] = $this->config->item('FACEBOOK_APP_ID');

        $this->load->view('facebook', $arr);
    }

    public function upload() {
        $upload_handler = new UploadHandler();
    }

    function create_watermark() {
        $detail = $this->input->post('detail');
        $imagePath = $this->input->post('imagePath');
        $details = explode("^", $detail);
        $arr = array();
        foreach ($details as $watermark) {
            $watermarks = explode("|", $watermark);
            if ($watermarks[0] == 'tBlock') {
                $blockDetail = new Watermark();

                $blockDetail->type = 'tBlock';
                $blockDetail->blockText = $watermarks[1];
                $blockDetail->blockFont = $watermarks[2];
                $blockDetail->blockFontSize = $watermarks[3];
                $blockDetail->blockStyle = $watermarks[4];
                $blockDetail->blockTextDecoration = $watermarks[5];
                $blockDetail->blockColor = substr($watermarks[7], 1, strlen($watermarks[7]) - 1);
                $blockDetail->blockLeft = $watermarks[8];
                $blockDetail->blockTop = $watermarks[9];
                $blockDetail->blockDepth = $watermarks[10];
                $blockDetail->blockDegree = $watermarks[11];

                $arr[] = $blockDetail;
            } elseif ($watermarks[0] == 'cBlock') {
                $blockDetail = new Watermark();

                $blockDetail->type = 'cBlock';

                $blockDetail->blockColor = substr($watermarks[1], 1, strlen($watermarks[1]) - 1);
                $blockDetail->blockLeft = $watermarks[2];
                $blockDetail->blockTop = $watermarks[3];
                $blockDetail->blockWidth = $watermarks[4];
                $blockDetail->blockHeight = $watermarks[5];
                $blockDetail->blockDepth = $watermarks[6];
                $blockDetail->blockDegree = $watermarks[7];

                $arr[] = $blockDetail;
            }
        }
        usort($arr, array("Watermark", "compare_block_deep"));
        $result = ImageLib::AddWaterMark($imagePath, $arr);
        echo json_encode($result);
    }

    public function effect($frame_id = 0) {
        $category_arr = $this->category_model->get_effect_category();
        if ($category_arr) {
            $frame_list = $this->frame_model->get_by_category($category_arr[0]['id'], 10, 0);
        }

        if (!empty($frame_list)){
            foreach ($frame_list as $frame) {
                $arr_frame_detail = $this->frame_detail_model->get($frame->id);
                $frame_detail[] = $arr_frame_detail;
            }
            $arr['frame_list'] = $frame_list;
        }

        if ($frame_id != 0) {
            $selected_frame = $this->frame_model->get($frame_id);
            $arr['selected_frame'] = $selected_frame[0];
        } else {
            if (!empty($frame_list)) {
                $selected_frame = $frame_list[0];
                $frame_id = $selected_frame->id;
                $arr['selected_frame'] = $selected_frame;
            }
        }
        
        if (isset($frame_detail)) {
            $arr['frame_detail_list'] = $frame_detail;        }
            

        $arr['fb_app_id'] = $this->config->item('FACEBOOK_APP_ID');

        $this->load->view('effect', $arr);
    }

    public function create_thumb() {
        //$frame_id = $this->input->post('frame_id');
        $image_string = $this->input->post('imageString');

        $temp = explode("|", $image_string);

        if (!empty($temp[1])) {

            $image = new stdClass();
            $image->frame_detail_id = $temp[0];
            $image->path = $temp[1];
            $image->crop_x = $temp[2];
            $image->crop_y = $temp[3];
            $image->crop_width = $temp[4];
            $image->crop_height = $temp[5];


            $ext = pathinfo($image->path, PATHINFO_EXTENSION);
            $document = \PHPImageWorkshop\ImageWorkshop::initFromPath($temp[1]);
            $document->cropInPixel($temp[4], $temp[5], $temp[2], $temp[3],'LT');
            $image_name = uniqid('taoanhnet_', FALSE) . '.' . $ext;
            $document->save('./resources/users', $image_name, true, 'transparent', 100);
            echo json_encode(array('thumb_path'=>base_url().'resources/users/' . $image_name,
                'image_path'=>'./resources/users/' . $image_name
                )) ;
            
        }
    }
    
    public function create_effect()
    {
        $effectSelected = $this->input->post('effect');
        $image = $this->input->post('image');
        $imageLib = new ImageLib();
        $effect = $imageLib->{'Instagram_'.$effectSelected}($image);
        $temp = explode(base_url(), $effect);
        $real_path = $temp[1];
        $imgbinary = fread(fopen($real_path, "r"), filesize($real_path));
        $filetype = "png";
        $image = 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        echo json_encode(array('image_path'=>$effect, 'data' => $image)) ;
    }

}

?>

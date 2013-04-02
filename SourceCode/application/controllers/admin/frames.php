<?php
require_once('./PHPImageWorkshop/ImageWorkshop.php');
require '/../UploadHandler.php';
/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0
 */
class Frames extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Frame_model');
        $this->load->model("Frame_detail_model");
    }

    /**
     * 
     * @param string $keyword
     * @param int $row
     * 
     */
    function index($keyword = '~', $row = 0) {
        $data['key_word'] = urldecode($keyword);        
        if ($this->input->post('txtKeyWord')) {
            
            $data['key_word'] = $this->input->post('txtKeyWord');
        }
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;
        $config['base_url'] = base_url() . "admin/frames/index/" . $data['key_word'] . '/';

        if ($data['key_word'] != '~') {
            $lstFrame = $this->Frame_model->get(0, $data['key_word']);
        } else {
            $lstFrame = $this->Frame_model->get(0);
        }
        $config['total_rows'] = count($lstFrame);
        $config['cur_page'] = $row;
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();

        if ($data['key_word'] != '~') {
            $lstFrame = $this->Frame_model->get(0, $data['key_word'], $config['per_page'], $row);
        } else {
            $lstFrame = $this->Frame_model->get(0, '', $config['per_page'], $row);
        }
        
        
        $data['lstFrame'] = $lstFrame;
        $data['view'] = 'back_end/frame_index';
        $this->load->view('back_end/template_noright', $data);
    }

    /**
     * Add Frame action
     */
    function add() {
        if ($this->input->post('txtName')) {
            $name = $this->input->post('txtName');
            $desc = $this->input->post('txtDescription');
//            $link = $this->input->post('hdffeatured_image');
//            $pattern = $this->input->post('hdffeatured_image_patern');
            $link = $this->input->post('txtLink');
            $pattern = $this->input->post('txtPattern');
            $cat_id = $this->input->post('ddlCat');
            
            $image = \PHPImageWorkshop\ImageWorkshop::initFromPath("./".$link);
            $frame_width = $image->getWidth();
            $frame_height = $image->getHeight();            
            
            $x = $this->input->post("txtX");
            $y = $this->input->post("txtY");
            $xc = $this->input->post("txtXC");
            $yc = $this->input->post("txtYC");
            $width = $this->input->post("txtWidth");
            $height = $this->input->post("txtHeight");
            $degree = $this->input->post("txtDegree");
            
            $x_input = explode('-', $x);
            $y_input = explode('-', $y);
            $xc_input = explode('-', $xc);
            $yc_input = explode('-', $yc);
            $width_input = explode('-', $width);
            $height_input = explode('-', $height);
            $degree_input = explode('-', $degree);
            
            $this->Frame_model->add($name, $desc, $link, $cat_id,$x_input,$y_input,
                    $width_input,$height_input,$degree_input,$frame_width,
                    $frame_height,$pattern,$xc_input,$yc_input);
            redirect('admin/frames');            
        }
        
        $data['lstCategory'] = $this->Category_model->get();
        $data['view'] = 'back_end/frame_add';
        $this->load->view('back_end/template_noright', $data);
    }

    /**
     * delete a frame by id
     */
    function delete() {
        $id = $this->input->post('param');
        $this->Frame_model->delete($id);
    }

    /**
     * 
     * @param int $id
     */
    function edit($id = 0) {
        if ($this->input->post('txtName')) {
            $id = $this->input->post('id');
            $name = $this->input->post('txtName');
            $desc = $this->input->post('txtDescription');
//            $link = $this->input->post('hdffeatured_image');
//            $pattern = $this->input->post('hdffeatured_image_patern');
            $link = $this->input->post('txtLink');
            $pattern = $this->input->post('txtPattern');
            $cat_id = $this->input->post('ddlCat');
            
            $image = \PHPImageWorkshop\ImageWorkshop::initFromPath("./".$link);
            $frame_width = $image->getWidth();
            $frame_height = $image->getHeight();            
            
            $x = $this->input->post("txtX");
            $y = $this->input->post("txtY");
            $xc = $this->input->post("txtXC");
            $yc = $this->input->post("txtYC");
            $width = $this->input->post("txtWidth");
            $height = $this->input->post("txtHeight");
            $degree = $this->input->post("txtDegree");
            
            $x_input = explode('-', $x);
            $y_input = explode('-', $y);
            $xc_input = explode('-', $xc);
            $yc_input = explode('-', $yc);
            $width_input = explode('-', $width);
            $height_input = explode('-', $height);
            $degree_input = explode('-', $degree);

            $this->Frame_model->edit($id,$name, $desc, $link, $cat_id,$x_input,$y_input,
                    $width_input,$height_input,$degree_input,$frame_width,
                    $frame_height,$pattern,$xc_input,$yc_input);
            
            redirect('admin/frames');
        }
        
        $data['frame_details'] = $this->Frame_detail_model->get($id);
        $frame = $this->Frame_model->get($id);
        if (count($frame) > 0) {
            $data['frame'] = $frame[0];
        } else {
            $data['frame'] = null;
        }
        $data['lstCategory'] = $this->Category_model->get();
        $data['view'] = 'back_end/frame_edit';
        $this->load->view('back_end/template_noright', $data);
    }
    
    public function upload() {
        $category_path = $this->input->post('categoryPath');
        $upload_dir = '/resources/'.$category_path."/";
        $upload_handler = new UploadHandler(null, true, $upload_dir);
    }

}

?>

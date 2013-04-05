<?php

/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0
 */
class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load session library
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('Category_model');
    }

    function login() {
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if (($username == $this->config->item('username') && ($password == $this->config->item('pass')))) {
                $userdata = array(
                    'username' => $username,
                    'login' => TRUE,
                );
                $this->session->set_userdata($userdata);
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('logined', 'false');
            }
        }
        $this->load->view('back_end/login');
    }

    function index($row = 0) {
        if ($this->session->userdata('login') != 1) {
            redirect('admin/category/login');
        }
        if ($this->input->post('txtname')) {
            $name = $this->input->post('txtname');
            $desc = $this->input->post('txtdescription');
            $frame_type = $this->input->post('rdoType');
            $path = trim($name);
            $path = str_replace(" ", "", $path);

            $this->Category_model->add($name, $desc, $frame_type, trim($path));
            redirect('admin/category');
        }
        include('paging.php');
        $config['per_page'] = 10;
        $config['base_url'] = base_url() . "admin/category/index/";
        $config['total_rows'] = count($this->Category_model->get());
        $config['cur_page'] = $row;
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();

        $data['lstCategories'] = $this->Category_model->get(0, $config['per_page'], $row);

        $data['view'] = 'back_end/category_index';
        $this->load->view('back_end/template_noright', $data);
    }

    function delete() {
        if ($this->session->userdata('login') != 1) {
            redirect('admin/category/login');
        }
        $id = $this->input->post('param');
        $this->Category_model->delete($id);
        if ($this->db->affected_rows() > 0) {

            echo 'success';

            $this->session->set_flashdata('result', 'success');
            redirect('admin/category');
        } else {

            echo 'not success';
        }
    }

    function edit($id = 0, $row = 0) {
        if ($this->session->userdata('login') != 1) {
            redirect('admin/category/login');
        }
        if ($this->input->post('txtname')) {
            $id = $this->input->post('id');
            $name = $this->input->post('txtname');
            $desc = $this->input->post('txtdescription');
            $frame_type = $this->input->post('rdoType');
            $path = trim($name);
            $path = str_replace(" ", "", $path);
            if ($this->Category_model->edit($id, $name, $desc, $frame_type, trim($path))) {
                $this->session->set_flashdata('result', 'success');
                redirect('admin/category');
            }
        }
        include('paging.php');
        $config['per_page'] = 10;
        $config['base_url'] = base_url() . "admin/category/edit/" . $id;
        $config['total_rows'] = count($this->Category_model->get());
        $config['cur_page'] = $row;
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();

        $category = $this->Category_model->get($id);
        if (count($category) > 0) {
            $category = $category[0];
        }
        $data['category'] = $category;
        $data['lstCategories'] = $this->Category_model->get(0, $config['per_page'], $row);

        $data['view'] = 'back_end/category_edit';
        $this->load->view('back_end/template_noright', $data);
    }

}
?>


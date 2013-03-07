<?php

/**
 * Description of status
 *
 * @author Tan
 */
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
    } 
    
    public function index(){
        $arr['base'] = base_url();
        $this->load->view('home', $arr);
    }
}

?>

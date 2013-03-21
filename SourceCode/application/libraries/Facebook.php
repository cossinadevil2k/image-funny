<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Facebook
 *
 * @author Tan
 */

require_once('./facebook/src/facebook.php');

class Facebook {
    
    protected $CI;
    
    public function __construct() {
        $this->CI = get_instance();
        $this->CI->load->library('session');
        $this->CI->data['fb_app_id'] = $this->CI->config->item('FACEBOOK_APP_ID');
    }
}

?>

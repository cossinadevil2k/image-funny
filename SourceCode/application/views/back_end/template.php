<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order - Online | Quản Trị</title>
<link rel="stylesheet" href="<?php echo base_url();?>content-admin/css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url();?>content-admin/js/jquery.popupWindow.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/general_1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/dashboard.js"></script>

<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>
<body class="loggedin">
    <!-- START OF HEADER -->
    <div class="header radius3">
        <?php $this->load->view('back_end/header');?>
    </div>
     <!-- END OF HEADER -->
     
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
        <div class="mainwrapperinner">
            <div class="mainleft">
                <?php $this->load->view('back_end/left');?>
            </div>
            <div class="maincontent">
                <div class="maincontentinner">
                    <?php $this->load->view($view);?>
                </div><!--maincontentinner-->       
                <div class="footer">
                    <?php $this->load->view('back_end/footer');?>
                </div><!--footer-->
            </div>
            <div class="mainright">
                <?php $this->load->view('back_end/right');?>
            </div>
        </div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
    <!-- END OF MAIN CONTENT -->
</body>
</html>
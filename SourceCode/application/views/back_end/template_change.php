<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order - Online | Change Password</title>
<link rel="stylesheet" href="<?php echo base_url();?>content-admin/css/style.css" type="text/css" />
<link href="<?php echo base_url();?>content-admin/css/datepicker-style.css" type="text/css" media="all" rel="stylesheet">
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>content-admin/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>content-admin/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>content-admin/css/ie7.css"/>
<![endif]-->
<script type="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery-1.2.1.pack.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery-1.8.2.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery-ui.min.js"></script>


<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery-ui-timepicker-addon.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/general.js"></script>

<link rel="stylesheet" media="screen" href="<?php echo base_url();?>content-admin/css/validationEngine.jquery.css"/>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery.validationEngine-vi.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery.validationEngine.js"></script>

<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
</script>
<script src="<?php echo base_url();?>content-admin/js/jquery.smartTab.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>content-admin/js/jquery.popupWindow.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/dashboard.js"></script>


<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body class="loggedin">
    <!-- START OF HEADER -->
    <div class="header radius3">
        <?php $this->load->view('back_end/header_change');?>
    </div>
     <!-- END OF HEADER -->
     
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
        <div class="mainwrapperinner">
           
            <div class="maincontent noright">
                <div class="maincontentinner">
                    <?php $this->load->view($view);?>
                </div><!--maincontentinner-->       
                <div class="footer">
                    <?php $this->load->view('back_end/footer');?>
                </div><!--footer-->
            </div>            
        </div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
    <!-- END OF MAIN CONTENT -->
</body>
</html>
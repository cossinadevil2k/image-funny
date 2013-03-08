<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net| Tạo khung ảnh</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/frame.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/libs/jquery.mCustomScrollbar.css">
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mCustomScrollbar.js"></script>
        <script>
            $(document).ready(function(){
                $("#Pattern").mCustomScrollbar({
                    horizontalScroll:true,
                    autoHideScrollbar: false
                });
            });
        </script>
    </head>
    <body>
        <div class="Form"> 
            <div class="Header">
                <a href="home" class="Logo"><img src="<?php echo base_url() ?>images/common/logo.png" width="100%"/></a>
                <div><a href="frame.php" class="FrameHeader"><img src="<?php echo base_url() ?>images/home/home_disable.png" width="100%"/></a></div>
                <div><a href="frame.php" class="FrameHeader"><img src="<?php echo base_url() ?>images/frame/frame_enable.png" width="100%"/></a></div>
                <div><a href="frame.php" class="FrameHeader"><img src="<?php echo base_url() ?>images/effect/effect_disable.png" width="100%"/></a></div>
            </div>
            <div class="MainContent">
                <div class="Line"></div>
                <div class="FrameContent">
                    <div class="Left">
                        <ul style="list-style-type: none">
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/art.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/art.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/art.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/art.png" width="100%"/></div>
                            </li>                            
                        </ul>
                    </div>
                    <div class="Center">
                        
                    </div>
                    <div class="Right">
                        <ul style="list-style-type: none">
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/facebook.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/twitter.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/google.png" width="100%"/></div>
                            </li>  
                        </ul>
                    </div>
                    <div id="Pattern">
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                        <div class="PatternImage"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                    </div>
                </div>
            </div>            
            <div class="Footer">

            </div>
        </div>        
    </body>
</html>

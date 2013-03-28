<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net| Tạo khung ảnh</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/frame.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/libs/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/helpers/jquery.fancybox-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>jcrop/css/jquery.Jcrop.css" />
        
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script>
            var base_url = '<?php echo base_url();?>';
            var selected_id = '<?php if (isset($selected_frame)) echo $selected_frame->id?>';
        </script>
        <script type="text/javascript" src="<?php echo base_url()?>jcrop/js/jquery.Jcrop.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.iframe-transport.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.fileupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>fancybox/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>fancybox/helpers/jquery.fancybox-buttons.js"></script> 
        <script type="text/javascript" src="<?php echo base_url()?>js/frame.js"></script>     
        <script language="javascript" src="<?php echo base_url(); ?>js/common.js"></script>
    </head>
    <body>
        <div class="Form"> 
            <div class="Header">
                <a href="/trang-chu" class="Logo"><img src="<?php echo base_url() ?>images/common/logo.png" width="100%"/></a>
                <div class="HeaderMenu">
                    <div class="MenuPuzzle">
                        <a href="/trang-chu"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label link="/trang-chu">Trang chủ</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label link="/tao-khung">Tạo khung</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung/facebook-cover"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText Enable"><label link="/tao-khung/facebook-cover">Facebook cover</label></div>
                    </div>
                </div>                
            </div>
            <div class="MainContent">
                <div class="Line"></div>
                <div class="FrameContent">
                    <div class="Center Facebook">
                        <?php if (isset($selected_frame)):?>
                        <img id="selected_frame" frame_id="<?php echo $selected_frame->id?>" src="<?php echo base_url().$selected_frame->link;?>" width="850px" height="315px"/>
                        <?php endif;?>
                    </div>
                    <div class="Right RightF">
                        <ul style="list-style-type: none">
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
                            </li>
                            <li>
                                <div><img src="<?php echo base_url()?>images/frame/facebook.png" width="100%"/></div>
                            </li>
                        </ul>
                    </div>
                    <div id="choosePhoto">
                        <div id="Pattern">
                            <?php foreach ($frame_list as $frame):?>
                            <div frame_id ="<?php echo $frame->id?>" link="<?php echo $frame->link;?>" id="PatternImage<?php echo $frame->id?>" class="PatternImageF PatternImage<?php if ($frame->id == $selected_frame->id) {
                                echo " Selected";
                            }?>">
                                <img src="<?php echo base_url().$frame->pattern;?>" width="100%">
                                <?php foreach ($frame_detail_list as $frame_details):?>
                                    <?php foreach ($frame_details as $frame_detail):?>
                                        <?php if ($frame_detail->frame_id == $frame->id):?>
                                            <input type="hidden" id="frame<?php echo $frame_detail->id?>" x="<?php echo $frame_detail->x?>" y="<?php echo $frame_detail->y?>"/>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <?php endforeach;?>
                            </div>
                            <?php endforeach;?>                       
                        </div>
                    </div>
                    <div id="Next" class="NaviF">
                        <img src="<?php echo base_url()?>images/frame/next.png"/>
                    </div>
                    <div id="Previous" class="NaviF">
                        <img src="<?php echo base_url()?>images/frame/previous.png"/>
                    </div>
                    <div id="cropDiv" style="display: none; width: 720px;">
                        <img src="" width="100%" id="target"/>
                        <input type="hidden" id="x"/>
                        <input type="hidden" id="y"/>
                        <input type="hidden" id="w"/>
                        <input type="hidden" id="h"/>
                        <a id="selectBtn" class="fancybox-buttons" href="#" style="position: absolute; top:10px; z-index: 1000">Chọn</a>
                    </div>
                </div>
            </div>            
            <input id="fileupload" type="file" name="files[]" data-url="<?php echo base_url()?>/tao-khung/upload" multiple style="display: none;">
            <div class="Footer">

            </div>
        </div>        
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net| Tạo khung ảnh</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/frame.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/libs/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>uploadifive/uploadifive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/helpers/jquery.fancybox-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>jcrop/css/jquery.Jcrop.css" />
        
        <!--<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.0.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script>
            var base_url = '<?php echo base_url();?>';
            var selected_id = '<?php if (isset($selected_frame)) echo $selected_frame->id?>';
        </script>        
        <script type="text/javascript" src="<?php echo base_url()?>jcrop/js/jquery.Jcrop.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>fancybox/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>fancybox/helpers/jquery.fancybox-buttons.js"></script> 
        <script type="text/javascript" src="<?php echo base_url()?>uploadifive/jquery.uploadifive.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/frame.js"></script>        
    </head>
    <body>
        <div class="Form"> 
            <div class="Header">
                <a href="/trang-chu" class="Logo"><img src="<?php echo base_url() ?>images/common/logo.png" width="100%"/></a>
                <div class="HeaderMenu">
                    <div class=""><a href="/trang-chu"><img src="<?php echo base_url() ?>images/home/home_disable.png" width="100%"/></a></div>
                    <div class=""><a href="/tao-khung"><img src="<?php echo base_url() ?>images/frame/frame_disable.png" width="95%"/></a></div>
                    <div class=""><a href="#"><img src="<?php echo base_url() ?>images/effect/effect_disable.png" width="100%"/></a></div>
                </div>                
            </div>
            <div class="MainContent">
                <div class="Line"></div>
                <div class="FrameContent">
                    <div class="Left">
                        <ul style="list-style-type: none">
                            <?php $i = 0;?>
                            <?php foreach ($category_arr as $category):?>
                                <?php $i++;?>
                                <li>
                                    <div class="Category <?php if ((isset($category_enable)) && ($category_enable == $category['id'])) echo "Enable"?>" id="<?php echo $category['id'];?>">
                                        <img src="<?php echo base_url()?>images/frame/category<?php echo $i?>.png" width="100%"/>
                                        <label><?php echo $category['name']?></label>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="Center">
                        <?php if (isset($selected_frame)):?>                        
                            <img id="selected_frame" frame_id="<?php echo $selected_frame->id?>" src="<?php echo base_url().$selected_frame->link;?>" width="720px" height="405px" />
                            <input type="file" name="file_upload" id="file_upload" />
                            
                        <?php endif;?>
                    </div>
                    <div class="Right">
                        <ul style="list-style-type: none">
                            <li>
                                <div id="download"><img src="<?php echo base_url()?>images/frame/download.png" width="100%"/></div>
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
                        <?php foreach ($frame_list as $frame):?>
                        <div frame_id ="<?php echo $frame->id?>" id="PatternImage<?php echo $frame->id?>" class="PatternImage<?php if ($frame->id == $selected_frame->id) {
                            echo " Selected";
                        }?>">
                            <img src="<?php echo base_url().$frame->pattern;?>" width="100%" image_w="<?php echo $frame->width?>" image_h="<?php echo $frame->height?>">
                            <?php foreach ($frame_detail_list as $frame_details):?>
                                <?php foreach ($frame_details as $frame_detail):?>
                                    <?php if ($frame_detail->frame_id == $frame->id):?>
                                        <input type="hidden" x="<?php echo $frame_detail->x?>" y="<?php echo $frame_detail->y?>" aspect="<?php echo $frame_detail->width/$frame_detail->height?>"/>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </div>
                        <?php endforeach;?>                       
                    </div>
                    <div id="Next">
                        <img src="<?php echo base_url()?>images/frame/next.png"/>
                    </div>
                    <div id="Previous">
                        <img src="<?php echo base_url()?>images/frame/previous.png"/>
                    </div>
                    <div id="cropDiv" style="display: none; max-height: 610px; max-height: 400px">
                        <img src="" id="target"/>                    
                        <div id="selectBtn" class="fancybox-buttons" href="#" style="position: absolute; top:10px; z-index: 1000">Chọn</div>
                    </div>
                    <input type="hidden" id="x"/>
                    <input type="hidden" id="y"/>
                    <input type="hidden" id="w"/>
                    <input type="hidden" id="h"/>
                </div>
            </div>      
            <input id="fileupload" type="file" name="files[]" data-url="/tao-khung/upload" multiple>
            <div class="Footer">
                
            </div>
        </div>        
    </body>
</html>

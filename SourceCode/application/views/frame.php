<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net| Tạo khung ảnh</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/frame.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/libs/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>uploadify/uploadify.css" />
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mCustomScrollbar.js"></script>
        <script>
            var base_url = '<?php echo base_url();?>';
        </script>
        <script type="text/javascript" src="<?php echo base_url()?>uploadify/jquery.uploadify.js"></script>
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
                        <img id="selected_frame" frame_id="<?php echo $selected_frame->id?>" src="<?php echo base_url().$selected_frame->link;?>" width="720px" height="405px"/>
                            <input type="file" name="file_upload" id="file_upload" />
                        <?php endif;?>
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
                        <?php foreach ($frame_list as $frame):?>
                        <div class="PatternImage <?php if ($frame->id == $selected_frame->id) {
                            echo "Selected";
                        }?>"><img src="<?php echo base_url().$frame->pattern;?>" width="100%"></div>
                        <?php endforeach;?>                       
                    </div>
                    <div id="Next">
                        <img src="<?php echo base_url()?>images/frame/next.png"/>
                    </div>
                    <div id="Previous">
                        <img src="<?php echo base_url()?>images/frame/previous.png"/>
                    </div>
                </div>
            </div>            
            <div class="Footer">

            </div>
        </div>        
    </body>
</html>

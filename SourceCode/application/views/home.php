<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net| Trang Chủ</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/home.css">
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/home.js"></script>
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
                <div class="HomeContent">
                    <?php foreach ($category_arr as $category):?>
                        <div class="Category">
                            <div class="CategoryTitle">
                                <img src="<?php echo base_url() ?>images/home/category_title.png"/>
                                <label><?php echo $category['name']; ?></label>
                            </div>
                            <div class="More">
                                <img src="<?php echo base_url()?>images/home/button_more.png"/>
                            </div>
                            <div class="Pattern">
                                <table id="gallery" cellspacing="20" cellpadding="0">
                                    <tbody>
                                        <tr class="rowa">
                                            <?php foreach ($category['frames'] as $frame):?>
                                            <td class="PatternImage">
                                                <a href="<?php echo base_url('tao-khung/'.$category['id'].'/'.$frame->id)?>"><img src="<?php echo base_url().$frame->pattern ?>" width="100%"/></a>
                                            </td>
                                            <?php endforeach;?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                  
                        </div>
                    <?php endforeach;?>     
                </div>
            </div>
            <div class="RightContent">

            </div>
            <div class="Footer">

            </div>
        </div>        
    </body>
</html>

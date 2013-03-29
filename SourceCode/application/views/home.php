<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tạo Ảnh.Net | Trang Chủ</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/libs/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/home.css">
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/common.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/home.js"></script>
    </head>
    <body> 
        <div class="Form"> 
            <div class="Header">
                <a href="/trang-chu" class="Logo"><img src="<?php echo base_url() ?>images/common/logo.png" width="100%"/></a>
                <div class="HeaderMenu">
                    <div class="MenuPuzzle">
                        <a href="/trang-chu"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText Enable"><label link="/trang-chu">Trang chủ</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label link="/tao-khung">Tạo khung</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung/facebook-cover"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label link="/tao-khung/facebook-cover">Facebook cover</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung/hieu-ung"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label link="/tao-khung/hieu-ung">Hiệu ứng</label></div>
                    </div>
                </div>                
            </div>
            <div class="MainContent">
                <div class="Line"></div>
                <div class="HomeContent">
                    <?php foreach ($category_arr as $category):?>
                        <div class="Category" cat_id ="<?php echo $category['id'];?>" offset="<?php echo isset($category['offset'])? $category['offset'] :  0?>">
                            <div class="CategoryTitle">
                                <img src="<?php echo base_url() ?>images/home/category_title.png"/>
                                <label><?php echo $category['name']; ?></label>
                            </div>
                            <div class="Pattern ">
                                <div class="Gallery">
                                    <?php if (!empty($category['frame_list'])):?>
                                        <?php foreach ($category['frame_list'] as $frame):?>
                                                <div class="PatternImage">
                                                    <a href="<?php echo base_url('tao-khung/'.$category['id'].'/'.$frame->id)?>"><img src="<?php echo base_url().$frame->pattern ?>" width="100%"/></a>
                                                </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
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

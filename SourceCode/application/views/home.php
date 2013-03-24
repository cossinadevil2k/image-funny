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
                    <div class="MenuPuzzle Enable">
                        <a href="/trang-chu"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText Enable"><label>Trang chủ</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label>Tạo khung</label></div>
                    </div>
                    <div class="MenuPuzzle">
                        <a href="/tao-khung/facebook-cover"><img src="<?php echo base_url() ?>images/common/menu_puzzle.png" width="80%"/></a>
                        <div class="MenuText"><label>Facebook cover</label></div>
                    </div>
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

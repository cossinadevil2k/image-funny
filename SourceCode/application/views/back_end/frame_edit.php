<link rel="stylesheet" href="<?php echo base_url();?>content-admin/css/frame_add.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.fileupload.js"></script>
<script>
    var base_url = '<?php echo base_url();?>';
</script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/frame_add.js"></script>
<input id="fileupload" type="file" name="files[]" data-url="<?php echo base_url()?>/admin/frames/upload" multiple style="display: none;">
<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url(); ?>admin/frames">Tất cả khung ảnh</a></li>
    <li class="current"><a href="<?php echo base_url(); ?>admin/frames/add">Cập nhật khung ảnh</a></li>    
</ul>
<div class="content">    
    <form method="post" action="<?php echo base_url(); ?>admin/frames/edit" class="stdform" id="formID">
        <div class="edit-main">             
            <div id="wizard" class="wizard post-lang">                               
                <div class="stepContainer">       
                    <input type="hidden" name="id" value="<?php echo $frame->id; ?>">
                    <p><label>Thể loại khung ảnh:</label></p>
                    <p>
                        <select name="ddlCat" class="longinput" style="width: 97%" id="ddlCat">                        
                            <option value="0">-- Chưa chọn thể loại --</option>                        
                            <?php
                            foreach ($lstCategory as $category) {
                                ?>
                                <option <?php if($category->id==$frame->category_id) echo 'selected="selected"' ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <?php foreach ($lstCategory as $category):?>
                            <input type="hidden" id="cate<?php echo $category->id; ?>" path="<?php echo $category->path; ?>"/>
                        <?php endforeach;?>
                    </p>
                    <br>
                    <p><label>Tên khung ảnh:</label></p>
                    <p>
                        <span class="field">
                            <input type="text" value="<?php echo $frame->name; ?>" 
                                   class="longinput validate[required]" name="txtName">
                        </span>
                    </p>
                    </br>
                    <p><label>Mô tả:</label></p>                            
                    <p>
                        <span class="field">
                            <textarea name="txtDescription" class="validate[required]"><?php echo $frame->description; ?></textarea>
                        </span>
                    </p>
                    </br>
                    <p><label>Link khung:</label></p>                            
                    <p>
                        <input type="text" value="<?php echo $frame->link; ?>" readonly="readonly" class="longinput" name="txtLink" id="txtLink">                        
                    </p>            
                    <div id="btnLink" class="UploadBtn">Upload Ảnh</div>
                    </br>
                    <p><label>Link ảnh mẫu:</label></p>                            
                    <p>
                        <input type="text" value="<?php echo $frame->pattern; ?>" readonly="readonly" class="longinput" name="txtPattern" id
                               ="txtPattern">
                        
                    </p>          
                    <div id="btnPattern" class="UploadBtn">Upload Ảnh</div>
                    </br>         
                </div>                
            </div>    
            <div class="seo-packages widgetbox" id="parameter_frame">
                <div class="contenttitle">
                    <h2 class="form">
                        <span>Thông số khung ảnh                             
                        </span>                                               
                    </h2>                    
                </div>      

                <div class="seo-packages widgetcontent">
                    <?php
                    $x = '';
                    $y = '';
                    $xc = '';
                    $yc = '';
                    $width = '';
                    $height = '';
                    $degree = '';
                    foreach ($frame_details as $item) {
                        $x .= $item->x . ';';
                        $y .= $item->y . ';';
                        $xc .= $item->xc . ';';
                        $yc .= $item->yc . ';';
                        $width .= $item->width . ';';
                        $height .= $item->height . ';';
                        $degree .= $item->degree . ';';
                    }
                    $x = rtrim($x, ';');
                    $y = rtrim($y, ';');
                    $xc = rtrim($xc, ';');
                    $yc = rtrim($yc, ';');
                    $width = rtrim($width, ';');
                    $height = rtrim($height, ';');
                    $degree = rtrim($degree, ';');
                    ?>
                    <p>
                        <label></label>
                        <span>Các thông số theo định dạng XXX<b> ; </b>X<sup>1</sup>X<sup>1</sup>X<sup>1</sup><b> ; </b>X<sup>2</sup>X<sup>2</sup>X<sup>2</sup></span>
                    </p>
                    <br>
                    <p>                        
                        <label>X</label>
                        <span class="field small-form">
                            <input name="txtX" value="<?php echo $x;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>  
                    <br>
                    <p>                        
                        <label>Y</label>
                        <span class="field small-form">
                            <input name="txtY" value="<?php echo $y;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>X (Tâm)</label>
                        <span class="field small-form">
                            <input name="txtXC" value="<?php echo $xc;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>Y (Tâm)</label>
                        <span class="field small-form">
                            <input name="txtYC" value="<?php echo $yc;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>Width</label>
                        <span class="field small-form">
                            <input name="txtWidth" value="<?php echo $width;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                    <br>
                    <p>                        
                        <label>Height</label>
                        <span class="field small-form">
                            <input name="txtHeight" value="<?php echo $height;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                    <br>
                    <p>                        
                        <label>Degrees</label>
                        <span class="field small-form">
                            <input name="txtDegree" value="<?php echo $degree;?>" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                </div>
            </div>
            <p class="stdformbutton" style="float: right;margin-right: 50px;">
                <button class="submit radius2" style="background-color: #51A351; border: none;">Cập nhật khung ảnh</button>
                <input type="reset" value="Hủy" class="reset radius2">
            </p>
        </div>        
    </form>              
</div><!--content-->

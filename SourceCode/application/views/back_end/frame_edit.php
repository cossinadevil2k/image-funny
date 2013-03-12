
<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url(); ?>admin/frames">Tất cả khung ảnh</a></li>
    <li class="current"><a href="<?php echo base_url(); ?>admin/frames/add">Cập nhật khung ảnh</a></li>    
</ul>
<div class="content">    
    <form method="post" action="<?php echo base_url(); ?>admin/frames/edit" class="stdform" id="formID">
        <div class="edit-main">             
            <div id="wizard" class="wizard post-lang">                               
                <div class="stepContainer">       
                    <input type="hidden" name="id" value="<?php echo $frame->id;?>">
                    <p><label>Tên khung ảnh:</label></p>
                    <p>
                        <span class="field">
                            <input type="text" value="<?php echo $frame->name;?>" 
                                   class="longinput validate[required]" name="txtName">
                        </span>
                    </p>
                    </br>
                    <p><label>Mô tả:</label></p>                            
                    <p>
                        <span class="field">
                            <textarea name="txtDescription" class="validate[required]"><?php echo $frame->description;?></textarea>
                        </span>
                    </p>
                    </br>
                    <p><label>Link ảnh:</label></p>                            
                    <p>
                        <input type="text" value="<?php echo $frame->link;?>"
                               readonly="readonly" class="longinput" name="txtLink">
                    </p>            
                    </br>        
                </div>
            </div>
        </div>
        <div class="edit-right">
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Thêm khung ảnh</span></h2></div>
                <div class="widgetcontent" style="display: block;">                                  
                    <p class="stdformbutton">
                        <button class="submit radius2">Cập nhật khung ảnh</button>
                        <input type="reset" value="Hủy" class="reset radius2">
                    </p>
                </div><!--widgetcontent-->
            </div>        
             <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Chọn thể loại</span></h2></div>
                <div class="widgetcontent" style="display: block;">                   
                    <select name="ddlCat" style="width: 100%;">                        
                        <option value="0">-- Chưa chọn thể loại --</option>                        
                        <?php                         
                        foreach ($lstCategory as $category)
                        {
                        ?>
                        <option <?php if($category->id==$frame->category_id) echo "selected='selected'" ?> 
                            value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>  
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Khung ảnh</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" value="<?php echo $frame->link;?>" id="featured_image" name="hdffeatured_image" >
                    <img src="<?php echo $frame->link;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                    <button id="imageUpload" class="submit radius2" >Chọn khung ảnh</button>
                </div>
            </div>
        </div>
    </form>              
</div><!--content-->

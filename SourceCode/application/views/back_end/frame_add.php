<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url(); ?>admin/frames">Tất cả khung ảnh</a></li>
    <li class="current"><a href="<?php echo base_url(); ?>admin/frames/add">Thêm mới khung ảnh</a></li>    
</ul>
<div class="content">    
    <form method="post" action="<?php echo base_url(); ?>admin/frames/add" class="stdform" id="formID">
        <div class="edit-main">             
            <div id="wizard" class="wizard post-lang">                               
                <div class="stepContainer">                                        
                    <p><label>Tên khung ảnh:</label></p>
                    <p>
                        <span class="field">
                            <input type="text" class="longinput validate[required]" name="txtName">
                        </span>
                    </p>
                    </br>
                    <p><label>Mô tả:</label></p>                            
                    <p>
                        <span class="field">
                            <textarea name="txtDescription" class="validate[required]"></textarea>
                        </span>
                    </p>
                    </br>
                    <p><label>Link khung:</label></p>                            
                    <p>
                        <input type="text" readonly="readonly" class="longinput" name="txtLink">
                    </p>            
                    </br>
                    <p><label>Link ảnh mẫu:</label></p>                            
                    <p>
                        <input type="text" readonly="readonly" class="longinput" name="txtPattern">
                    </p>            
                    </br> 
                </div>
            </div>
            <div class="seo-packages widgetbox" id="parameter_frame">
                <div class="contenttitle">
                    <h2 class="form">
                        <span>Thông số khung ảnh 
                            <button id="btnAdd" type="button" style="float: right; padding-bottom: 6px; margin-top: -5px;">Thêm thông số</button>
                        </span>                                               
                    </h2>                    
                </div>      
                
                <div class="seo-packages widgetcontent">
                    <p>                        
                        <label>X</label>
                        <span class="field small-form">
                            <input name="txtX[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>  
                    <br>
                    <p>                        
                        <label>Y</label>
                        <span class="field small-form">
                            <input name="txtY[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>X (Tâm)</label>
                        <span class="field small-form">
                            <input name="txtXC[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>Y (Tâm)</label>
                        <span class="field small-form">
                            <input name="txtYC[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>
                    <br>
                    <p>                        
                        <label>Width</label>
                        <span class="field small-form">
                            <input name="txtWidth[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                    <br>
                    <p>                        
                        <label>Height</label>
                        <span class="field small-form">
                            <input name="txtHeight[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                    <br>
                    <p>                        
                        <label>Degrees</label>
                        <span class="field small-form">
                            <input name="txtDegree[]" class="smallinput validate[required]" type="text" value="">
                        </span>                                            
                    </p>   
                </div>
            </div>
        </div>
        <div class="edit-right">
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Thêm khung ảnh</span></h2></div>
                <div class="widgetcontent" style="display: block;">                                  
                    <p class="stdformbutton">
                        <button class="submit radius2" style="background-color: #51A351; border: none;">Thêm khung ảnh</button>
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
                        foreach ($lstCategory as $category) {
                            ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>  
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Khung ảnh</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image" name="hdffeatured_image" >
                    <img src="" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                    <button id="imageUpload" class="submit radius2" >Chọn khung ảnh</button>
                </div>
            </div>
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Khung ảnh mẫu</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image_patern" name="hdffeatured_image_patern" >
                    <img src="" id="featured_image_src_patern" width="100%" height="auto" style="margin-bottom:10px;" />
                    <button id="imageUpload_patern" class="submit radius2" >Chọn khung ảnh</button>
                </div>
            </div>
        </div>
    </form>              
</div><!--content-->

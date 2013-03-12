<ul class="maintabmenu multipletabmenu">            
    <li class="current">
        <a href="<?php echo base_url(); ?>admin/category">Danh mục khung ảnh</a>
    </li>        
</ul>
<div class="content">                	
    <div class="edit-left">
        <form action="<?php echo base_url(); ?>admin/category" method="post" 
              accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Tên danh mục:</label></p>
            <p>
                <span class="field">
                    <input name="txtname" value="" id="txtname" 
                           class="longinput validate[required]" type="text">
                </span>
            </p>
            <br>            
            <p><label>Mô tả:</label></p>                            
            <p>
                <span class="field"><textarea name="txtdescription"></textarea></span>
            </p>                        
            <br>
            <p class="stdformbutton">
                <input name="submit" value="Thêm mới" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        
    </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh mục khung ảnh</span></h2>
        </div>
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" 
                    value="<?php echo base_url(); ?>admin/category/delete" 
                    title="table2">Delete Selected</button> &nbsp;
        </div>
        <table id="table2" class="stdtable stdtablecb" border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
            </colgroup>
            <thead>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên danh mục</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên danh mục</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach ($lstCategories as $item) {
                    ?>
                    <tr>
                        <td class="center"><input value="<?php echo $item->id; ?>" type="checkbox"></td>
                        <td>
                            <?php
                            echo $item->name;
                            ?>
                        </td>
                        <td><?php echo $item->description; ?></td>
                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url(); ?>admin/category/edit/<?php echo $item->id; ?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $item->id; ?>" name="delete" title="Xóa danh mục" href="<?php echo base_url(); ?>admin/category/delete">Xóa</a></td>
                    </tr>   
                <?php } ?>
            </tbody>

        </table>
        <?php echo $list_link; ?>
    </div>                                  
</div><!--content-->                

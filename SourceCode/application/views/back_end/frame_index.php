<ul class="maintabmenu multipletabmenu">        
    <li  class="current"><a href="<?php echo base_url(); ?>frames">Tất cả khung ảnh</a></li>
    <li><a href="<?php echo base_url(); ?>frames/add">Thêm mới khung ảnh</a></li>    
</ul>        
     
<div class="content">
        <h1 id="ajaxtitle"></h1>                       	                            
    <div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Danh sách khung ảnh</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">
        <form name="frmfilter" method="post" action="<?php echo base_url();?>frames/index/" >                        	
            <button class="deletebutton radius3" title="table2" value="<?php echo base_url();?>frames/delete">Delete Selected</button> &nbsp;               
                       
            <input type="text" value="<?php if($key_word!='~')echo $key_word;?>" name="txtKeyWord" class="input-keyword">&nbsp;
           
            <input type="submit" class="btn" value="Tìm kiếm"/>
        </form>
    </div><!--tableoptions-->	
    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
        <colgroup>
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />            
        </colgroup>
        <thead>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1" width="250">Tên khung ảnh</th>                                
                <th class="head0">Mô tả</th>        
                <th class="head1">Link</th>    
                <th class="head0">Thể loại</th>
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1" width="250">Tên khung ảnh</th>                                
                <th class="head0">Mô tả</th>        
                <th class="head1">Link</th>    
                <th class="head0">Thể loại</th>
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>                               	
            <?php 
                foreach ($lstFrame as $frame)
                {
            ?>
            <tr>
                <td class="center"><input value="<?php echo $frame->id;?>" type="checkbox"></td>
                <td><?php echo $frame->name;?></td>
                <td><?php echo $frame->description;?></td>
                <td>
                    <a href="<?php echo $frame->link;?>"><?php echo $frame->link;?></a>
                </td>    
                <td>
                    <?php 
                    $cat = $this->Category_model->get($frame->category_id);
                    if(count($cat)>0)
                    {
                        echo $cat[0]->name;
                    }
                    ?>                    
                </td>
                <td class="center">
                    <a class="edit" href="<?php echo base_url();?>frames/edit/<?php echo $frame->id;?>">Sửa</a> &nbsp; 
                    <a class="delete" id="<?php echo $frame->id;?>" href="<?php echo base_url();?>frames/delete">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>    
    <?php echo $list_link;?>
</div><!--content-->
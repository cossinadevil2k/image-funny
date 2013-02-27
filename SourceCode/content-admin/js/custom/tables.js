jQuery(document).ready(function(){
    jQuery("#addTagLink").click(function(){
            if(jQuery("#tag-list").hasClass('toggleshow'))
            {
                jQuery("#tag-list").show('slow');
                jQuery("#tag-list").removeClass('toggleshow');
            }
            else
            {
                jQuery("#tag-list").hide('slow');
                jQuery("#tag-list").addClass('toggleshow');
            }
            return false;
        });

	jQuery('.stdtablecb .checkall').click(function(){
		var parentTable = jQuery(this).parents('table');										   
		var ch = parentTable.find('tbody input[type=checkbox]');										 
		if(jQuery(this).is(':checked')) {
		
			//check all rows in table
			ch.each(function(){ 
				jQuery(this).attr('checked',true);
				jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').addClass('selected');
			});
						
			//check both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',true); });
		
		} else {
			
			//uncheck all rows in table
			ch.each(function(){ 
				jQuery(this).attr('checked',false); 
				jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').removeClass('selected');
			});	
			
			//uncheck both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',false); });
		}
	});
	
	
	jQuery('.stdtablecb tbody input[type=checkbox]').click(function(){
		if(jQuery(this).is(':checked')) {
			jQuery(this).parents('tr').addClass('selected');	
		} else {
			jQuery(this).parents('tr').removeClass('selected');
		}
	});
	
	//delete selected row in table
	jQuery('.deletebutton').click(function(){		
		var url = jQuery(this).attr('value');		
		var p_method = jQuery(this).attr('name');
		var id = '';
		var tb = jQuery(this).attr('title');							// get target id of table								   
		var sel = false;											//initialize to false as no selected row
		var ch = jQuery('#'+tb).find('tbody input[type=checkbox]');		//get each checkbox in a table
		//check if there is/are selected row in table
		ch.each(function(){
			if(jQuery(this).is(':checked')) {
				sel = true;
				id = jQuery(this).attr('value');
				jQuery.post(url,{method:p_method,param:id},function(data) {
					//alert(data);				
				});
				jQuery(this).parents('tr').fadeOut(function(){
					jQuery(this).remove();							//remove row when animation is finished
				});
			}
		});
		
		if(!sel) alert('No data selected');							//alert to no data selected
	});
	
	
	//delete individual row
	jQuery('.stdtable a.delete').click(function(){
		var c = confirm('Continue delete ?');
		if(c){
			var url = jQuery(this).attr('href');
			var id = jQuery(this).attr('id');
			
			jQuery.post(url,{param:id},function(data) {    });			
			jQuery(this).parents('tr').fadeOut(function(){ 
				jQuery(this).remove();
			});
		}
		return false;
	});
        
        jQuery(document).on("click",".deletebuttonchild",function(){		
		var url = jQuery(this).attr('value');             
                var parent = jQuery("#hdfID").attr('value');
		var id = '';
		var tb = jQuery(this).attr('title');							// get target id of table								   
		var sel = false;											//initialize to false as no selected row
		var ch = jQuery('#'+tb).find('tbody input[type=checkbox]');		//get each checkbox in a table
		//check if there is/are selected row in table
		ch.each(function(){
			if(jQuery(this).is(':checked')) {
				sel = true;
				id = jQuery(this).attr('value');
				jQuery.post(url,{parent:parent,child:id},function(data) {
					//alert(data);				
				});
				jQuery(this).parents('tr').fadeOut(function(){
					jQuery(this).remove();							//remove row when animation is finished
				});
			}
		});
		
		if(!sel) alert('No data selected');							//alert to no data selected
	});
	
	
	//delete individual row
	jQuery(document).on("click",".stdtable a.deletechild",function(){
		var c = confirm('Continue delete ?');
		if(c){
			var url = jQuery(this).attr('href');
			var child = jQuery(this).attr('id');
			var parent = jQuery("#hdfID").attr('value');
			jQuery.post(url,{child:child,parent:parent},function(data) {
                            
			});			
			jQuery(this).parents('tr').fadeOut(function(){ 
				jQuery(this).remove();
			});
		}
		return false;
	});
	
	//get data from server and inject it next to row
	jQuery('.stdtable a.toggle').click(function(){
												
		//show all hidden row and remove all showed data
		jQuery(this).parents('table').find('tr').each(function(){
			jQuery(this).removeClass('hiderow');
			if(jQuery(this).hasClass('togglerow'))
				jQuery(this).remove();
		});
		
		var parentRow = jQuery(this).parents('tr');
		var numcols = parentRow.find('td').length + 1;				//get the number of columns in a table. Added 1 for new row to be inserted				
		var url = jQuery(this).attr('href');
		
		//this will insert a new row next to this element's row parent
		parentRow.after('<tr class="togglerow"><td colspan="'+numcols+'"><div class="toggledata"></div></td></tr>');
		
		var toggleData = parentRow.next().find('.toggledata');
		
		parentRow.next().hide();
		
		//get data from server
		jQuery.post(url,function(data){
			toggleData.append(data);						//inject data read from server
			parentRow.next().fadeIn();						//show inserted new row
			parentRow.addClass('hiderow');					//hide this row to look like replacing the newly inserted row
		});
				
		return false;
	});
		
	jQuery('.toggledata button.cancel, .toggledata button.submit').live('click',function(){
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');															 
			jQuery(this).parents('tr').remove();
		});
		return false;
	});
	
	
	jQuery('#dyntable').dataTable( {
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "http://localhost/butdanh/application/models/server_processing.php"
	});
	
	
	//for checkbox
	/*jQuery('input[type=checkbox]').each(function(){
		var t = jQuery(this);
		t.wrap('<span class="checkbox"></span>');
		t.click(function(){
			if(jQuery(this).is(':checked')) {
				t.attr('checked',true);
				t.parent().addClass('checked');
			} else {
				t.attr('checked',false);
				t.parent().removeClass('checked');
			}
		});
	});*/

});
function delete_object(ur,p_method,id){
	jQuery(document).ready(function(){
		
	});		
	jQuery.post(url,{method:p_methor,param:id},function(data) {
		//alert(data);				
	});	
	return true;
}
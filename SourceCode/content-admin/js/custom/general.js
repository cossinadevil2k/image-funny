jQuery.noConflict();

jQuery(document).ready(function(){
    jQuery(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    var lang_num = 0;
    if(jQuery('#txtLangNum').length>0)
    {
        lang_num = jQuery('#txtLangNum').attr('value');
    }
        
    jQuery('#wizard').smartTab({
        selected: lang_num,  // Selected Tab, 0 = first step   
        keyNavigation:false, // Enable/Disable key navigation
        autoProgress:false, // Auto navigate tabs on interval
        progressInterval: 3500, // Auto navigate Interval
        stopOnFocus:false, // Stops autoProgress on mouse hover and restarts when not
        transitionEffect:'none' // Effect on navigation, none/fade/slide
                
    }            
    );
    function onFinishCallback(){
        alert('Finish Clicked');
    }
	
    //Brow server image upload	
    jQuery('#imageUpload').popupWindow({ 
        windowURL:'/ImageFunny/elfinder/standalone-elfinder.php?mode=image', 
        windowName:'Filebrowser',
        height:490, 
        width:950,
        centerScreen:1
    });
	
    if(jQuery(".datetimepicker").length>0){
        //alert("fadfsdaf");
        jQuery(".datetimepicker").datetimepicker(
        { 
            dateFormat: 'dd-mm-yy',
            timeFormat: 'hh:mm:ss',
            separator: ' '               
        }
        );
    }
        
    if(jQuery(".datetimepicker2").length>0){
        //alert("fadfsdaf");
        jQuery(".datetimepicker2").datetimepicker(
        { 
            dateFormat: 'dd-mm-yy',
            timeFormat: 'hh:mm:ss',
            separator: ' '               
        }
        );
    }
        
    /******************************/
    var now = new Date();       
    var month=new Array();
    month[0]="01";
    month[1]="02";
    month[2]="03";
    month[3]="04";
    month[4]="05";
    month[5]="06";
    month[6]="07";
    month[7]="08";
    month[8]="09";
    month[9]="10";
    month[10]="11";
    month[11]="12";
    var n = month[now.getMonth()];
    jQuery('#txtDateEnd').val(now.getDate()+'-'+n+'-'+now.getFullYear()+' '+now.getHours()+':'+now.getMinutes()+':'+now.getSeconds());
    jQuery('#txtDateStart').val(now.getDate()+'-'+n+'-'+now.getFullYear()+' '+now.getHours()+':'+now.getMinutes()+':'+now.getSeconds());
    /*******************************/
        
    jQuery(document).on("click","#btnAdd",function(){
        var content = "";
        content+="<div class='seo-packages widgetcontent'>";
        content+="	<p>                        ";
        content+="		<label>X</label>";
        content+="		<span class='field small-form'>";
        content+="			<input name='txtX[]' class='smallinput validate[required]' type='text' value=''>";
        content+="		</span>                                            ";
        content+="	</p>  ";
        content+="	<br>";
        content+="	<p>   ";                     
        content+="		<label>Y</label>";
        content+="		<span class='field small-form'>";
        content+="			<input name='txtY[]' class='smallinput validate[required]' type='text' value=''>";
        content+="		</span>                                            ";
        content+="	</p>";
        content+="	<br>";
        content+="	<p>   ";                     
        content+="		<label>Width</label>";
        content+="		<span class='field small-form'>";
        content+="			<input name='txtWidth[]' class='smallinput validate[required]' type='text' value=''>";
        content+="		</span>                                            ";
        content+="	</p>   ";
        content+="	<br>";
        content+="	<p>  ";                      
        content+="		<label>Height</label>";
        content+="		<span class='field small-form'>";
        content+="			<input name='txtHeight[]' class='smallinput validate[required]' type='text' value=''>";
        content+="		</span>                                            ";
        content+="	</p>   ";
        content+="	<br>";
        content+="	<p>   ";                     
        content+="		<label>Degrees</label>";
        content+="		<span class='field small-form'>";
        content+="			<input name='txtDegree[]' class='smallinput validate[required]' type='text' value=''>";
        content+="		</span>                          ";                  
        content+="	</p>   ";
        content+="</div>";
        
        jQuery("#parameter_frame").append(content);
        return false;
    });
        
    jQuery(document).on("click",".ntdelbutton",function(){
        var id = jQuery(this).attr('valuetag');
        var select = '#tag-num-'+id;
        jQuery(select).removeClass('added');
        jQuery(this).parent().remove();
            
        var lstTag = jQuery('#lstTagAdded').attr('value');               
        lstTag = lstTag.replace(','+id+',',',');
        jQuery('#lstTagAdded').val(lstTag);   
        return false;
    });
        
    jQuery('#btnAddTag').click(function(){
        var name = jQuery('#txtTag').val();
        var url = jQuery(this).attr('urllink');
        if(name!='')
        {
            jQuery.post(url,{
                name:name
            },function(data) {
                if(data.mess1!='')
                {
                    jQuery('.tagchecklist').append(data.mess1);
                    var lstTag = jQuery('#lstTagAdded').attr('value');               
                    jQuery('#lstTagAdded').val(lstTag+data.mess2+','); 
                    jQuery('#txtTag').val('');
                }
            },'json');
        }
            
        return false;
    });
        
    jQuery(document).on("click","#btnAddChildTask",function(){
        var url = jQuery(this).attr('urllink');
        var parent = jQuery("#hdfID").attr('value');
        var child = jQuery("#ddlAuth").val();
        var child_name = jQuery("#ddlAuth option:selected").text();
        var child_desc = jQuery("#ddlAuth option:selected").attr('title');
        var baselink = jQuery(this).attr('baselink');
        var type = jQuery(this).attr('typeauth');
            
        jQuery.post(url,{
            parent:parent,
            child:child
        },function(data) {
            if(data.indexOf("true") != -1)
            {
                var content = "";
                content+="<tr>";
                content+="	<td class='center'><input type='checkbox' value='"+child+"'></td>";
                content+="		<td>";
                content+="		"+child_name+"</td>";
                content+="		<td>"+child_desc+"</td>";
                content+="		<td class='center'>";                    
                content+="			<a href='"+baselink+"administrator/"+type+"/deletechild' title='Remove Child' name='delete' id='"+child+"' class='deletechild'>Remove</a>";
                content+="		</td>";
                content+="</tr>";
                jQuery("#tblChildTask #tbodyChildTask").append(content);
            }
        });
        return false;
    });   
    jQuery('.checkbox input[type=checkbox]').click(function(){
                    
        if(jQuery(this).is(':checked')) {
            jQuery(this).attr('checked',true);
            jQuery(this).parent().addClass('checked');
        } else {
            jQuery(this).attr('checked',false);
            jQuery(this).parent().removeClass('checked');
        }
    });
    /*---------------------End HungPV-------------------------------*/
    /*---------------------DucNN-------------------------------*/
       
    jQuery('#tabs_menu').smartTab({
        selected: 0,  // Selected Tab, 0 = first step   
        keyNavigation:true, // Enable/Disable key navigation
        autoProgress:false, // Auto navigate tabs on interval
        progressInterval: 3500, // Auto navigate Interval
        stopOnFocus:false, // Stops autoProgress on mouse hover and restarts when not
        transitionEffect:'none' // Effect on navigation, none/fade/slide
                
    }            
    );  
    jQuery('#tabs_menu1').smartTab({
        selected: 0,  // Selected Tab, 0 = first step   
        keyNavigation:true, // Enable/Disable key navigation
        autoProgress:false, // Auto navigate tabs on interval
        progressInterval: 3500, // Auto navigate Interval
        stopOnFocus:false, // Stops autoProgress on mouse hover and restarts when not
        transitionEffect:'none' // Effect on navigation, none/fade/slide
                
    }            
    );
    //Them mot custom link moi
    jQuery('#btn_add_custom_link').click(function(){
        var url = jQuery('#txt_url').val();
        var label = jQuery('#txt_label').val();
        var base_url = jQuery('#base_url').val();
        var object_id = jQuery('#object_id').val();
        //alert(url);
        jQuery('.menu_add_new').append(
            
            '<div class="widgetbox">'+
            '<form class="stdform" action="'+base_url+'administrator/menus/save_detail/'+object_id+'" method="post">'   
            +'<div class="title1"><h2 class="general"><span>'+label+ '<input type="text" name="order" class="order_menu" size="1" value="0"/></span></h2></div>'
            +'<div class="widgetcontent menu_detail">'
                    
            +   '<input type="hidden" name="id" class="smallinput" value="" />'
            +'</p><p><label>URL:</label>'
            + '<span class="field"><input type="text" name="url" class="smallinput" value="'+url+'"/></span>'
            +'</p><p><label>Label:</label>'
            +'<span class="field"><input type="text" name="label" class="smallinput" value="'+label+'" /></span>'
            +'<p><label>Status:</label>'
            +'<span class="field"><input type="text" name="status" class="smallinput" value="public"/></span>'
            +'</p><p><label>Parent:</label>'
            +'<span class="field"><input type="text" name="parent" class="smallinput" value="0"/></span>'                    
            +'</p><p><label>Title Attribute:</label>'
            +'<span class="field"><input type="text" name="title_attribute" class="smallinput" value="" /></span>'                    
            +'</p><p><label>Open link in a new window/tab:</label>'
            +'<input type="checkbox" name="open_link" value="1"  /> <br />'
            +'</p><p><label>CSS Class:</label>'
            +'<span class="field"><input type="text" name="css_class" class="smallinput" value=""/></span>'
            +'</p><input type="hidden" value="custom" name="type" /><input type="hidden" value="'+object_id+'" name="object_id" />'
            +'<p class="btn_menu">'
            +'<button class="submit radius2" name="submit">Save</button>'
            +'<input type="reset" class="reset radius2" value="Reset" />'
            +'<button id="btn_cancel" class="stdbtn btn_blue">Cancel</button>'
            +'</p></div></form></div>'
            );                                   
            
          
    }); 
    // an hien menu detail
    /* jQuery(document).on("toggle",".title1",function(){ 
            if(jQuery(this).attr("class")=="tamgiac arrow-up"){
    		   jQuery(this).removeClass("arrow-up");
    		   jQuery(this).addClass("arrow-down");
    	   }else{
    		   jQuery(this).removeClass("arrow-down");
    		   jQuery(this).addClass("arrow-up");
    	   }
    		   jQuery(this).next().slideToggle("500");
            jQuery('.widgetcontent').toggle();        
        },function(){
            if(jQuery(this).attr("class")=="tamgiac arrow-up"){
    			   jQuery(this).removeClass("arrow-up");
    			   jQuery(this).addClass("arrow-down");
    		   }else{
    			   jQuery(this).removeClass("arrow-down");
    			   jQuery(this).addClass("arrow-up");
    		   }
    		   jQuery(this).next().slideToggle("500");
        });*/
    jQuery('.menu_detail').hide();
    /**
 * jQuery('.title1').click(function() {
 *     	   
 *     		   jQuery(this).next().slideToggle("500");
 *     	});
 */
    jQuery(document).on("click",".title1",function(){
        jQuery(this).next().slideToggle("500");
    });
    // them moi mot category vao link
    jQuery('#btn_add_category').click(function(){								
        var id = '';
        var base_url = jQuery('#base_url').val();
        var object_id = jQuery('#object_id').val();							// get target id of table        								   
        var sel = false;											//initialize to false as no selected row
        var ch = jQuery('#tabs-11').find('input[type=checkbox]');		//get each checkbox in a table
        //check if there is/are selected row in table
        ch.each(function(){
            if(jQuery(this).is(':checked')) {
                sel = true;
                id = jQuery(this).attr('value');
                category_name = jQuery(this).attr('name'); 
                jQuery(this).attr('checked',false);
                jQuery('.menu_add_new').append(
            
                    '<div class="widgetbox" >'
                    +'<form class="stdform" action="'+base_url+'administrator/menus/save_detail/'+object_id+'" method="post">'   
                    +'<div class="title1"><h2 class="general"><span>'+category_name+ '<input type="text" name="order" class="order_menu" size="1" value="0"/></span></h2></div>'
                    +'<div class="widgetcontent " >'
                        
                    +   '<input type="hidden" name="id" class="smallinput" value="" />'
                    +'</p><p><label>Category:<b>'+category_name+'</b></label>'
                    +   '<input type="hidden" name="post_id" class="smallinput" value="'+id+'" />'  
                    +'</p><p><label>Label:</label>'
                    +'<span class="field"><input type="text" name="label" class="smallinput" value="'+category_name+'" /></span>'
                    +'<p><label>Status:</label>'
                    +'<span class="field"><input type="text" name="status" class="smallinput" value="public"/></span>'
                    +'</p><p><label>Parent:</label>'
                    +'<span class="field"><input type="text" name="parent" class="smallinput" value="0"/></span>'                    
                    +'</p><p><label>Title Attribute:</label>'
                    +'<span class="field"><input type="text" name="title_attribute" class="smallinput" value="" /></span>'                    
                    +'</p><p><label>Open link in a new window/tab:</label>'
                    +'<input type="checkbox" name="open_link" value="1"  /> <br />'
                    +'</p><p><label>CSS Class:</label>'
                    +'<span class="field"><input type="text" name="css_class" class="smallinput" value=""/></span>'
                    +'</p><input type="hidden" value="category" name="type" /><input type="hidden" value="'+object_id+'" name="object_id" />'
                    +'<p class="btn_menu">'
                    +'<button class="submit radius2" name="submit">Save</button>'
                    +'<input type="reset" class="reset radius2" value="Reset" />'
                    +'<button id="btn_cancel" class="stdbtn btn_blue">Cancel</button>'
                    +'</p></div></form></div>'
                    ); 
            }
        });
		
        if(!sel) alert('No data selected');							//alert to no data selected
    });
    // them moi mot page vao link
    jQuery('#btn_add_page').click(function(){								
        var id = '';
        var base_url = jQuery('#base_url').val();
        var object_id = jQuery('#object_id').val();							// get target id of table        								   
        var sel = false;											//initialize to false as no selected row
        var ch = jQuery('#tabs-1').find('input[type=checkbox]');		//get each checkbox in a table
        //check if there is/are selected row in table
        ch.each(function(){
            if(jQuery(this).is(':checked')) {
                sel = true;
                id = jQuery(this).attr('value');
                page_name = jQuery(this).attr('name'); 
                jQuery(this).attr('checked',false);
                jQuery('.menu_add_new').append(
            
                    '<div class="widgetbox" id="menu_item_'+id+'">'
                    +'<form class="stdform" action="'+base_url+'administrator/menus/save_detail/'+object_id+'" method="post">'   
                    +'<div class="title1"><h2 class="general"><span>'+page_name+ '<input type="text" name="order" class="order_menu" size="1" value="0"/></span></h2></div>'
                    +'<div class="widgetcontent ">'
                        
                    +   '<input type="hidden" name="id" class="smallinput" value="" />'
                    +'</p><p><label>Page:<b>'+page_name+'</b></label>'
                    +   '<input type="hidden" name="post_id" class="smallinput" value="'+id+'" />'  
                    +'</p><p><label>Label:</label>'
                    +'<span class="field"><input type="text" name="label" class="smallinput" value="'+page_name+'" /></span>'
                    +'<p><label>Status:</label>'
                    +'<span class="field"><input type="text" name="status" class="smallinput" value="public"/></span>'
                    +'</p><p><label>Parent:</label>'
                    +'<span class="field"><input type="text" name="parent" class="smallinput" value="0"/></span>'                    
                    +'</p><p><label>Title Attribute:</label>'
                    +'<span class="field"><input type="text" name="title_attribute" class="smallinput" value="" /></span>'                    
                    +'</p><p><label>Open link in a new window/tab:</label>'
                    +'<input type="checkbox" name="open_link" value="1"  /> <br />'
                    +'</p><p><label>CSS Class:</label>'
                    +'<span class="field"><input type="text" name="css_class" class="smallinput" value=""/></span>'
                    +'</p><input type="hidden" value="category" name="type" /><input type="hidden" value="'+object_id+'" name="object_id" />'
                    +'<p class="btn_menu">'
                    +'<button class="submit radius2" name="submit">Save</button>'
                    +'<input type="reset" class="reset radius2" value="Reset" />'
                    +'<button id="btn_cancel" class="stdbtn btn_blue">Cancel</button>'
                    +'</p></div></form></div>'
                    ); 
               

            }
        });
		
        if(!sel) alert('No data selected');							//alert to no data selected
    });
    // Delete menu detail
    
    jQuery(document).on("click","#btn_delete_menu",function(){
        id = jQuery(this).attr('value');
        base_url = jQuery('#base_url').val();
        jQuery.ajax({
            type:"POST",
            url:base_url+'administrator/menus/delete', 
            data:"id="+id, 
            //dataType:"xml",                
            success: function (data){ 
                
                jQuery('#menu_item_'+id).fadeOut(function(){
                    jQuery('#menu_item_'+id).remove();							//remove row when animation is finished
                });
            //alert('thanh cong');
            }
        });
        return false;   
    });
    jQuery(document).on("click","#btn_cancel",function(){
        
        jQuery(this).parent().parent().fadeOut(function(){
            jQuery(this).parent().parent().remove();							//remove row when animation is finished
        });
        return false;
    }); 
       
    /*---------------------End DucNN-------------------------------*/        
    //search box of header
    jQuery('#keyword').bind('focusin focusout', function(e){
        var t = jQuery(this);
        if(e.type == 'focusin' && t.val() == 'Search here') {
            t.val('');
        } else if(e.type == 'focusout' && t.val() == '') {
            t.val('Search here');	
        }
    });
	
	
    //userinfo
    jQuery('.userinfo').click(function(){
        if(!jQuery(this).hasClass('userinfodrop')) {
            var t = jQuery(this);
            jQuery('.userdrop').width(t.width() + 30);	//make this width the same with the user info wrapper
            jQuery('.userdrop').slideDown('fast');
            t.addClass('userinfodrop');					//add class to change color and background
			
        } else {
            jQuery(this).removeClass('userinfodrop');
            jQuery('.userdrop').hide();
        }
		
        //remove notification box if visible
        jQuery('.notialert').removeClass('notiactive');
        jQuery('.notibox').hide();
			
        return false;
    });
	
	
    //notification onclick
    jQuery('.notialert').click(function(){
        var t = jQuery(this);
        var url = t.attr('href');
        if(!t.hasClass('notiactive')) {
            jQuery('.notibox').slideDown('fast');			//show notification box
            jQuery('.noticontent').empty();					//clear data
            jQuery('.notibox .tabmenu li').each(function(){ 
                jQuery(this).removeClass('current');		//reset active tab menu
            });
            //make first li as default active menu
            jQuery('.notibox .tabmenu li:first-child').addClass('current');
			
            t.addClass('notiactive');
			
            jQuery('.notibox .loader').show();				//show loading image while waiting a response from server
            jQuery.post(url,function(data){
                jQuery('.notibox .loader').hide();			//hide loader after response		 
                jQuery('.noticontent').append(data);		//append data from server to .noticontent box
            });
        } else {
            t.removeClass('notiactive');
            jQuery('.notibox').hide();
        }
		
        //this will hide user info drop down when visible
        jQuery('.userinfo').removeClass('userinfodrop');
        jQuery('.userdrop').hide();
		
        return false;
    });
	
	
    jQuery(document).click(function(event) {
        var ud = jQuery('.userdrop');
        var nb = jQuery('.notibox');
		
        //hide user drop menu when clicked outside of this element
        if(!jQuery(event.target).is('.userdrop') && ud.is(':visible')) {
            ud.hide();
            jQuery('.userinfo').removeClass('userinfodrop');
        }
		
        //hide notification box when clicked outside of this element
        if(!jQuery(event.target).is('.notibox') && nb.is(':visible')) {
            nb.hide();
            jQuery('.notialert').removeClass('notiactive');
        }
    });
	
	
    //notification box tab menu
    jQuery('.tabmenu a').click(function(){
        var url = jQuery(this).attr('href');
		
        //reset active menu
        jQuery('.tabmenu li').each(function(){
            jQuery(this).removeClass('current');
        });
		
        jQuery('.noticontent').empty();					//empty content first to display new data
        jQuery('.notibox .loader').show();
        jQuery(this).parent().addClass('current');		//add current class to menu
        jQuery.post(url,function(data){
            jQuery('.notibox .loader').hide();			
            jQuery('.noticontent').append(data);		//inject new data from server
        });
        return false;
    });
	
	
    // Widget Box Title on Hover event
    // show arrow image in the right side of the title upon hover
    jQuery('.widgetbox .title').hover(function(){
        if(!jQuery(this).parent().hasClass('uncollapsible'))									   
            jQuery(this).addClass('titlehover');
    }, function(){
        jQuery(this).removeClass('titlehover');
    });
	
    //show/hide widget content when widget title is clicked
    jQuery('.widgetbox .title').click(function(){
        if(!jQuery(this).parent().hasClass('uncollapsible')) {									   
            if(jQuery(this).next().is(':visible')) {
                jQuery(this).next().slideUp('fast');
                jQuery(this).addClass('widgettoggle');
            } else {
                jQuery(this).next().slideDown('fast');
                jQuery(this).removeClass('widgettoggle');
            }
        }
    });
	
    //wrap menu to em when click will return to true
    //this code is required in order the code (next below this code) to work.
    jQuery('.leftmenu a span').each(function(){
        jQuery(this).wrapInner('<em />');
    });

    jQuery('.leftmenu a').click(function(e) {
										 
        var t = jQuery(this);								 
        var p = t.parent();
        var ul = p.find('ul');
        var li = jQuery(this).parents('.lefticon');
		
        //check if menu have sub menu
        if(jQuery(this).hasClass('menudrop')) {
			
            //check if menu is collapsed
            if(!li.length > 0) {
				
                //check if sub menu is available
                if(ul.length > 0) {
					
                    //check if menu is visible
                    if(ul.is(':visible')) {
                        ul.slideUp('fast');
                        p.next().css({
                            borderTop: '0'
                        });
                        t.removeClass('active');
                    } else {
                        ul.slideDown('fast');	
                        p.next().css({
                            borderTop: '1px solid #ddd'
                        });
                        t.addClass('active');
                    }
                }
	
                if(jQuery(e.target).is('em'))
                    return true;
                else
                    return false;
            } else {
                return true;	
            }
		
        //redirect to assigned link when menu does not have a sub menu
        } else {
            return true;
        }
    });
	
    //show tooltip menu when left menu is collapsed
    jQuery('.leftmenu a').hover(function(){
        if(jQuery(this).parents('.lefticon').length > 0) {
            jQuery(this).next().stop(true,true).fadeIn();
        }
    },function(){
        if(jQuery(this).parents('.lefticon').length > 0) {
            jQuery(this).next().stop(true,true).fadeOut();
        }
    });
	
    //show/hide left menu to switch into full/icon only menu
    jQuery('#togglemenuleft a').click(function(){
        if(jQuery('.mainwrapper').hasClass('lefticon')) {
            jQuery('.mainwrapper').removeClass('lefticon');
            jQuery(this).removeClass('toggle');
			
            //remove all tooltip element upon switching to full menu view
            jQuery('.leftmenu a').each(function(){
                jQuery(this).next().remove();
            });
			
        } else {
            jQuery('.mainwrapper').addClass('lefticon');
            jQuery(this).addClass('toggle');
			
            showTooltipLeftMenu();
        }
    });
	
    function showTooltipLeftMenu() {
        //create tooltip menu upon switching to icon only menu view
        jQuery('.leftmenu a').each(function(){
            var text = jQuery(this).text();								//get the text
            jQuery(this).removeClass('active');							//reset when there is/are active menu upon switching to icon view
            jQuery(this).parent().attr('style','');						//clear style attribute to this menu
            jQuery(this).parent().find('ul').hide();					//hide sub menu when there is/are showed sub menu
            jQuery(this).after('<div class="menutip">'+text+'</div>');	//append menu tooltip
        });	
    }
	
	
    /** FLOAT LEFT SIDEBAR **/
    jQuery(document).scroll(function(){
        var pos = jQuery(document).scrollTop();
        if(pos > 50) {
            jQuery('.floatleft').css({
                position: 'fixed', 
                top: '10px', 
                right: '10px'
            });
        } else {
            jQuery('.floatleft').css({
                position: 'absolute', 
                top: 0, 
                right: 0
            });
        }
    });
	
    /** FLOAT RIGHT SIDEBAR **/
    jQuery(document).scroll(function(){
        if(jQuery(this).width() > 580) {
            var pos = jQuery(document).scrollTop();
            if(pos > 50) {
                jQuery('.floatright').css({
                    position: 'fixed', 
                    top: '10px', 
                    right: '10px'
                });
            } else {
                jQuery('.floatright').css({
                    position: 'absolute', 
                    top: 0, 
                    right: 0
                });
            }
        }
    });
	
	
    //NOTIFICATION CLOSE BUTTON
    jQuery('.notification .close').click(function(){
        jQuery(this).parent().fadeOut();
    });
	
	
    //button hover
    jQuery('.btn').hover(function(){
        jQuery(this).stop().animate({
            backgroundColor: '#eee'
        });
    },function(){
        jQuery(this).stop().animate({
            backgroundColor: '#f7f7f7'
        });
    });
	
    //standard button hover
    jQuery('.stdbtn').hover(function(){
        jQuery(this).stop().animate({
            opacity: 0.75
        });
    },function(){
        jQuery(this).stop().animate({
            opacity: 1
        });
    });
	
    //buttons in error page
    jQuery('.errorWrapper a').hover(function(){
        jQuery(this).switchClass('default','hover');
    },function(){
        jQuery(this).switchClass('hover', 'default');
    });
	
	
    //screen resize
    var TO = false;
    jQuery(window).resize(function(){
        if(jQuery(this).width() < 1024) {
            jQuery('.mainwrapper').addClass('lefticon');
            jQuery('#togglemenuleft').hide();
            jQuery('.mainright').insertBefore('.footer');
			
            showTooltipLeftMenu();
			
            if(jQuery(this).width() <= 580) {
                jQuery('.stdtable').wrap('<div class="tablewrapper"></div>');
				
                if(jQuery('.headerinner2').length == 0)
                    insertHeaderInner2();
            } else {
                removeHeaderInner2();
            }
			
        } else {
            toggleLeftMenu();
            removeHeaderInner2();
        }
		
    });	
		
    if(jQuery(window).width() < 1024) {
        jQuery('.mainwrapper').addClass('lefticon');
        jQuery('#togglemenuleft').hide();
        jQuery('.mainright').insertBefore('.footer');
		
        showTooltipLeftMenu();
		
        if(jQuery(window).width() <= 580) {
            jQuery('table').wrap('<div class="tablewrapper"></div>');
            insertHeaderInner2();
        }
			
    } else {
        toggleLeftMenu();
    }
	
    function toggleLeftMenu() {
        if(!jQuery('.mainwrapper').hasClass('lefticon')) {
            jQuery('.mainwrapper').removeClass('lefticon');
            jQuery('#togglemenuleft').show();
        } else {
            jQuery('#togglemenuleft').show();
            jQuery('#togglemenuleft a').addClass('toggle');
        }	
    }
	
    function insertHeaderInner2() {
        jQuery('.headerinner').after('<div class="headerinner2"></div>');
        jQuery('#searchPanel').appendTo('.headerinner2');
        jQuery('#userPanel').appendTo('.headerinner2');
        jQuery('#userPanel').addClass('userinfomenu');
    }
	
    function removeHeaderInner2() {
        jQuery('#searchPanel').insertBefore('#notiPanel');
        jQuery('#userPanel').insertAfter('#notiPanel');
        jQuery('#userPanel').removeClass('userinfomenu');
        jQuery('.headerinner2').remove();
    }		
	
/*jQuery('body').append('<div class="theme"><h4>Color</h4><a href="darkblue/dashboard.html" class="darkblue"></a><a href="gray/dashboard.html" class="gray"></a></div>');*/
	
});


function checkslug(inputString)
{
    jQuery("#message-check .loaders").css('display','inline');
    var slug = jQuery("#txtslug").attr('value');
    var url = jQuery("#txtslug").attr('urlload');    
    var oldslug = jQuery("#hdfOldSlug").attr('value');
    if(slug!=oldslug){
        jQuery.post(url,{
            slug:slug
        },function(data) {
            if(data == "exist")
            {            
                jQuery("#message-check .message-box").css('display','list-item');                        
            }
            else{
                jQuery("#message-check .message-box").css('display','none');            
            }
        });   
    }
    jQuery("#message-check .loaders").css('display','none');
}

function checktagname()
{
    jQuery("#message-check-name .loaders").css('display','inline');
    var name = jQuery("#txttitle").attr('value');
    var url = jQuery("#txttitle").attr('urlload');    
    var oldname = jQuery("#hdfOldName").attr('value');
    if(name!=oldname){
        jQuery.post(url,{
            name:name
        },function(data) {
            if(data == "exist")
            {            
                jQuery("#message-check-name .message-box").css('display','list-item');                        
            }
            else{
                jQuery("#message-check-name .message-box").css('display','none');            
            }
        });   
    }
    jQuery("#message-check-name .loaders").css('display','none');
}

function countCharactor(inputString,inputcount)
{
    var count = inputString.length;
    jQuery('#'+inputcount).val(count);
}

function countCharactors(inputString,inputcount)
{
    var count = inputString.length;
    jQuery('#'+inputcount).val(count);
}
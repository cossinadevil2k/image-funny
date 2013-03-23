$(document).ready(function() {
	
    $('input').keyup(function(e) {
        //alert(e.keyCode);
        if(e.keyCode == 13) {
            //alert('Enter key was pressed.');
            return false;
        }
    });


	
    $('#modifyImageForm').submit(function() {
	        
        $(this).ajaxSubmit(submitOptions);
        return false;
			
    });
	
    $('.textBlock').draggable();
    $('.colorBlock').draggable();
    $('.colorBlock').resizable({
        autohide: true, 
        handles: 'all'
    });
	
    $("#buttonAddColor").click(function() {
        var imageDivObj= document.getElementById("workspaceBlock");
        var newColorBlock= document.createElement("SPAN");
        var newBlockId= $("#blockCount").val() + "C";
        newColorBlock.setAttribute("id",newBlockId);
        imageDivObj.appendChild(newColorBlock);
		
        //Remove border from any other colorBlocks and textBlocks
        $(".textBlock").css("border","0px");
        $(".colorBlock").css("border","0px");
	
        //Find image offset
        var imagePos= $("#selected_frame").position();
	
        //Show delete button
        $("#buttonDelete").removeClass("noShow");
	
        //Set intial styles using jQuery.  Have to represent all styles that
        //can be manipulated 
		
        $("#" + newBlockId).attr("style","left:" + imagePos.left + "px;top:" + imagePos.top + "px;width:100px;height:50px;position:absolute;background-color:#000000;border:1px dotted white;z-index:" + $("#blockCount").val() + ";");
        $("#" + newBlockId).addClass("colorBlock");
		
        //Update form
        $("#blockId").val(newBlockId);
		
        //Reset form values for new block
        $("#depth").val($("#blockCount").val());
		
        //Update block count
        $("#blockCount").val(parseInt($("#blockCount").val())+1);
		
        //Display form controls
        $("#selectedItem").removeClass("noShow");
        $("#textOnlyControls").addClass("noShow");
		
        //Make draggable and resizable
        $('.colorBlock').draggable();
        $('.colorBlock').resizable({
            autohide: true, 
            handles: 'all'
        });
		
        $('.colorBlock').click(function() {
            $("#blockId").val($(this).attr("id"));
            //Remove border from any other textBlocks and colorBlocks
            $(".colorBlock").css("border","0px");
            $(".textBlock").css("border","0px");
            $(this).css("border","1px dotted white;");
            $("#textOnlyControls").addClass("noShow");
            $("#depth").val($(this).css("z-index"));

        });
	
    }); //end of buttonAddColor
	
    $("#buttonAddText").click(function() {
		
        //Create new span
        var imageDivObj= document.getElementById("workspaceBlock");
        var newTextBlock= document.createElement("SPAN");
        var newBlockId= $("#blockCount").val() + "T";
        newTextBlock.setAttribute("id",newBlockId);
        var newText= document.createTextNode("Edit text");
        newTextBlock.appendChild(newText);
        imageDivObj.appendChild(newTextBlock);
		
        //Remove border from any other textBlocks
        $(".textBlock").css("border","0px");
        $(".colorBlock").css("border","0px");
		
        //Find the offset of the image so text block can be set there.
        var imagePos= $("#selected_frame").position();
        
        //Show delete button
        $("#buttonDelete").removeClass("noShow");
	
        //Set intial styles using jQuery.  Have to represent all styles that
        //can be manipulated 
		
        $("#" + newBlockId).attr("style","left:" + imagePos.left + "px;top:" + imagePos.top + "px;position:absolute;color:#ffffff;background-color:transparent;border:1px dotted white;font-style:normal;font-weight:normal;font-family:im_arial;font-size:16px;text-decoration:none;z-index:" + $("#blockCount").val() + ";");
        $("#" + newBlockId).addClass("textBlock");
		
		
        //Update form
        $("#blockId").val(newBlockId);
		
        //Reset form values for new block
        $("#str").val("Edit text");
        $("#font").val("Arial");
        $("#fontSize").val("16");
        $("#style").val("plain");
        $("#dec").val("none",true);
        $("#depth").val($("#blockCount").val());
		
        //Display form controls
        $("#selectedItem").removeClass("noShow");
        $("#textOnlyControls").removeClass("noShow");
		
        //Update block count
        $("#blockCount").val(parseInt($("#blockCount").val())+1);
		
        //Make draggable
        $('.textBlock').draggable();
		
        $('.textBlock').click(function() {
			
            $("#textOnlyControls").removeClass("noShow");
            $(".textBlock").css("border","0px");
            $(".colorBlock").css("border","0px");
			
            $("#blockId").val($(this).attr("id"));
            $(this).css("border","1px dotted white;");
            //Need to write style values back to form!
            $("#str").val($(this).text());
            $("#font").val($(this).css("font-family"));
			
            var noPXSize= parseInt($(this).css("font-size"))-2;
			
            $("#fontSize").val(noPXSize);
            var styleVal= $(this).css("font-style");
            var weightVal= $(this).css("font-weight");
            //alert("styleVal is: " + styleVal + ", weightVal is: " + weightVal);
            if (styleVal== "normal" && (weightVal== "normal" || weightVal== "400"))
            {
                $("#style").val("plain");
            }
            else if (styleVal== "italic" && weightVal== "bold")
            {
                $("#style").val("boldItalic");
            }
            else if (styleVal== "italic")
            {
                $("#style").val("italic");
            }
            else 
            {
                $("#style").val("bold");
            }
				
            var decorationVal= $(this).css("text-decoration");
            if (decorationVal== "underline")
            {
                $("#dec").val("underline");
            }
            else if (decorationVal== "line-through")
            {
                $("#dec").val("strikethrough");
            }
            else
            {
                $("#dec").val("none");
            }
				
            $("#depth").css("z-index");
        });
    }); //end of buttonAddText
	
    $("#buttonDelete").click(function() {
        var blockId= $("#blockId").val();
        $("#" + blockId).remove();
    });
	
    $("#str").change(function() {
        var blockId= $("#blockId").val();
        $("#" + blockId).text($("#str").val());
    });
	
    $("#font").change(function () {
        var blockId= $("#blockId").val();
        $("#" + blockId).css("font-family",$("#font").val());
    });
	
    $("#fontSize").change(function () {        
        var blockId= $("#blockId").val();        
        $("#" + blockId).css("font-size",$("#fontSize").val()+"px");
    });
	
    $("#style").change(function () {
        var blockId= $("#blockId").val();
        var selectedStyle= $("#style").val();
        switch (selectedStyle)
        {
            case "plain":
                $("#" + blockId).css("font-style","normal");
                $("#" + blockId).css("font-weight","normal");
                break;
				
            case "bold":
                $("#" + blockId).css("font-style","normal");
                $("#" + blockId).css("font-weight","bold");
                break;
				
            case "italic":
                $("#" + blockId).css("font-style","italic");
                $("#" + blockId).css("font-weight","normal");
                break;
				
            case "boldItalic":
                $("#" + blockId).css("font-style","italic");
                $("#" + blockId).css("font-weight","bold");
                break;
        }
		
    });
	
    $("#dec").change(function () {
        var blockId= $("#blockId").val();
        $("#" + blockId).css("text-decoration",$("#dec").val());
    });
	
    $("#depth").change(function () {
        var blockId= $("#blockId").val();
        $("#" + blockId).css("z-index",$("#depth").val());
    });
	
    /*$(".aColor").click(function () {
        //Determine if a text block or color block
        var blockId= $("#blockId").val();
        var blockType= findBlockType(blockId);
        if (blockType== "T")
        {
            $("#" + blockId).css("color",$(this).css("background-color"));
        }
        else
        {
            $("#" + blockId).css("background-color",$(this).css("background-color"));	
        }
    });
    */
    var consoleTimeout;
    $(".minicolor").minicolors({
        change:function(){
            var blockId= $("#blockId").val();
            var blockType= findBlockType(blockId);
            if (blockType== "T")
            {
                $("#" + blockId).css("color",$(this).val());
            }
            else
            {
                $("#" + blockId).css("background-color",$(this).val());	
            }
        }
    },{
        control: $(this).attr('data-control') || 'wheel',
        defaultValue: $(this).attr('data-default-value') || '',
        inline: $(this).hasClass('inline'),
        letterCase: $(this).hasClass('uppercase') ? 'uppercase' : 'lowercase',
        opacity: $(this).hasClass('opacity'),
        position: $(this).attr('data-position') || 'default',
        styles: $(this).attr('data-style') || '',
        swatchPosition: $(this).attr('data-swatch-position') || 'left',
        textfield: !$(this).hasClass('no-textfield'),
        theme: $(this).attr('data-theme') || 'default',
        change: function(hex, opacity) {
                        
            // Generate text to show in console
            text = hex ? hex : 'transparent';
            if( opacity ) text += ', ' + opacity;
            text += ' / ' + $(this).minicolors('rgbaString');
                        
            // Show text in console; disappear after a few seconds
            $('#console').text(text).addClass('busy');
            clearTimeout(consoleTimeout);
            consoleTimeout = setTimeout( function() {
                $('#console').removeClass('busy');
            }, 3000);
                        
        }
    });
   
$("#buttonGenerateImage").click(function() {
    //Clear textData
    $("#textData").val("");
		
    //Get the position of the image
    var imagePos= $("#selected_frame").position();
            
    //Loop through all textBlock elements
    $(".textBlock").each(function(i) {
        var blockText= $(this).text();
        var blockFont= $(this).css("font-family");
        var initialBlockFontSize= $(this).css("font-size");
			
        var sizeLen= parseInt(initialBlockFontSize.length)-2;
        var blockFontSize= initialBlockFontSize.substring(0,sizeLen);
        var blockFontStyle= $(this).css("font-style");
        var blockFontWeight= $(this).css("font-weight");
			
			
        if (blockFontStyle== "normal" && (blockFontWeight== "normal" || blockFontWeight== "400"))
        {
            var blockStyle= "plain";
        }
        else if (blockFontStyle== "italic" && blockFontWeight== "bold")
        {
            var blockStyle= "boldItalic";
        }
        else if (blockFontStyle== "italic")
        {
            var blockStyle= "italic";
        }
        else 
        {
            var blockStyle= "bold";
        }
			
        if ($(this).css("text-decoration")== "line-through")
        {
            var blockTextDecoration= "yes|no";
					
        }
        else if ($(this).css("text-decoration")== "underline")
        {
            var blockTextDecoration= "no|yes";
        }
        else
        {
            var blockTextDecoration= "no|no";
        }
			
        if ($(this).css("color")== "rgb(255, 255, 255)" || $(this).css("color")== "#ffffff")
        {
            //alert("is white");
            var blockColor= "#ffffff";
        }
        else
        {
					
            if ($("#browserType").val()== "ie")
            {
                var blockColor= $(this).css("color");
            }
            else
            {
                var blockColor= convertRGBToHex($(this).css("color"));
            }
					
        }
					
        var blockLeft= parseInt($(this).position().left) - parseInt(imagePos.left);
        var blockTop= parseInt($(this).position().top) - parseInt(imagePos.top);
        var blockDepth= $(this).css("z-index");
			
        var dataLine= $("#textData").val() + "tBlock" + "|" + blockText + "|" + blockFont + "|" + blockFontSize + "|" + blockStyle + "|" + blockTextDecoration + "|" + blockColor + "|" + blockLeft + "|" + blockTop + "|" + blockDepth + "^";
        $("#textData").val(dataLine);                       
        alert(dataLine);
    });
	
    //Loop through each colorBlock
    $(".colorBlock").each(function(i) {
			
        if ($(this).css("background-color")== "rgb(0, 0, 0)" || $(this).css("background-color")== "#000000")
        {
            var blockColor= "#000000";
        }
        else
        {
            if ($("#browserType").val()== "ie")
            {
                var blockColor= $(this).css("background-color");
            }
            else
            {
                var blockColor= convertRGBToHex($(this).css("background-color"));
            }
        }
			
        //var blockLeft= parseInt($(this).css("left")) - parseInt(imagePos.left);
        //var blockTop= parseInt($(this).css("top")) + parseInt(imagePos.top);
        var blockLeft= parseInt($(this).css("left")) - parseInt(imagePos.left);
        var blockTop= parseInt($(this).css("top")) - parseInt(imagePos.top);
			
        var blockWidth= $(this).width();
        var blockHeight= $(this).height();
			
        var blockDepth= $(this).css("z-index");
			
        var dataLine= $("#textData").val() + "cBlock" + "|" + blockColor + "|" + blockLeft + "|" + blockTop + "|" + blockWidth + "|" + blockHeight + "|" + blockDepth + "^";
        $("#textData").val(dataLine);            
    });
                
    var url =base_url+"/tao-khung/createwatermark";                
    var detail = $("#textData").val();
    var imagePath = $("#selected_frame").attr('src');
    imagePath = imagePath.replace(base_url, "");
    $.post(url, {            
        detail:detail,
        imagePath:imagePath
    }, function(data){
        $('.textBlock').remove();
        $('.colorBlock').remove();
        $("#selected_frame").attr('src',data.toString());
    }, 'json');
    return false;
                
});  //end of buttonGenerateImage
	
});  //end of ready

//Will need this for hex conversion (unless CF can do color by rgb):
function convertRGBToHex(rawColorCode) {
    var rgbLen= parseInt(rawColorCode.length)-1;
    //var rgbVals= rawColorCode.substring(5,rgbLen);
    var rgbVals= rawColorCode.substring(4,rgbLen);
    //alert("rgbVals is::" + rgbVals);
    var rgbArray= rgbVals.split(",");
    //alert("rgbs: r is " + rgbArray[0] + ", g is " + rgbArray[1] + ", b is " + rgbArray[2]);
    var firstVal= calcHex(rgbArray[0]);
    var secondVal= calcHex(rgbArray[1]);
    var thirdVal= calcHex(rgbArray[2]);
    var hexResult= "#"+ firstVal + secondVal + thirdVal;
    return hexResult;
}  //end of convertRGBToHex code

function calcHex(numCode) {
    var mainNum= Math.floor(numCode/16);
    var mainMondo= numCode % 16;

    mainNum= hexConvert(mainNum);
    mainMondo= hexConvert(mainMondo);

    var fullNum= mainNum + "" + mainMondo;
    return fullNum;

} //end of function

function hexConvert(intNum) {

    if (intNum== 10)
    {
        return "A";
    }
    else if (intNum== 11)
    {
        return "B";
    }
    else if (intNum== 12)
    {
        return "C";
    }
    else if (intNum== 13)
    {
        return "D";
    }
    else if (intNum== 14)
    {
        return "E";
    }
    else if (intNum== 15)
    {
        return "F";
    }
    else
    {
        return intNum;
    }

} //end of function

function findBlockType(blockId) {
    var lastCharPos= parseInt(blockId.length) - 1;
    var bType= blockId.charAt(lastCharPos);
    return bType;
}

function showProcessing() {
    $("#generateMsg").text("Generating image...");
    $("#spinImage").removeClass("noShow");
}

function hideProcessing() {
    $("#generateMsg").addClass("noShow");
    $("#spinImage").addClass("noShow");
    $(".libraryText").each(function (i) {
        $(this).removeClass("noShow");
    });
    $("#saveNewImage").removeClass("noShow");
}

function finishLibraryLoad () {
    $("#libraryLoadP").addClass("noShow");
}





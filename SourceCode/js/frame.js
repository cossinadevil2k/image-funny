
$(document).ready(function(){
    var jcrop_api = null;
    var default_width = 600;
    var default_height = 400;
    var original_width = 0;
    var original_height = 0;
    var imageFile;
//    insertAddButtonImage($(".PatternImage.Selected"));  

    $("#Pattern").mCustomScrollbar({
        horizontalScroll:true,
        autoHideScrollbar: true
    });
    
    $(".Category").click(function(){
        var id = this.id;
        window.location = base_url + 'tao-khung/' + id;
    });
    
    $("#Next").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","last");
    });
    
    $("#Previous").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","first");
    });
    
    $(".PatternImage").live('click',function(){
        var frame_id = $(this).attr('frame_id');
        $('#PatternImage'+selected_id).removeClass("Selected");
        $(this).addClass("Selected");
        selected_id = frame_id;
        $("#selected_frame").attr('src', $('#PatternImage'+frame_id+' img').attr('src'));
        $("#selected_frame").attr('frame_id', selected_id);
        $(".addButton").remove();
        insertAddButtonImage(this);
    });
    
    $("#selectBtn").live('click', function(){
        $.fancybox.close();        
        $.blockUI();

        x = $('#x').val() * original_height / $('#target').height();
        y = $('#y').val() * original_width / $('#target').width();
        width = $('#w').val() * original_height / $('#target').height();
        height = $('#h').val() * original_width / $('#target').width();
        
        alert(x + "###" + y + "###" + width + "###" + height);
        $.ajax({
                type: "post",
                url : base_url + 'tao-khung/create_frame',
                dataType: "json",
                data: {
                    'frame_id': selected_id,
                    'image_path': './uploads/'+ imageFile.name,
                    'x': x,
                    'y': y,
                    'width' : width,
                    'height': height
                },
                success: function(data){
                    $.unblockUI();
                    $("#selected_frame").attr('src', data.image_path);
                },
                complete: function(data){
                                       
                }
            });
        
    });
    
    $('#file_upload').uploadifive({
        'fileSizeLimit' : '10MB',
        'buttonText': 'Tải ảnh lên',
        'multi': false,
        'removeCompleted': true,
        'fileType'  : 'image',
        'uploadScript'  : '/uploadifive/uploadifive.php',
        'onUploadStart':function(){
            $.blockUI();
            $("#load_more").show();
        },
        'onUploadComplete' : function(file, data) {
            imageFile = file;           
            $.ajax({
                type: 'post',
                url: base_url + 'frame/get_image_dimensions',
                dataType: 'json',
                data:{
                    'image_path': 'uploads/'+ file.name
                },
                success: function(data){
                    original_width = data.width;
                    original_height = data.height;
                    
                    width_scale = default_width/parseFloat(data.width);
                    height_scale = default_height/parseFloat(data.height);

                    var scale_ratio = width_scale;
                    if (width_scale > height_scale){
                        scale_ratio = height_scale;
                    }

                    var new_width = scale_ratio*parseFloat(data.width);
                    var new_height = scale_ratio*parseFloat(data.height);

                    $('#target').height(new_height);
                    $('#target').width(new_width);
                    
                    $("#target").attr('src', base_url+'uploads/'+ file.name);
            
                    $.fancybox({
                        'padding':0,
                        'closeBtn' : true,
                        'href' : '#cropDiv',
                        'aspectRatio': true,
                        'width': 'auto',
                        'height': 'auto',
                        'scrolling': 'no'
                    });
            
                    aspect = $(".PatternImage.Selected input").first().attr('aspect');
            
                    if (jcrop_api){
                        jcrop_api.destroy();
                    }  
                    $("#target").Jcrop({
                        aspectRatio: aspect,
                        setSelect: [20, 20, 60, 60/aspect],
                        onSelect: getImageInformation,
                        maxSize: [600, 600]
                    }, function(){
                        jcrop_api = this;
                    });
                }
            }); 
        }
    });
    
    function insertAddButtonImage(object){
//        selected_width = $(object).find('img').attr('image_w');
//        selected_height = $(object).find('img').attr('image_h');
//        $('#PatternImage'+selected_id+ ' input[type="hidden"]').each(function(){            
//            var x = $(this).attr('x');
//            var y = $(this).attr('y');  
//            var style = 'top: ' + (y*height/selected_height - 30) + 'px; left: ' + (x*width/selected_width + 145) + 'px;';
//            $(".Center").append('<a class="addButton" style="position: absolute;' + style+'"><img src="'+base_url+'images/common/addButton.png" width="60px"/></a>');           
//        });
    }
    
    $("#download").live('click', function(){
        temp = $("#selected_frame").attr('src')
        path = temp.split(base_url);
        window.location = base_url + 'tao-khung/download?image='+path[1]+'' ;
    });
    
    $("#facebook").live('click', function(){
        
    });
});

function getImageInformation(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}

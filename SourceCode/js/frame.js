
$(document).ready(function(){
    var jcrop_api;
    var width = $("#selected_frame").width();
    var height = $("#selected_frame").height();
    var imageFile;
//    insertAddButtonImage($(".PatternImage.Selected"));  

    $("#Pattern").mCustomScrollbar({
        horizontalScroll:true,
        autoHideScrollbar: false
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
        $.ajax({
                type: "post",
                url : base_url + 'tao-khung/create_frame',
                dataType: "json",
                data: {
                    'frame_id': selected_id,
                    'image_path': './uploads/'+ imageFile.name,
                    'x': $('#x').val(),
                    'y': $('#y').val(),
                    'width' : $('#w').val(),
                    'height': $('#h').val()
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
            $("#target").attr('src', base_url+'uploads/'+ file.name);
            $(".jcrop-holder").find('img').attr('src', base_url+'uploads/'+ file.name);
            $.fancybox({
                'closeBtn' : true,
                'padding' : 0,
                'autoDimensions': true,
                'scrolling': 'auto',
                'href' : '#cropDiv'
            });
            aspect = $(".PatternImage.Selected input").first().attr('aspect');
            $("#target").Jcrop({
                aspectRatio: aspect,
                setSelect: [10, 10, 60, 60/aspect],
                onSelect: getImageInformation
            }, function(){
                jcrop_api = this;
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
        $.each(path, function(key, value){
            alert(value);
        });
        window.location = base_url + 'tao-khung/download?image='+path[1]+'' ;
    });
});

function getImageInformation(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}

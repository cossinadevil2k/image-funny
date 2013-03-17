$(document).ready(function(){
    var selected_width = $("#selected_frame").width();
    var selected_height = $("#selected_frame").height();
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
        $('#PatternImage'+frame_id+ ' input[type="hidden"]').each(function(){            
            var x = $(this).attr('x');
            var y = $(this).attr('y');
            var width = 1772;
            var height = 1181;
            var style = 'top: ' + (y*selected_height/height - 30) + 'px; left: ' + (x*selected_width/width + 145) + 'px;';
//            alert(style);
            $(".Center").append('<a class="addButton" href="#" style="position: absolute;' + style+'"><img src="http:\/\/local.image.vn\/images\/common\/addButton.png" width="60px"\/></a>');           
        });
    });
    
    $("#selectBtn").live('click', function(){
        alert($("#x").val());
    });

    $('#file_upload').uploadify({
        'fileSizeLimit' : '300MB',
        'buttonText': 'Tải ảnh lên',
        'swf'      : '/uploadify/uploadify.swf',
        'uploader' : '/uploadify/uploadify.php',
        'onUploadStart':function(){
            $.blockUI();
            $("#load_more").show();
        },
        'onUploadSuccess' : function(file, data, response) {
            $("#target").attr('src', base_url+'/uploads/'+ file.name);
            $.fancybox({
                'closeBtn' : true,
                'padding' : 0,
                'autoDimensions': false,
                'width': 'auto',
                'autoScroll': false,
                'href' : '#cropDiv'
            });
            $("#target").Jcrop({
                aspectRatio: 16 / 9,
                onSelect: getImageInformation
            });
//            $.ajax({
//                type: "post",
//                url : base_url + 'frame/create_frame',
//                dataType: "json",
//                data: {
//                    'frame_id': selected_id,
//                    'image_path': './uploads/'+ file.name
//                },
//                success: function(data){                    
//                    $("#selected_frame").attr('src', data.image_path);
//                    
//                },
//                complete: function(data){
//                    $.unblockUI();
//                }
//            });
        }
        // Put your options here
    });
});

function getImageInformation(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}
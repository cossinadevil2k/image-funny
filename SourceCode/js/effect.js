var frameDetailID = 0;
$(document).ready(function(){   
    var jcrop_api = null;
    var default_width = 600;
    var default_height = 400;
    var original_width = 0;
    var original_height = 0;
    var height = $("#selected_frame").height();
    var width = $("#selected_frame").width();
    var imageFile;
    var imageString = "";       //Store information about image 

    $("#Pattern").mCustomScrollbar({
        horizontalScroll:true,
        autoHideScrollbar: false,
        advanced:{
            updateOnContentResize: true,
            autoExpandHorizontalScroll: true
        },
        callbacks:{
            onTotalScroll: function(){
                id = $(this).attr('cat_id');
                var container = $(this).children().children().first();
                offset = container.children().length;
                $.ajax({
                    type: 'post',
                    url: '/home/get_more_frame',
                    dataType: 'json',
                    data:{
                        'categoryID': id,
                        'offset'    : offset
                    },
                    success: function(data){
                        if (data.status == 'SUCCESS'){
                            frames = data.frame_list;
                            var html;
                            for (i = 0; i < frames.length; i++){
                                html = '<div id="PatternImage'+frames[i].id+'" class="PatternImage" link="'+frames[i].link+'" frame_id="'+frames[i].id+'"><img src="/'+frames[i].pattern+'" width="100%"/></div>';                                
                                container.append(html);
                            }                            
                        }
                    }
                });
            }
        }
    });

    $("#Next").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","right");
    });
    
    $("#Previous").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","first");
    });
    
    $(".PatternImage").live('click',function(){
        var frame_id = $(this).attr('frame_id');
        $('#PatternImage'+selected_id).removeClass("Selected");
        $(this).addClass("Selected");
        selected_id = frame_id;
//        $("#selected_frame").attr('src', base_url + $('#PatternImage'+frame_id).attr('link'));
        $("#selected_frame").attr('frame_id', selected_id);      
    });
    
    $("#selectBtn").live('click', function(){
        $.fancybox.close();
        $.blockUI({
            message: '<h1>Vui lòng chờ ...</h1>'
        }); 
        x = $('#x').val() * original_height / $('#target').height();
        y = $('#y').val() * original_width / $('#target').width();
        crop_width = $('#w').val() * original_height / $('#target').height();
        crop_height = $('#h').val() * original_width / $('#target').width();
        imageString = frameDetailID + "|" + "./resources/users/" + imageFile.name + "|"+x+"|"+y+"|"+crop_width+"|"+crop_height;          
        $.ajax({
            type: "post",
            url : base_url + 'frame/create_thumb',
            dataType: "json",
            data: {
                'frame_id': selected_id,
                'imageString': imageString
            },
            success: function(data){
                $.unblockUI();                
                $("#effect_image").attr('src', data.thumb_path);
                $("#effect_image").attr('image_path', data.image_path);
                createEffect($("#PatternImage" + selected_id+ " img"));
            }
        });
    });
    
    $('.effect_selected').click(function(){
        createEffect($(this));
    });
    
    $('#fileupload').fileupload({
        dataType: 'json',
        start: function(){
          $.blockUI({
                message: '<h1>Vui lòng chờ ...</h1>'
            });  
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                if ((file.error != 'undefined') && (file.error == 'File is too big')){
                    alert('Vui lòng chọn ảnh có dung lượng nhỏ hơn 2MB.');
                }else{
                    imageFile = file;
                    $.ajax({
                        type: 'post',
                        url: base_url + 'frame/get_image_dimensions',
                        dataType: 'json',
                        data:{
                            'image_path': 'resources/users/'+ file.name
                        },
                        success: function(data){
                            var type_file = $('#fileupload').attr('file_type');
                            if(type_file!='watermark')
                            {
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

                                $("#target").attr('src', base_url+'resources/users/'+ file.name);
                                $.unblockUI();
                                $.fancybox({
                                    'padding':0,
                                    'closeBtn' : true,
                                    'href' : '#cropDiv',
                                    'aspectRatio': true,
                                    'width': 'auto',
                                    'height': 'auto',
                                    'scrolling': 'no'
                                });

                                aspect = 1.0;

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
                            else
                            {
                                $("#selected_image").attr('src', base_url+'resources/users/'+ file.name);
                            }
                        }
                    });
                }
            });
        }
    });
    
    $("#uploadE").live('click',function(){
        $.blockUI({
            message: '<h1>Vui lòng chờ ...</h1>'
        });
        $("#fileupload").trigger('click');
        $.unblockUI();
    }); 
    
    $("#download").live('click', function(){
        temp = $("#selected_frame").attr('src')
        path = temp.split(base_url);
        window.location = base_url + 'tao-khung/download?image='+path[1]+'' ;
    });
    
    function getImageInformation(c){
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    
    function createEffect(obj){
        image = $("#effect_image").attr('image_path');
        if (image==""){
            alert('Vui lòng tải ảnh lên trước khi chọn hiệu ứng.');
        }else{
            $.blockUI({
                message: '<h1>Vui lòng chờ ...</h1>'
            });
            var effect = $(obj).attr('effect');

            $.ajax({
                type: "post",
                url : base_url + 'frame/create_effect',
                dataType: "json",
                data: {
                    'image': image,
                    'effect':effect
                },
                success: function(data){
                    $.unblockUI();                
                    $("#selected_frame").attr('src', data.image_path);
                }
            });
        }
    }
});

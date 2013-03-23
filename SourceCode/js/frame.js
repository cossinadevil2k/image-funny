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
    var frame_count = 0;        //Count number of a frame
    var imageString = "";       //Store information about image
    insertAddButtonImage($(".PatternImage.Selected"));  

    $("#Pattern").mCustomScrollbar({
        horizontalScroll:true,
        autoHideScrollbar: true
    });
    
    $(".Category").click(function(){
        var id = this.id;
        window.location = base_url + 'tao-khung/' + id;
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
        crop_width = $('#w').val() * original_height / $('#target').height();
        crop_height = $('#h').val() * original_width / $('#target').width();
        imageString += frameDetailID + "|" + "./resources/users/" + imageFile.name + "|"+x+"|"+y+"|"+crop_width+"|"+crop_height+"#";
        if (frame_count == 1){            
            $.ajax({
                type: "post",
                url : base_url + 'frame/create_frame',
                dataType: "json",
                data: {
                    'frame_id': selected_id,
                    'imageString': imageString
                },
                success: function(data){
                    $.unblockUI();
                    $("#selected_frame").attr('src', data.image_path);
                    $(".addButton").remove();
                }
            });
        }else{
            $("#add"+frameDetailID+" img").attr('src', base_url + 'images/common/tick.png');
            $("#add"+frameDetailID).attr("href", "javascript:;");
            frame_count--;
            $.unblockUI();
        }
    });
    
     $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
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

                            $.fancybox({
                                'padding':0,
                                'closeBtn' : true,
                                'href' : '#cropDiv',
                                'aspectRatio': true,
                                'width': 'auto',
                                'height': 'auto',
                                'scrolling': 'no'
                            });

                            aspect = $("#frame"+frameDetailID).attr('aspect');

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
            });
        }
    });
    
    function insertAddButtonImage(object){
            frame_count = 0;
            selected_width = $(object).find('img').attr('image_w');
            selected_height = $(object).find('img').attr('image_h');
            $('#PatternImage'+selected_id+ ' input[type="hidden"]').each(function(){            
                var x = $(this).attr('x');
                var y = $(this).attr('y'); 
                var id = $(this).attr('id').split("frame")[1];
                var style = 'top: ' + (y*height/selected_height - 30) + 'px; left: ' + (x*width/selected_width + 145) + 'px;';
                $(".Center").append('<a href="javascript:addImage('+id+');" id="add'+id+'" class="addButton" style="position: absolute;' + style+'"><img src="'+base_url+'images/common/addButton.png" width="60px"/></a>');           
                frame_count ++;
            });
    }
    
    $("#download").live('click', function(){
        temp = $("#selected_frame").attr('src')
        path = temp.split(base_url);
        window.location = base_url + 'tao-khung/download?image='+path[1]+'' ;
    });
    
    $("#facebook").live('click', function(){
        
    });
    
    function getImageInformation(c){
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
});

function addImage(id){
    frameDetailID = id;
    $("#fileupload").trigger('click');
}





$(document).ready(function(){
   $(".Gallery").mCustomScrollbar({
        horizontalScroll:false,
        autoHideScrollbar: false,
        mouseWheel: false,
        advanced:{
            updateOnBrowserResize: true,
            updateOnContentResize: true
        },
        callbacks:{
            onTotalScroll: function(){
                id = $(this).parent().parent().attr('cat_id');
                var container = $(this).children().children().first();
                offset = container.children().length;
                $.ajax({
                    type: 'post',
                    url: '/home/get_more_frame',
                    dataType: 'json',
                    data:{
                        'offset' : offset,
                        'categoryID': id
                    },
                    success: function(data){
                        if (data.status == 'SUCCESS'){
                            frames = data.frame_list;
                            var html;
                            for (i = 0; i < frames.length; i++){
                                html = '<div class="PatternImage"><a href="'+'/tao-khung/'+id+"/"+frames[i].id+'"><img src="'+frames[i].pattern+'" width="100%"/></a></div>';                                
                                container.append(html);                                
                            }
                        }
                    }
                });
            }
        }
    });
});


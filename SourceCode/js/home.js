$(document).ready(function(){
   $(".Gallery").mCustomScrollbar({
        horizontalScroll:false,
        autoHideScrollbar: false,
        mouseWheel: false,
        callbacks:{
            onTotalScroll: function(){
                
                id = $(this).parent().parent().attr('cat_id');
                $.ajax({
                    type: 'post',
                    url: '/home/get_more_frame',
                    dataType: 'json',
                    data:{
                        'offset' : offset,
                        'categoryID': id
                    },
                    success: function(data){
                        if (data.status == 'NO_DATA'){
                            alert('NO DATA');
                        }else if (data.status == 'SUCCESS'){
                            
                        }
                    }
                });
            }
        }
    });
});


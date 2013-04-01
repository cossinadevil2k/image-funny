$(document).ready(function(){ 
    var path = '';
    var isFrame = true;
    $(".UploadBtn").click(function(){
        selectedCategory = $("#ddlCat").val();
        if (selectedCategory == 0){
            alert('Vui lòng chọn loại khung ảnh trước khi upload ảnh.');
        }else{   
            if ($(this).attr('id') == 'btnPattern'){
                isFrame = false;
            }else{
                isFrame = true;
            }
            $("#fileupload").trigger('click');
        }        
    });
    
    $('#fileupload').fileupload({
        dataType: 'json',
        formData: {
            categoryPath: path
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                temp = file.url;
                temp = temp.split(base_url);
                if (isFrame){
                    $("#txtLink").val(temp[1]);
                }else{
                    $("#txtPattern").val(temp[1]);
                }
            });
        }
    });
    
    $('#fileupload').bind('fileuploadsubmit', function (e, data) {
        if (isFrame){
            path = "frames/"+$("#cate"+selectedCategory).attr('path');
        }else{
            path = "patterns/"+$("#cate"+selectedCategory).attr('path');
        }        
        data.formData = {categoryPath: path};
    });
});


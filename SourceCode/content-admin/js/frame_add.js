$(document).ready(function(){ 
    $(".UploadBtn").click(function(){
        $("#fileupload").trigger('click');
    });
    
    $('#fileupload').fileupload({
        dataType: 'json',
        formData: {
            categoryPath: 'test'
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                alert(file.name);
            });
        }
    });
});


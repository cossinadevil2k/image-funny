$(document).ready(function(){
    $("#Pattern").mCustomScrollbar({
        horizontalScroll:true,
        autoHideScrollbar: false
    });
    
    $("#Next").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","last");
    });
    
    $("#Previous").live('click', function(){
        $("#Pattern").mCustomScrollbar("scrollTo","first");
    });
    
    $('#file_upload').uploadify({
        'fileSizeLimit' : '100MB',
        'swf'      : '/uploadify/uploadify.swf',
        'uploader' : '/uploadify/uploadify.php',
        'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file + ' was successfully uploaded with a response of ' + response + ':' + data);
        }
        // Put your options here
    });
});

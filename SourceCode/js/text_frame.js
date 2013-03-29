$(document).ready(function(){
   $(".ui-draggable").live('click', function(){
       $(".ui-draggable").removeClass("TextSelected");
       $(this).addClass("TextSelected");
   });
});
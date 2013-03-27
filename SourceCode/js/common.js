$(document).ready(function(){
   $(".MenuText label").live('click', function(){
       window.location.href = $(this).attr('link');
   });
});


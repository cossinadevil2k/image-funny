window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
        appId      : fb_app_id, // App ID from the App Dashboard
        status     : true, // check the login status upon init?
        cookie     : true, // set sessions cookies to allow your server to access the session?
        xfbml      : true,   // parse XFBML tags on this page?
        oAuth      : true
    });

    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
          console.log('connected');
        } else if (response.status === 'not_authorized') {
          console.log('not_authorized');
        } else {
          console.log('not_login');
        }
    });

    // Additional initialization code such as adding Event Listeners goes here

  };

  // Load the SDK's source Asynchronously
  // Note that the debug version is being actively developed and might 
  // contain some type checks that are overly strict. 
  // Please report such bugs using the bugs tool.
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/vi_VN/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false)); 

   $("#facebook").live('click', function(){
        FB.login(function(response) {
            if (response.authResponse) {
                $.ajax({
                    type:'post',
                    url: '/frame/post_to_facebook',
                    data:{
                        'imagePath' : $("#selected_frame").attr('path')
                    },
                    dataType: 'json',
                    beforeSend: function(){
                        $.blockUI({
                            message: '<h1>Vui lòng chờ ...</h1>'
                        });                             
                    },
                    success: function(data){
                        $.unblockUI();
                        if (data.status == "SUCCESS"){
                            alert("Ảnh đã được đăng lên Facebook thành công !");
                        }else{
                            alert("Có lỗi. Vui lòng thử lại sau.");
                        }
                    }
                });
            } else {
                
            }
        },{scope:'read_stream,publish_stream,offline_access'});
        return false;
    });


<!DOCTYPE html>
<html>
	<head>
	<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script src="js/jquery.popupWindow.js"></script> 
	</head>
	<body>
		<input type="text" id="featured_image" placeholder="Featured Image" name="featured_image" >
		<input type="button" value="Browse" id="imageUpload" ></li>
		<script type="text/javascript"> 
				$('#imageUpload').popupWindow({ 
						windowURL:'standalone-elfinder.php?mode=image', 
						windowName:'Filebrowser',
						height:490, 
						width:950,
						centerScreen:1
				}); 
		</script>
	</body>
</html>

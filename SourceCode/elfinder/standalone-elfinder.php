<!DOCTYPE html>
<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8"> 
				$().ready(function() {
						var mode = '<?php echo $_GET['mode']; ?>';

						var elf = $('#elfinder').elfinder({
								url : 'php/connector.php?mode=' + mode,  // connector URL (REQUIRED)
								getFileCallback : function(file) {
										if($("#featured_image", window.opener.document ).length>0){$("#featured_image", window.opener.document ).val(file);}
										if($("#featured_image_src", window.opener.document ).length>0){$("#featured_image_src", window.opener.document ).attr('src',file);}
										var str = file.split('/');
										var count = str.length;
										var strKq = file;
										if(count>0)
										{
											strKq = str[count-1];
											}
										
										if($("#lblbookurl", window.opener.document ).length>0){$("#lblbookurl", window.opener.document ).html(strKq);}
										window.close();
								},
								resizable: false
						}).elfinder('instance');
				});
		</script>
	</head>
	<body>
			<!-- Element where elFinder will be created (REQUIRED) -->
			<div id="elfinder"></div>
	</body>
</html>

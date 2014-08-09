<html>
	<head>
		<title>Hello there</title>
		
	</head>
	<body>
		<p id="input">Text to be translated</p>
		<br />
		<input id="range" type="range" min="1" max="10" />
		<br />
		<p id="count">Count</p>
		<p id="output"></p>
	</body>
	<script src="js/jquery-1.10.2.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#range').change(function(){
					$('#count').html($('#range').val());
				});
			});
			
		</script>
</html>
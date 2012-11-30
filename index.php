<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ColorBoom</title>
		<link href="css/reset.css" type="text/css" rel="stylesheet">
		<link href="css/normalize.css" type="text/css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
		
	</head>
	<body>
		<section id="colorapp" class="colorapp">
			<header class="colorheader">
				<div class="colorcontrols">
					<span class="preview" id="colorpreview"></span>
					<input id="colorinput" type="text">
					<button id="addcolor" disabled="disabled">Add Color</button>
				</div>
			</header>
			<section class="colors" id="colors">
				
			</section>
		</section>
		
		<script id="color_template" type="text/template">
			<div class="color">
				<ul class="steps">
					{{#each colors}}

					<li style="background-color:{{this.value}}; color:{{worbcolor}};">{{this.value}}</li>
					{{/each}}
				</ul>
			</div>
		</script>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
		<script src="js/libs/handlebars-1.0.0.beta.6.js"></script>
		<script src="js/libs/colorladder.js"></script>
		<script src="js/libs/underscore.js"></script>
		<script src="js/libs/backbone.js"></script>
		<script src="js/libs/backbone-localstorage.js"></script>
		
		<script src="js/models/color.js"></script>
		<script src="js/collections/colors.js"></script>
		<script src="js/views/colors.js"></script>
		<script src="js/views/app.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>

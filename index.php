<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ColorBoom</title>
		<link href="css/reset.css" type="text/css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
		
	</head>
	<body>
		<header>
			<h1>ColorBoom</h1>
			<p>Inspired by 0to255</p>
		</header>
		<section>
			<p class="about">
			I love using <a href="http://0to255.com">0to255</a> but it only does hex, and doesn't allow for multiple color comparisons.
			Yeah there are a lot of color pallete makers out there but I figure I'd try my hand at one and learn ember.js and building single page web apps while I was at it.
			</p>
		</section>
		<nav >
			<a href="#" class="add_color" id="add_color">Add Color</a>
		</nav>
		<section class="colors">
			<div class="color">
				<ul class="steps">
					<li>#000000</li>
				</ul>
				<ul class="copyoptions">
					<li>Hex</li>
					<li>RGB</li>
					<li>HSL</li>
					<li>CMYK</li>
					<li>CSS</li>
				</ul>
			</div>
		</section>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
		<script src="js/libs/handlebars-1.0.0.beta.6.js"></script>
		<script src="js/libs/underscore.js"></script>
		<script src="js/libs/backbone.js"></script>
		<script src="js/libs/d3.vs.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>

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
		<section id="colorapp">
			<section class="colors" id="colors">
				<div class="color" id="colorfor000">
					<input class="colorinput" type="text">
					<ul class="steps">
						
					</ul>
					<ul class="copyoptions">
						<li class="hex"><span>Hex</span></li>
						<li class="rgb"><span>RGB</span></li>
						<li class="HSL"><span>HSL</span></li>
						<li class="CMYK"><span>CMYK</span></li>
						<li class="CSS"><span>CSS</span></li>
					</ul>
				</div>
				<div class="color">
					<a href="#" id="new_color">Add Another Color</a>
				</div>
			</section>
		</section>
		
		<script id="color_template" type="text/template">

		</script>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
		<script src="js/libs/handlebars-1.0.0.beta.6.js"></script>
		<script src="js/libs/d3.v2.js"></script>
		<script src="js/libs/underscore.js"></script>
		<script src="js/libs/backbone.js"></script>
		<script src="js/libs/backbone-localstorage.js"></script>
		<script src="js/models/color.js"></script>
		<script src="js/collections/colors.js"></script>
		<script src="js/views/colors.js"></script>
		<script src="js/views/app.js"></script>
		<script src="js/app.js"></script>

		<script type="text/javascript">
			var rgb = '#abcdef',
				colors = [];
			for (i = 0; i < 101; i+=.5) {
				colors.push({rgb: getNewBrightnessColor(rgb, i), step: i});
			}
			console.log(colors);
			d3.select('#colorfor000 .steps').selectAll('li').data(colors).enter().append('li').attr('style', function(d,i) {
				return 'background-color:' + d.rgb + ';';
			}).text(function(d,i) { return d.rgb + ' ' + d.step + '%';});
			function getNewBrightnessColor(rgbcode, brightness) {
			    var r = parseInt(rgbcode.slice(1, 3), 16),
			        g = parseInt(rgbcode.slice(3, 5), 16),
			        b = parseInt(rgbcode.slice(5, 7), 16),
			        HSL = rgbToHsl(r, g, b),
			        RGB;
			        
			    $('#original_brightness').text(HSL[2] * 100);
			    
			    RGB = hslToRgb(HSL[0], HSL[1], brightness / 100);
			    rgbcode = '#'
			        + convertToTwoDigitHexCodeFromDecimal(RGB[0])
			        + convertToTwoDigitHexCodeFromDecimal(RGB[1])
			        + convertToTwoDigitHexCodeFromDecimal(RGB[2]);
			    
			    return rgbcode;
			}

			function convertToTwoDigitHexCodeFromDecimal(decimal){
			    var code = Math.round(decimal).toString(16);
			    
			    (code.length > 1) || (code = '0' + code);
			    return code;
			}
			/**
			 * Converts an RGB color value to HSL. Conversion formula
			 * adapted from http://en.wikipedia.org/wiki/HSL_color_space.
			 * Assumes r, g, and b are contained in the set [0, 255] and
			 * returns h, s, and l in the set [0, 1].
			 *
			 * @param   Number  r       The red color value
			 * @param   Number  g       The green color value
			 * @param   Number  b       The blue color value
			 * @return  Array           The HSL representation
			 */
			function rgbToHsl(r, g, b){
			    r /= 255, g /= 255, b /= 255;
			    var max = Math.max(r, g, b), min = Math.min(r, g, b);
			    var h, s, l = (max + min) / 2;

			    if(max == min){
			        h = s = 0; // achromatic
			    }else{
			        var d = max - min;
			        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
			        switch(max){
			            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
			            case g: h = (b - r) / d + 2; break;
			            case b: h = (r - g) / d + 4; break;
			        }
			        h /= 6;
			    }

			    return [h, s, l];
			}

			/**
			 * Converts an HSL color value to RGB. Conversion formula
			 * adapted from http://en.wikipedia.org/wiki/HSL_color_space.
			 * Assumes h, s, and l are contained in the set [0, 1] and
			 * returns r, g, and b in the set [0, 255].
			 *
			 * @param   Number  h       The hue
			 * @param   Number  s       The saturation
			 * @param   Number  l       The lightness
			 * @return  Array           The RGB representation
			 */
			function hslToRgb(h, s, l){
			    var r, g, b;

			    if(s == 0){
			        r = g = b = l; // achromatic
			    }else{
			        function hue2rgb(p, q, t){
			            if(t < 0) t += 1;
			            if(t > 1) t -= 1;
			            if(t < 1/6) return p + (q - p) * 6 * t;
			            if(t < 1/2) return q;
			            if(t < 2/3) return p + (q - p) * (2/3 - t) * 6;
			            return p;
			        }

			        var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
			        var p = 2 * l - q;
			        r = hue2rgb(p, q, h + 1/3);
			        g = hue2rgb(p, q, h);
			        b = hue2rgb(p, q, h - 1/3);
			    }

			    return [r * 255, g * 255, b * 255];
			}

		</script>

	</body>
</html>

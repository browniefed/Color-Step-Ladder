var app = app || {};
(function() {
	'use strict';

	app.Color = Backbone.Model.extend({
		default: {
			hex: '#FFFFFF',
			rgb: 'rgb(0,0,0)',
			hsl: 'hsl(0,0,0)',
			cmyk:'cmyk(0,0,0,0)',
		}
	});
}())
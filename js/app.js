var app = app || {};
$(function() {
	'use strict';
	//Setup Model
	app.Color = Backbone.Model.extend({
		defaults: {
			hex: '#000000',
			rgb: 'rgb(0,0,0)',
			hsl: 'hsl(0,0,0)'
		}
	});
	//Collection of Color models
	var Colors = Backbone.Collection.extend({
		model: app.Color,
		localStorage: new Store('colorboom'),
		selected: function() {

		},
		copy: function() {

		},
		step: function() {

		}
	});
	app.Colors = new Colors();

	//View

	var ColorView = Backbone.View.extend({
		tagname: 'div',
		className: 'colorContainer',
		events: {
			'click .hex':  'copyhex',
			'click .rgb':  'copyrgb',
			'click .hsl':  'copyhsl',
			'click .cmyk': 'copycmyk',
			'click .css':  'copycss'
		},
		render: function() {
			
		}
	});
})
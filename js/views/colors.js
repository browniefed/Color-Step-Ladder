var app = app || {};
(function(){
	app.ColorView = Backbone.View.extend({
		el: '#colors',
		colorTemplate: _.template($('#color_template').html()),
		events: {
			'click .hex': 'copyHex',
			'click .rgb': 'copyRgb',
			'click .hsl': 'copyHsl',
			'click .cmyk': 'copyCmyk'
		},
		initialize: function() {
			
		}
	});
}());

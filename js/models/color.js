var app = app || {};

(function() {
	'use strict';

	app.Color = Backbone.Model.extend({
		default: {
			hex: '#FFFFFF',
			list: []
		}
	});

}())
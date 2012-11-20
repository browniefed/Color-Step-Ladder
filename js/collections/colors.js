var app = app || {};
(function() {
	'use strict';

	var Colors = Backbone.Collection.extend({
		model: app.Color,
		localStorage: new Store('colorboom')
	});

	app.Colors = new Colors();
}());
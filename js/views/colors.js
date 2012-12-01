var app = app || {};

(function(){
	app.ColorView = Backbone.View.extend({
		
		tagName: 'div',
		className: '.djfjd',
		events: {
			'click .delete': 'clear'
		},
		template: Handlebars.compile($('#color_template').html()),
		
		initialize: function() {
			this.model.on('destroy', this.remove, this);

			Handlebars.registerHelper('worbcolor', function() {
			var textColor = (parseFloat(this.step) >= .5 ? '#242424' : '#FFFFFF');
			  return new Handlebars.SafeString(textColor);
			});
		},

		render: function() {

			this.$el.html(this.template(this.model.get('color')));
			return this;
		},

		clear: function() {
			this.model.destroy();
		},
		applyScrollbar: function() {
			console.log(this.$el);
			this.$el.find('.steps').mCustomScrollbar();
		}
	});
}());

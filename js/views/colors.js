var app = app || {};

(function(){
	app.ColorView = Backbone.View.extend({
		
		tagName: 'div',
		el: '#colors',
		template: Handlebars.compile($('#color_template').html()),
		
		initialize: function() {
			Handlebars.registerHelper('worbcolor', function() {
			var textColor = (parseFloat(this.step) >= .5 ? '#242424' : '#FFFFFF');
			  return new Handlebars.SafeString(textColor);
			});
		},

		render: function() {
			steps = this.getSteps();
			console.log(this.$el);
			this.$el.append(this.template(steps));
			return this;
		},

		getSteps: function() {
			var color = this.model.get('color');
			return {colors:ColorLadder.Convert(color).List({step:3})};
		}
	});
}());

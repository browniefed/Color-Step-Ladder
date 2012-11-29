var app = app || {};

(function(){
	app.ColorView = Backbone.View.extend({
		
		tagName: 'div',
		el: '#colors',
		template: Handlebars.compile($('#color_template').html()),
		
		initialize: function() {
			//this.model.on('destroy', this.remove, this);
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

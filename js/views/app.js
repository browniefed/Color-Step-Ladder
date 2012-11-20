var app = app || {};
(function() {
	app.AppView = Backbone.View.extend({

		el: '#colorapp',
		events: {
			'keyup #newcolor': 'validatecolor',
			'click #addcolor':  'addcolor'
		},
		initialize: function() {
			this.input = this.$('#newcolor');
			this.addColorButton = this.$('#addcolor');

			app.Colors.on('add', this.addColor, this);
			app.Colors.on('all', this.render, this);
		},
		render: function() {

		},
		addcolor: function() {
			var color = new app.ColorView({model: color});
			$('#colors').append(view.render().el);
		},
		validatecolor: function() {
			var re = /^#?(?:[0-9a-fA-F]{3}){1,2}$/i,
			match = re.exec(this.input.val().trim());
			if (match) {
				this.addColorButton.attr('disabled',false);
			} else {
				this.addColorButton.attr('disabled',true);
			}
		}
	});
}())
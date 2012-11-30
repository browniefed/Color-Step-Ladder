var app = app || {};
(function() {
	app.AppView = Backbone.View.extend({

		el: '#colorapp',
		events: {
			'keyup #colorinput': 'validatecolor',
			'click #addcolor':  'createcolor',
			'change #colorinput': 'validatecolor'
		},
		initialize: function() {
			this.input = this.$('#colorinput');
			this.addColorButton = this.$('#addcolor');
			this.preview = this.$('#colorpreview');
			app.Colors.on('add', this.addcolor, this);
			app.Colors.on('all', this.render, this);
			this.validatecolor();
		},
		render: function() {

		},
		addcolor: function(color) {
			var view = new app.ColorView({model: color});
			view.render().el;
		},

		createcolor: function() {
			var val = this.input.val().trim();
			app.Colors.create({color: val});
			this.input.val('').trigger('change');
		},
		validatecolor: function() {

			var valid = ColorLadder.Convert().Validate(this.input.val().trim());
		
			if (valid) {
				this.addColorButton.attr('disabled',false);
				this.preview.css('background-color', this.input.val().trim());
			} else {
				this.addColorButton.attr('disabled',true);
				this.preview.css('background-color', '#FFFFFF');
			}
		}
	});
}())
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
			var height = $(window).height() - this.$el.find('.colorheader').outerHeight() - 14;
			this.$el.find('#colors').height(height);
			this.validatecolor();

		},
		render: function() {
			console.log('rendering app');
		},
		addcolor: function(color) {
			var view = new app.ColorView({model: color});
			$('#colors').append(view.render().el);
			view.applyScrollbar();
		},

		createcolor: function() {
			var val = this.input.val().trim(),
				list = ColorLadder.Convert(val).List({step:3});
			app.Colors.create({hex: val, color: list});
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
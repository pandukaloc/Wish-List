var app = app || {};

app.views.sharedView = Backbone.View.extend({
	el: ".container",

	render: function () {
		console.log("render");
		template = _.template($('#shared-view-template').html());
		this.$el.html(template(app.user.attributes));
		this.collection.each(function (item) {
			console.log(item);
			var sharedViewItems = new app.views.sharedViewItems({model: item});
			sharedViewItems.render();
		});

	},

});

var app = app || {};

app.views.sharedViewItems = Backbone.View.extend({

	el:"#item",
	render:function () {
		template = _.template($('#item-template').html());
		this.$el.append(template(this.model.attributes));
		$("#delete_button").remove();
		$("#edit_button_new").remove();
	}
});

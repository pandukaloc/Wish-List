var app = app || {};

app.views.ListView = Backbone.View.extend({
	el: ".container",

	render: function (is_empty) {
		console.log("render");
		template = _.template($('#list-template').html());
		console.log(app.user.attributes);
		this.$el.html(template(app.user.attributes));

		if(is_empty){
			$("#dis_none").removeClass('d-none');
		
		}

		this.collection.each(function (item) {
			console.log(item);
			var itemView = new app.views.ItemView({model: item});
			itemView.render();
		});

	}

});

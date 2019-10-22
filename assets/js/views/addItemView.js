var app = app || {};

app.views.AddItemView = Backbone.View.extend({
	el: ".container",

	render: function () {
		template = _.template($('#add_Item_template').html());
		this.$el.html(template);
	},
	events: {
		"click #addItemButton": "addItem"
	},

	addItem: function (e) {
		this.undelegateEvents();
		e.preventDefault();
		e.stopPropagation();
		var validateForm = validateaddItemForm();
		if (!validateForm) {
			// alert("Please fill all the forms");
			$("#errAdd").html("Please fill all the feilds");

		} else {
			this.model.set(validateForm);
			// console.log(app.user.get("user_id"));
			var url = this.model.url + "addItem/" + app.user.get("user_id");
			console.log(url);
			console.log(this.model.attributes);
			this.model.save(this.model.attributes, {
				"url": url,
				wait:true,
				success: function (model, reponse) {
					app.appRouter.navigate("#list", {trigger: true, replace: true});
				}
			});

		}


	}


});

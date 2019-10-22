var app = app || {};

app.views.editView = Backbone.View.extend({
	el: ".container",

	render: function () {
		template = _.template($('#edit_template').html());
		this.$el.html(template(this.model.attributes));
	},
	events: {
		"click #update_button": "updateItem"

	},
	updateItem: function (e) {
		e.preventDefault();
		e.stopPropagation();

		var validateForm = validateEditForm();
		if (!validateForm) {
			$("#errEdit").html("Please fill all the feilds");

		}
		else {

			this.model.set(validateForm);
			var url = this.model.url + "updateItem/" + this.model.attributes.id;
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, response) {
					console.log(response);
					//get the closable setting value.
					var closable = alertify.alert().setting('closable');
//grab the dialog instance using its parameter-less constructor then set multiple settings at once.
					alertify.alert().setting({
							'label':'Ok',
							'message': response.message,
							'onok': app.appRouter.navigate("#list", {trigger: true, replace: true})
						}).show();
					setTimeout(app.appRouter.navigate("#list", {trigger: true, replace: true}), 600000);
					//app.appRouter.navigate("#list", {trigger: true, replace: true});
				},
				error: function (model, response) {
					alert("failed" + response + model);
				}
			})

		}
	}
});

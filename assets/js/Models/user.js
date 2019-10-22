var app = app || {};
app.models.User = Backbone.Model.extend({
	urlRoot: '/Wishlist/api/User/',
	defaults: {
		username: "",
		password: "",
		user_id: null,
		list_name: "",
		list_description: ""
	},
	url: '/Wishlist/api/User/',


});

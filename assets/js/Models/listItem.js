var app = app || {};

app.models.Item = Backbone.Model.extend({
	urlRoot: '/Wishlist/api/Item/',
	defaults: {
		id: null,
		item_price: null,
		item_desc: null,
		item_url: null,
		categories: null,
		status: null,
		item_name: null
	},
	url: '/Wishlist/api/Item/',
});

app.collections.ItemCollection = Backbone.Collection.extend({

	model: app.models.Item,

	url: '/Wishlist/api/Item/'
});

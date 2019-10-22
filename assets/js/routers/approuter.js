var app = app || {};

app.routers.AppRouter = Backbone.Router.extend({
	//Initially place where it will load and what will load when the list url is set
	routes: {
		"": "home",
		"list": "viewList",
		"list/addItem": "addItem",
		"list/edit/:id": "editItem",
		"share/:id": "sharedLink",
		"list/delete/:id": "deleteItem",
		"logout": "logout"
	},
//Can change home and the viewlist to any name

	home: function () {
		userJson = JSON.parse(localStorage.getItem("user"));
		if (userJson == null) {
			if (!app.loginView) {
				app.user = new app.models.User();
				//initialize view
				app.loginView = new app.views.LoginFormView({model: app.user});
				app.loginView.render();
			}
		} else {
			this.viewList();
		}
	},

	viewList: function () {
		userJson = JSON.parse(localStorage.getItem("user"));
		console.log(userJson);
		if (userJson != null) {

			app.user = new app.models.User(userJson);
			app.listView = new app.views.ListView({collection: new app.collections.ItemCollection()});
			var url = app.listView.collection.url + "displayAllItems?user_id=" + app.user.get("user_id");
			console.log(url);

			app.listView.collection.fetch({
				reset: true,
				"url": url,
				success: function (collection, response) {
					console.log(response);
					app.listView.render(false);
				},
				error: function (model, xhr, options) {
					if (xhr.status == 404) {
						app.listView.render(true);
					}
				}
			});


		} else {
			app.appRouter.navigate("#", {trigger: true, replace: true});
			console.log("else")
		}
	},

	addItem: function () {
		userJson = JSON.parse(localStorage.getItem("user"));
		console.log(userJson);
		if (userJson != null) {

			app.user = new app.models.User(userJson);
			app.listItem = new app.models.Item();
			app.AddItemView = new app.views.AddItemView({model: new app.models.Item()});
			app.AddItemView.render();

		} else {
			app.appRouter.navigate("#", {trigger: true, replace: true});
		}
	},

	editItem: function (id) {
		userJson = JSON.parse(localStorage.getItem("user"));
		if (userJson != null) {
			app.user = new app.models.User(userJson);

			var editModel = app.listView.collection.get(id);
			app.editView = new app.views.editView({model: editModel});
			app.editView.render();
		} else {
			app.appRouter.navigate("#", {trigger: true, replace: true});
		}
	},
	deleteItem: function (id) {
		userJson = JSON.parse(localStorage.getItem("user"));
		if (userJson != null) {
			app.user = new app.models.User(userJson);

			var deleteModel = app.listView.collection.get(id);
			deleteModel.destroy({"url": deleteModel.url + "deleteItem/" + id});
			app.listView.collection.remove(id);
			app.appRouter.navigate("#", {trigger: true, replace: true});
		} else {
			app.appRouter.navigate("#", {trigger: true, replace: true});
		}
	},
	logout: function () {
		localStorage.clear();
		window.location.href = "";
	},

	sharedLink: function (id) {
		if (!app.sharedView) {
			app.user = new app.models.User();
			app.user.fetch({"url": app.user.url + "getUser/" + id});
			app.sharedView = new app.views.sharedView({collection: new app.collections.ItemCollection()});
			var url = app.sharedView.collection.url + "displayAllItems/?user_id=" + id;

			app.sharedView.collection.fetch({
				reset: true,
				"url": url,
				wait: true,
				success: function (collection, response) {
					console.log(response);
					app.sharedView.render();

				}
			});

		} else {
			console.log("Shared View TRY");
			app.sharedView.render();
		}
	},


});

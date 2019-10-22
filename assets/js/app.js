var app = app || {};
app.views = {};
app.routers = {};
app.models = {};
app.collections = {};


//Validation for login. If not there it will return false
function validateLoginForm() {
	var user = {
		'username': $("input#inputUsername").val(),
		'password': $("input#inputPassword").val()
	};
	if (!user.username || !user.password) {
		return false;
	}
	return user;
}

//Validation for signup. If not there it will return false
function validateRegisterForm() {
	var user = {
		'username': $("input#regUsername").val(),
		'password': $("input#regPassword").val(),
		'list_name': $("input#regListName").val(),
		'list_description': $("input#regListDes").val()
	};
	if (!user.username || !user.password|| !user.list_name|| !user.list_description) {
		return false;
	}
	return user;
}

//Validation for add item. If not there it will return false
function validateaddItemForm() {
	var userAdd = {
		'item_name': $("input#itemName").val(),
		'item_price': $("input#itemPrice").val(),
		'item_url': $("input#itemUrl").val(),
		'categories': $("select#itemCategory").val(),
		'status': $("select#itemStatus").val(),
		'item_desc':$("input#itemDesc").val()
	};
	if (!userAdd.item_name || !userAdd.item_price ||!userAdd.item_desc || !userAdd.item_url|| !userAdd.categories|| !userAdd.status) {
		return false;
	}
	return userAdd;
}

function validateEditForm() {
	var itemEditeddata = {
		'item_name': $("input#itemName").val(),
		'item_price': $("input#itemPrice").val(),
		'item_url': $("input#itemUrl").val(),
		'categories': $("select#itemCategory").val(),
		'status': $("select#itemStatus").val(),
		'item_desc':$("input#eitemDesc").val()
	};
	if (!itemEditeddata.item_name || !itemEditeddata.item_desc || !itemEditeddata.item_price || !itemEditeddata.item_url|| !itemEditeddata.categories|| !itemEditeddata.status) {
		return false;
	}
	return itemEditeddata;
}


// Start of the routing. The starting point
$(document).ready(function () {
	app.appRouter = new app.routers.AppRouter();
	$(function () {
		Backbone.history.start();
	});
});

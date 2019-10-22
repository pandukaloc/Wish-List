var app = app || {};

app.views.LoginFormView = Backbone.View.extend({
	el: ".container",

	render: function () {
		template = _.template($('#login_template').html());
		this.$el.html(template(this.model.attributes));
		$("#logout").hide();
	},
	events: {
		"click #login_button": "do_login",
		"click #signup_button": "do_register"

	},
	do_login: function (e) {
		e.preventDefault();
		e.stopPropagation();
		//App ja validation to here
		var validateForm = validateLoginForm();
		if (!validateForm) {
			$("#errLog").html("Please fill the form");
		} 
		else {
			this.model.set(validateForm);
			var url = this.model.url + "login";
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, reponse) {
					$("#logout").show();
					localStorage.setItem('user', JSON.stringify(model));
					app.appRouter.navigate("#list", {trigger: true, replace: true});

				},
				error:function (model,xhr) {
					if(xhr.statsu=400){
						$("#errLog").html("Username or Password Incorrect");
					}
				}
			});
		}
	},
	do_register: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = validateRegisterForm();
		if (!validateForm) {
			$("#errSign").html("Please fill the form");
		} else {
			this.model.set(validateForm);
			var url = this.model.url + "register";
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, response) {
					// $('.container-cust').stop().removeClass('active');
					console.log("Register Done");
					alert(response.message + '\n Please Login');

				},
				error:function (model,xhr) {
					if(xhr.statsu=409){
						$("#errSign").html(xhr.responseJSON.status);
					}else {
						$("#errSign").html();
					}
				}
			});
		}

		$('#regUsername').val('');
		$('#regPassword').val('');
		$('#regListName').val('');
		$('#regListDes').val('');

	}

});

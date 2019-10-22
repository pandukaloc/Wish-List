<?php

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pulgins/ssi-modal/js/ssi-modal.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"  type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"  type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/app.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/Models/user.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/Models/listItem.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/loginFormView.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/listView.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/itemVIew.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/addItemView.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/editView.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/sharedView.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/views/sharedViewItems.js" type="text/javascript"></script>
    <script src="../../../Wishlist/assets/js/routers/approuter.js" type="text/javascript"></script>

    <!-- Adding CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../../../Wishlist/assets/pulgins/alertify.min.js"></script>
    <script src="../../../Wishlist/assets/pulgins/jquery-validate/jquery.validate.js"></script>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- include the style -->
    <link rel="stylesheet" href="../../../Wishlist/assets/pulgins/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="../../../Wishlist/assets/pulgins/css/themes/default.min.css" />

</head>
<body>

<script type="text/template" id="login_template">
    <div class="login-div">
        <div class="row no-gutters">
            <div class="col-md-4 mx-auto">
                <div class="card card-signin my-5">
                    <ul class="nav nav-pills " id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                               role="tab"
                               aria-controls="pills-home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-r" id="pills-profile-tab" data-toggle="pill"
                               href="#pills-profile"
                               role="tab"
                               aria-controls="pills-profile" aria-selected="false">Sign up</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>
                                <form class="form-signin">
                                    <p id="errLog"></p>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" placeholder="Enter username"
                                               required autofocus id="inputUsername">
                                        <label for="inputEmail">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                               placeholder="Password"
                                               required name="password">
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <button id="login_button" class="btn btn-lg btn-outline-primary btn-block "
                                            type="submit">Log in
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign Up</h5>
                                <form class="form-signin">
                                    <p id="errSign"></p>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" placeholder="Enter username"
                                               required autofocus id="regUsername">
                                        <label for="">Username</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="regPassword" class="form-control"
                                               placeholder="Password"
                                               required name="password">
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" placeholder="Enter username"
                                               required autofocus id="regListName">
                                        <label for="">List name</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" placeholder="Enter username"
                                               required autofocus id="regListDes" ">
                                        <label for="">List description</label>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block " id="signup_button"
                                            type="submit">Sign up
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="list-template">

    <div class="header" style="position:absolute;top:0;left:0;width:100%">
        <nav class="navbar navbar-expand-lg navbar-light nav-color">

            <a class="navbar-brand" href=""><%=username%></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <a href="#logout" id="logout" class="btn btn-secondary my-2 my-sm-0">
                        <i class="fa fa-sign-out"aria-hidden="true"></i> Log out</a>
                </ul>

            </div>
        </nav>

    </div>


    <div id="item">
        <div class="table-title">
            <div class="row align-items-center">
                <div class="col-sm-12 text-center">
                    <h1 class="ls-name"><%=list_name%></h1>
                    <h2 class="ls-des"><%=list_description%></h2>
                </div>
                <div class="col-sm-12">
                    <a href="#list/addItem" class="card-link add-she" id="addItemViewButton"><i class="fa fa-plus"></i>
                        Add New</a>
                    <a href="#share/<%=user_id%>" target="_blank" class="card-link add-she" id="share_link"><i
                            class="fa fa-share-square-o" aria-hidden="true"></i>
                        Share</a>
                </div>
                <div class="col-md-12 text-center" style="color: red;">
                    <p id="dis_none" class="d-none">No items found. Please add items.</p>
                </div>
            </div>
        </div>
    </div>

</script>


<script type="text/template" id="item-template">
    <div class="row no-gutters">
        <div class="col-md-6 offset-md-3">
            <div class="card card-list">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><%=item_name%></h4>
                        </div>
                    </div>
                    <p class="card-text pri-li"><%=item_desc%></p>
                    <p class="card-text pri-li">Rs.<%=item_price%></p>
                    <div class="row" style="margin-bottom: 5px">
                        <div class="col-md-5" style="color: #004188;">
                            Category : <b> <%if(categories=='1'){%>
                                Birthday
                                <%}else if(categories=='2'){%>
                                Anniversary
                                <%}else if(categories=='3'){%>
                                Christmas
                                <%}else{%>
                                Other<%}%></b>
                        </div>
                        <div class="col-md-6" style="color: #004188;">
                            Priority : <b><%if(status=='1'){%>
                                Must Have
                                <%}else if(status=='2'){%>
                                Would be Nice to Have
                                <%}else if(status=='3'){%>
                                Maybe
                                <%}else{%>
                                Never<%}%></b>
                        </div>
                    </div>


                    <p class="card-text pri-li">
                        <a href="<%=item_url%>" class="" style=" color: #007bff;  text-decoration: underline;" target="_blank">Go to website</a>
                    </p>
                    <div class="text-right">
                        <a class="btn btn-sm btn-primary btn-effect btn-effect1 btn-effect1b edit" title="Edit" data-toggle="tooltip" id="edit_button_new"
                           href="#list/edit/<%=id%>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        <a class="btn btn-sm btn-danger btn-effect btn-effect1 btn-effect1f" title="Delete" data-toggle="tooltip" href="#list/delete/<%=id%>"
                           id="delete_button">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                    </div>
                </div>
            </div>

        </div>
    </div>



</script>


<script type="text/template" id="add_Item_template">
    <div class="row no-gutters align-items-center">
        <div class="col-md-6 offset-md-3">
            <div class="update-title">
                <h2>Add an item</h2>
            </div>
            <div class="content">
                <p id="errAdd"></p>
                <form id="newitem">
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input required type="text" class="form-control" id="itemName">
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item Description</label>
                        <input required type="text" class="form-control" id="itemDesc">
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item price</label>
                        <input required type="text" class="form-control" id="itemPrice">
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item URL</label>
                        <input required type="url" class="form-control" id="itemUrl">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categories</label>
                        <select class="form-control" id="itemCategory">
                            <option
                                value="1">Birthday
                            </option>
                            <option
                                value="2">Anniversary
                            </option>
                            <option
                                value="3">Christmas
                            </option>
                            <option
                                value="4">Other
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Priority</label>
                        <select class="form-control" id="itemStatus">
                            <option
                                value="1">Must have
                            </option>
                            <option
                                value="2">Would be nice to have
                            </option>
                            <option
                                value="3">Maybe
                            </option>
                            <option
                                value="4">Never
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info add-new float-right" id="addItemButton">
                        <i class="fa fa-plus"></i> Add New Item
                    </button>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript">
    jQuery(function ($) {
        $('#newitem').validate({
            rules: {
                itemName: {
                    required: true
                },
                eitemDesc: {
                    required: true,
                    lettersonly: true

                },
                itemPrice: {
                    required: true


                },
                itemUrl: {
                    required: true,
                    url: true

                }


            },
            messages: {
                itemName: {
                    required: "Please enter item name"
                },

                eitemDesc: {
                    required: "Please enter item description",
                    lettersonly: "Please enter letters only"
                },
                itemPrice: {
                    required: "Please enter the item website url"

                },
                itemUrl: {
                    required: "Please enter the Url",
                    url:"Please enter valid URL"


                }
            }
        });
    });

    if (!($("#newitem").valid())) {
        $('#addItemButton').prop('disabled');
    }else{
        $("#addItemButton").removeAttr("disabled");

    }
    (function($) {
    $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
    if (inputFilter(this.value)) {
    this.oldValue = this.value;
    this.oldSelectionStart = this.selectionStart;
    this.oldSelectionEnd = this.selectionEnd;
    } else if (this.hasOwnProperty("oldValue")) {
    this.value = this.oldValue;
    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
    }
    });
    };
    }(jQuery));

    $("#itemPrice").inputFilter(function(value) {
    return /^-?\d*[.,]?\d{0,2}$/.test(value); });
</script>

<script type="text/template" id="edit_template">
    <div class="row no-gutters align-items-center" style="height: 100vh;">
        <div class="col-md-6 offset-md-3">
            <div class="update-title">
                <h2>Update an item</h2>
            </div>
            <div class="content">
                <form id="editfrm" name="editfrm">
                    <p id="errEdit"></p>
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" id="itemName" name="itemName" value="<%=item_name%>">
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item Description</label>
                        <input required type="text" class="form-control" id="eitemDesc" name="eitemDesc" value="<%=item_desc%>" >
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item price</label>
                        <input type="text" class="form-control" id="itemPrice" name="itemPrice" value="<%=item_price%>">
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item URL</label>
                        <input type="url" class="form-control" id="itemUrl" name="itemUrl" value="<%=item_url%>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categories</label>
                        <select class="form-control" id="itemCategory" name="itemCategory">
                            <option
                            <%if(categories==1){%>selected<%}%> value="1">Birthday</option>
                            <option
                            <%if(categories==2){%>selected<%}%> value="2">Anniversary</option>
                            <option
                            <%if(categories==3){%>selected<%}%> value="3">Christmas</option>
                            <option
                            <%if(categories==4){%>selected<%}%> value="4">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Priority</label>
                        <select class="form-control" id="itemStatus" name="itemStatus">
                            <option
                            <%if(status==1){%>selected<%}%> value="1">Must have</option>
                            <option
                            <%if(status==2){%>selected<%}%> value="2">Would be nice to have</option>
                            <option
                            <%if(status==3){%>selected<%}%> value="3">Maybe</option>
                            <option
                            <%if(status==4){%>selected<%}%> value="4">Never</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info add-new float-right" id="update_button" >
                        <i class="fa fa-plus"></i> Update Item
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        jQuery(function ($) {
            $('#editfrm').validate({
                rules: {
                    itemName: {
                        required: true
                    },
                    eitemDesc: {
                        required: true,
                        lettersonly: true

                    },
                    itemPrice: {
                        required: true


                    },
                    itemUrl: {
                        required: true,
                        url: true

                    }


                },
                messages: {
                    itemName: {
                        required: "Please enter item name"
                    },

                    eitemDesc: {
                        required: "Please enter item description",
                        lettersonly: "Please enter letters only"
                    },
                    itemPrice: {
                        required: "Please enter the item website url"

                    },
                    itemUrl: {
                        required: "Please enter the Url",
                        url:"Please enter valid URL"


                    }
                }
            });
        });
      
        if (!($("#editfrm").valid())) {
            $('#update_button').prop('disabled');
            }else{
            $("#update_button").removeAttr("disabled");
            
        }

        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    }
                });
            };
        }(jQuery));

        $("#itemPrice").inputFilter(function(value) {
         return /^-?\d*[.,]?\d{0,2}$/.test(value); });
        </script>


<script type="text/template" id="shared-view-template">

    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <p><%=username%></p>
            <h3 style="margin-bottom: 10px;color: #000000;"><%=listname%></h3>
            <h5 style="font-size: 16px; margin-bottom: 10px;color: #000000;"> <%=listdes%></h5>
        </div>
    </div>

    <div id="item"></div>

</script>

<!---->
<!--<div class="header">-->
<!--	<nav class="navbar navbar-expand-lg navbar-light nav-color">-->
<!--		<a class="navbar-brand" href=""><%=username%></a>-->
<!--		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"-->
<!--				aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">-->
<!--			<span class="navbar-toggler-icon"></span>-->
<!--		</button>-->
<!---->
<!--		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">-->
<!--			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">-->
<!---->
<!--			</ul>-->
<!--			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">-->
<!--				<a href="#logout" id="logout" class="btn btn-outline-success my-2 my-sm-0">LOGOUT</a>-->
<!--			</ul>-->
<!---->
<!--		</div>-->
<!--	</nav>-->
<!---->
<!--</div>-->

<div class="container" style="margin-top: 70px;">

</div>

</body>
</html>

<style>

    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }

    body {
        background: #e0dcdc8c;
        font-family: 'PT Sans', sans-serif;
        font-size: 16px;

    }
    .error{
        color: red;
        font-size: 16px;
    }

    #errLog {
        text-align: center;
        margin-bottom: 0;
        color: red;
        font-size: 14px;
    }

    #errSign {
        text-align: center;
        margin-bottom: 0;
        color: red;
        font-size: 14px;
    }
    #errAdd  {
        text-align: center;
        margin-bottom: 0;
        color: red;
        font-size: 14px;
    }
    #errEdit {
        text-align: center;
        margin-bottom: 0;
        color: red;
        font-size: 14px;
    }

    .card-signin {
        border: 1px solid #2c94fb96 !important;

        border-radius: 1rem;
        -webkit-box-shadow: 2px -2px 18px 1px rgba(1, 41, 80, 0.65);
        -moz-box-shadow: 2px -2px 18px 1px rgba(1, 41, 80, 0.65);
        box-shadow: 2px -2px 18px 1px rgba(1, 41, 80, 0.65);
        margin: 0 0 !important;

    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
        background-color: #3086e4;
        border-bottom-left-radius: 3em;
        border-bottom-right-radius: 1em;
    }

    .nav-item.active {
        background-color:#3086e4 !important;
    }

    .nav-link.active {
        color: #fff !important;
        background-color: #3086e4 !important;
        border: 0.5px solid #3086e4;
    }

    .nav-link.active-r {

        background-color: #a0d2e9 !important;

    }

    .tab-pane.fade.active {
        background-color: #3086e4;
        border-radius: 1em;
    }

    #login_button:hover {
        box-shadow: 0 0 0 0.2rem rgba(3, 31, 62, 0.46) !important;
        background-color: #003d80 !important;
        border-color: #3c96f7b3 !important;
    }
    #signup_button:hover {
        box-shadow: 0 0 0 0.2rem rgba(3, 31, 62, 0.46) !important;
        background-color: #003d80 !important;
        border-color: #3c96f7b3 !important;
    }

    .form-signin {
        width: 100%;
    }
#pills-tabContent{
    border-bottom-left-radius: 5em;
    border-bottom-right-radius: 1em;
}
    .form-signin .btn {
        font-size: 20px;
        border-radius: 2rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 7px 0;
        transition: all 0.2s;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input {
        height: auto;
        border-radius: 1rem;
    }

    .form-label-group > input,
    .form-label-group > label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 52%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
        cursor: pointer;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    .btn-google {
        color: white;
        background-color: #ea4335;
    }

    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }

    /*Pills bar*/
    .nav-pills .nav-link {
        border-radius: 1rem 0.25rem 0.25rem 0.25rem;
    }

    .nav-pills .nav-link-r {
        border-radius: 0.25rem 1rem 0.25rem 0.25rem;
    }

    .nav-item {
        width: 50%;
        text-align: center;
    }

    /*Pills bar*/

    /*Table styling*/
    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }

    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }

    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }

    .table-title .add-new i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;
    }

    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table th:last-child {
        width: 100px;
    }

    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }

    table.table td a.add {
        color: #27C46B;
    }

    .edit {
        color: #fff;
        background-color: #004188;
        border-color: #004188;
        margin-right: 5px;
    }

    .delete {
        color: #ffffff;
    }



    .delete:hover {
        color: darkred;;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }

    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }

    table.table .form-control.error {
        border-color: #f50000;
    }

    table.table td .add {
        display: none;
    }

    /*Table styling*/

    /*#logout {
        border: 1px solid black;
        padding: 7px 10px;
        color: black;
        margin-top: 10px;
    }
*/
    /*.header {
        margin-top: 9px;
    }*/

    .card-link {
        border: 1px solid #ffffff;
        padding: 4px 10px;
        font-size: 14px;
        color: #004188;
        border-radius: 4px;

    }

    .card-link:hover {
        color: #ffffff;
        background-color: #004188;
    }

    .pri-li {
        margin-bottom: 5px;
    }

    .card-list {

        margin-bottom: 5px;
        border-radius: 10px;
        background-color: #ffffff;
        border: 2px solid #004188;
        -webkit-box-shadow: 3px 5px 5px 3px rgba(192,193,194,0.73);
        -moz-box-shadow: 3px 5px 5px 3px rgba(192,193,194,0.73);
        box-shadow: 3px 5px 5px 3px rgba(192,193,194,0.73);

    }

    .card-list p, h5, h3, h4 {
        color: #002f63;
    }

    .nav-color {
        background-color: #004188;
        padding: 4px 150px;
    }

    .nav-color .navbar-brand {
        color: #ffffff;
    }

    .nav-color .navbar-brand:hover {
        color: #ffffff;
        background-color: #3a6fa9;
    }

    .add-she {
        background-color: #eaedf1;
        border: 1px solid #004188;
    }

    .table-title {
        margin-top: 9px;
    }

    .card-link + .card-link {
        margin-left: 0;
    }

    .ls-name {
        color: #000000;
    }

    .ls-des {
        color: #000000;
    }

    #logout {
        background-color: #eaedf1;
        color: #004188;
        border-color: #ffffff;
    }

    #logout:hover {
        background-color: #067effdb;
        color: white;
    }

    .add-new {
        background-color: #3a6fa9;
        color: #ffffff;
    }

    .btn-block{
        border: 2px solid white;
        color: white;
    }
</style>


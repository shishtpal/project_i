<div class="form-horizontal" id="signup_form"> <h2 class="text-center" style="">Signup System</h2><hr> <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="First Name"> <label for="First Name" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">First Name</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="text" class="form-control " name="First_Name_name" id="First_Name_id" style="" placeholder="First Name - Demo "> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>  <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Last Name"> <label for="Last Name" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Last Name</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="text" class="form-control " name="Last_Name_name" id="Last_Name_id" style="" placeholder="Last Name - World"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Email"> <label for="Email" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Email</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="text" class="form-control " name="Email_name" id="Email_id" style="" placeholder="Email - someone@somewhere.com "> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>  <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Phone."> <label for="Phone." class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Phone.</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="text" class="form-control " name="Phone._name" id="Phone_no_id" style="" placeholder="Mobile No. - 09999999999"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>  <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Password"> <label for="Password" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Password</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="password" class="form-control " name="Password_name" id="Password_s_id" style="" placeholder="Password - 1234"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Password*"> <label for="Password*" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Password*</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="password" class="form-control " name="Password*_name" id="Password_re_id" style="" placeholder="Repeat Password - 1234"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div> <hr> <button type="button" class="btn btn-success btn-block" id="signupBtn" style="max-width:200px;margin:0px auto;">Signup</button> </div> 

<script>
	$("#signupBtn").click(function(ev){
		var s_firstname = $("#First_Name_id").val();
		var s_lastname = $("#Last_Name_id").val();
		var s_email = $("#Email_id").val();
		var s_phone = $("#Phone_no_id").val();
		var s_pass = CryptoJS.MD5($("#Password_s_id").val()).toString();
		var s_re_pass = CryptoJS.MD5($("#Password_re_id").val()).toString();
		if (s_pass != s_re_pass) {
			alert("password does not match");
			/*  TODO  */
		} else if (s_email == "" || s_email == null || s_pass == "" || s_pass == null || s_firstname == "" || s_firstname == null || s_lastname == "" || s_lastname == null) {
			alert("Please, fill all required fields.");
			/*  TODO  */
		} else {
			$.post(
					"/login",
					"signup=clicked&fname=" + s_firstname + "&lname=" + s_lastname + "&email=" + s_email + "&phone=" + s_phone + "&password=" + s_pass,
					function(data){
						if(data == 'true') {
							alert("User Record Successfully registered.");
							/*  TODO  */
						} else if (data == 'duplicate') {
							alert("Email Address Exists in our database.");
							/*  TODO  */
						}
						console.log(data);
					},
					"text"
				);
		}
	});
</script>
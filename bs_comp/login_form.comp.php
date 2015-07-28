<div class="form-horizontal" id="login_system"> <h2 class="text-center" style="">Login System</h2><hr> <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Username"> <label for="Username" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Username</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="text" class="form-control " name="Username_name" id="Username_id" style="" placeholder="Username - someone@somwhere.com"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div> <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Password"> <label for="Password" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Password</label> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <input type="password" class="form-control " name="Password_name" id="Password_id" style="" placeholder="Password - 1234"> </div> </div> <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div><hr> <button type="submit" class="btn btn-default btn-block" id="loginBtn" style="max-width:200px;margin:0px auto;">Login</button></div> 

<script>
	$("#loginBtn").click(function(ev){
		var l_email = $("#Username_id").val();
		var l_pass = CryptoJS.MD5($("#Password_id").val()).toString();
		if (l_email != "" && l_email != null && l_pass != "" && l_pass != null) {
			$.post(
					"/login",
					"login=clicked&email=" + l_email + "&password=" + l_pass,
					function(data){
						console.log(data);
						if (data == 'true'){
							window.location.reload();
						} else {
							alert("Invalid email or password");
						}
					},
					"text"
				);
		} else {
			alert("Please, fill required fields.");
		}

	});
</script>
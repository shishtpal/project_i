<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "Advanced Notes Management System"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>

	<div class="container-fluid">
		<div class="container header">
			<h1>Advanced Notes Management System</h1>
			<hr>
			<!-- TODO -->
		</div>
	</div>

	<div class="container-fluid">
		<div class="container main_site">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="box-shadow: -10px -5px 10px 0px beige;">
					<!-- Login Form -->
					<?php include '/bs_comp/login_form.comp.php'; ?>
				</div>
				<div class="clearfix visible-sm-block visible-xs-block"></div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="box-shadow: 10px -5px 10px 0px beige;">
					<!-- Sign Up -->
					<?php include '/bs_comp/signup_form.comp.php'; ?>
				</div>
				<div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
			</div>
		</div>
	</div>



</body>
<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "Advanced Notes Management System"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>

	<div class="container-fluid" style="background:rgba(33, 251, 106, 1);">
		<div class="container">
			<h3>Website Header</h3>
		</div>
	</div>

	<div class="container-fluid" style="background:green;">
		<div class="container">
			<div class="row" style="margin-top:40px; margin-bottom:40px;">
				<h1 class="text-center">Search System</h1>
			</div>

			<div class="row" style="margin:40px 0px;">
				<div class="form-group">
					<input type="text" class="form-control input-lg" name="searchTitle" id="searchTitle_id" placeholder="Hello World!" style="margin:0px auto; max-width:600px;">
					<br>
					<div class="btn btn-default btn-block btn-lg" id="submitQuery" style="margin:0px auto;max-width:100px;">Search</div>
				</div>
			</div>
		</div>
	</div>



</body>
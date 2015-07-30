<!-- 

This is just a Quick Demo of /images API
Which returns Real Path to Image Stored on the Server.

Well You do have two options, 
	+ Load all images at a time.
	+ Load Image only when user mouse enter the image scope.

-->


<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "List of all Notes"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>


	<div class="container-fluid">
		<div class="container">
			<div class="row" style="border:2px solid red;">
				<div class="img-responsive">
					<img data-src="/images?fields&imageid=1" alt="Hello World!" class="img-thumbnail" style="height:300px;width:200;">
				</div>
			</div>
			<div class="row" style="border:2px solid red;">
				<div class="img-responsive">
					<img data-src="/images?fields&imageid=2" alt="Hello World!" class="img-thumbnail" style="height:300px;width:200;">
				</div>
			</div>
			<div class="row" style="border:2px solid red;">
				<div class="img-responsive">
					<img data-src="/images?fields&imageid=3" alt="Hello World!" class="img-thumbnail" style="height:300px;width:200;">
				</div>
			</div>
		</div>
	</div>

<script>
	/* Load images Only When User Hover on it. */
	$("img[data-src]").mouseenter(function(ev){
		var __t = $(ev.currentTarget);
		if (__t.attr("src") == "" || __t.attr("src") == null || __t.attr("src") == undefined) {
			var __get = __t.attr("data-src");
			$.get(__get, function(data){
				__t.attr("src", "/" + data);
			});
		}
	});

	/*  Load all images when DOM fully loaded */
	// $("document").ready(function(){
		// $("img[data-src]").each(function(i, j){
			/*  i -> 0 , 1, ...  */
			/*  j -> injected element from list */
			// $.get($(j).attr("data-src"), function(data){
				// $(j).attr("src", "/" + data);
				// console.log(data);
			// });
		// });
	// });
</script>

</body>
</html>
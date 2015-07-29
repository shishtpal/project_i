<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "List of all Notes"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

	<script src="/bower_components/tinymce_v4/tinymce.min.js"></script>


<script type="text/javascript" >
tinyMCE.init({
        mode : "textareas",
        theme : "modern"   //(n.b. no trailing comma, this will be critical as you experiment later)
});
</script >

</head>
<body>
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<h1 class="text-center">Hello World!</h1>
				<hr>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="mainEditor" id="ceEditor">
					<!-- Embedding HTML Editor -->

<form action="/" method="post">  
    <textarea name="content" cols="50" rows="15" > 
    This is some content that will be editable with TinyMCE.
    </textarea>
</form>


				</div>
			</div>
		</div>
	</div>



</body>
</html>
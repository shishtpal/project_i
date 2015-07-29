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

<script type="text/template" id="img_upload_comp_template">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<!-- for image file -->
<div class="thumbnail">
<img data-src="holder.js/300x300" alt="Upload Image File" src="<%=  image_data_url %>" style="height:300px;width:auto;">
<div class="caption">
<input type="text" class="form-control uploadedImageUrl" style="" placeholder="Image URL at Server">
<p>
<div class="btn btn-primary copyPathThis" role="button">Copy</div> 
<div class="btn btn-default deleteThis" role="button">Delete</div>
</p>
</div>
</div>
</div>
</script>
			<div class="row">
				<h1 class="text-center">Upload Image File</h1>
				<hr>
<form class="form-horizontal well" id="img_upload_form" style="box-shadow:0px 3px 15px 3px yellowgreen;" enctype="multipart/form-data" method="post" action="/upload">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Image">
<label for="Image" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Image</label>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
<input type="file" class="form-control " name="Image_name" id="Image_id" style="" multiple>
</div>
</div>
<div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
</form>

<script>

function readImage(input) {
	var formData = new FormData(), img_file;
    if ( input.files && input.files[0] ) {
    	for (var __i = 0; __i < input.files.length; __i++) {
	        var FR= new FileReader();
	        /*    console.log(input.files[__i]);    */
	        var file_type = input.files[__i].type.split("/")[0];
	        img_file = input.files[__i];
	        formData.append("files[]", img_file);
	        /* Let's Upload the file to server */
	        FR.onload = function(e) {
	        	if (file_type == "image") {
		        	 var _templ = _.template($("#img_upload_comp_template").html());
		        	 $("#loadSelectedImages").prepend(_templ({ image_data_url: e.target.result}));
		        	 refresh();
	        	};
	        }; 
	        FR.readAsDataURL( input.files[__i] );
    	};

$.ajax({
	url: "/uploads",
	type: "POST",
	data: formData,
	dataType : 'json',
	processData: false,
	contentType: false,
	success: function(data) {
		$('#ajax-loader').hide();
		console.log(data);
		//appends the currently uploaded images in  a div
		}
});

    }
}

function refresh() {
    $(".deleteThis").unbind();
    $(".copyPathThis").unbind();
	$(".deleteThis").click(function(ev){
    	$(ev.currentTarget).parent().parent().parent().remove();
    });
    $(".copyPathThis").click(function(ev) {
    	var a = $(ev.currentTarget).parent().parent().children()[0];
    	console.log(a);
    });
}

$("#Image_id").change(function(){
    readImage( this );
});

</script>

			</div>
			<div class="row" id="loadSelectedImages">
				<!-- list of selected images -->
			</div>
		</div>
	</div>

</body>
</html>
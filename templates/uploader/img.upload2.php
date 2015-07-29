<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "Upload file to Server"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>

	<div class="container-fluid">
		<div class="container">
			
<form id="upload-form" method="post" enctype="multipart/form-data"   action="/uploads">
    <input type="file" id="upload" multiple>  
</form> 

<script>
function updateProgress(evt) {
    console.log('updateProgress');
    if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            console.log(percentComplete);
    } else {
            // Unable to compute progress information since the total size is unknown
            console.log('unable to complete');
    }
}


$('#upload').change(function(e){

var formdata = new FormData(),file;
$('#ajax-loader').show();   //simple gif loader
    for(var i=0;i<this.files.length;i++){
        file = this.files[i];
        var ftype = file.type;
        formdata.append("files[]", file);           

    }
    if (formdata) { 
            $.ajax({
                url: "/uploads",
                type: "POST",
                data: formdata,
                dataType : 'json',
                processData: false,
                contentType: false,
				//@custome xhr
                xhr: function() {  // custom xhr
                   myXhr = $.ajaxSettings.xhr();
                   if(myXhr.upload){ // check if upload property exists
                       myXhr.upload.addEventListener('progress',updateProgress,  false); // for handling the progress of the upload
                   }
                   return myXhr;
                },
                success: function(data) {
                    	 $('#ajax-loader').hide();
                    	//appends the currently uploaded images in  a div
                     }
                });
 }
});


</script>
		</div>
	</div>

</body>
</html>	
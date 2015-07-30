<!-- 
Component Parameters: 
if You want to use This as standalone Component 
You can wrap this into, .container-fluid > .container 
-->

<script type="text/template" id="img_upload_comp_template">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<!-- for image file -->
<div class="thumbnail">
<img data-src="holder.js/300x300" alt="Upload Image File" src="<%=  image_data_url %>" style="height:300px;width:auto;">
<div class="caption">
<input type="text" class="form-control uploadedImageUrl" style="" placeholder="Image URL at Server" value="<%= server_path %>">
<p>
<div class="btn btn-primary copyPathThis" role="button">Copy</div> 
<div class="btn btn-default deleteThis" role="button">Delete</div>
</p>
</div>
</div>
</div>
</script>

<!-- Component starts from Here.. -->
<div class="row">
    <form class="form-horizontal well" id="img_upload_form" style="box-shadow:0px 3px 15px 3px yellowgreen;" enctype="multipart/form-data" method="post" action="/upload">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" data-toggle="tooltip" title="Image">
            <label for="Image" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Image</label>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <input type="file" class="form-control " name="Image_name" id="Image_id" style="" multiple>
            </div>
            <p class="small text-center">Maximum 20 simultaneous uploads</p>
        </div>
        <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
        <div class="progress hidden" id="progressBarCon">
          <div class="progress-bar progress-bar-striped active" id ="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width: 45%">
            <span class="sr-only">45% Complete</span>
          </div>
        </div>
    </form>

<script>
    function refresh() {
        $(".deleteThis").unbind();
        $(".copyPathThis").unbind();
        $(".deleteThis").click(function(ev){
            $(ev.currentTarget).parent().parent().parent().remove();
        });
        $(".copyPathThis").click(function(ev) {
            var a = $(ev.currentTarget).parent().parent().children()[1];
            console.log($($(a).children()[0]).val());
        });
    }

    function updateProgress(evt) {
        // console.log('updateProgress');
        if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                $('#progressBar').attr("style", "width:" + percentComplete*100 + "%")
                // console.log(percentComplete);
        } else {
                // Unable to compute progress information since the total size is unknown
                console.log('unable to complete');
        }
    }


    $('#Image_id').change(function(e) {
        /* What should Happen When User have not Select any File or selects more than 20 files */
        if (this.files.length == 0 || this.files.length > 20){
            alert("Maximum 20 simultaneous Uploads.");
            return false;
        }
        var formdata = new FormData(),file;
        window.img_data = [];
        $("#progressBarCon").removeClass("hidden");   //simple gif loader
        $('#progressBar').attr("style", "width:0%")
        for(var i=0;i<this.files.length;i++){
            file = this.files[i];
            var ftype = file.type.split("/")[0];
            /*  Validate Size of Image file - Client Side  :TODO */
            if (ftype == "image") {
                var FR= new FileReader();
                formdata.append("files[]", file);
                FR.onload = function(ev) {
                    img_data.push(ev.target.result);
                    // console.log(img_data);
                };
                FR.readAsDataURL( file );
            }
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
                	 $('#progressBarCon').addClass("hidden");
                    if (data == false){
                        alert("Session has been expired!");
                        return false;
                    }
                     var __temp = _.template($("#img_upload_comp_template").html());
                     $.each(data, function(__i, __j){
                         $("#loadSelectedImages").prepend(__temp({
                            image_data_url: img_data[__i],
                            server_path: __j
                         }));
                     });
                     refresh();
                	//appends the currently uploaded images in  a div
                 }
            });
         }
    });


</script>
</div>
<div class="row" id="loadSelectedImages">
    <!-- list of selected images -->
</div>
<!-- Component Ends Here.. -->

<!DOCTYPE html>
<html>
<head>
    
    <?php $title = "Upload file to Server"; ?>
    <?php include "/bs_comp/bs_assets.comp.php"; ?>
    <?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Image File To Server</h4>
                </div>
                <div class="modal-body">
                    <?php require '/bs_comp/upload_img.comp.php'; ?>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Upload Image</div>
                </div>
            </div>
            <!-- END:ROW -->
        </div>
        <!-- END:CONTAINER -->
    </div>

</body>
</html> 
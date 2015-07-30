<!-- 
This Code Snippet is used to create a list of all Images belongs to a single user.
and Images will load only When user mouseenter any one of their field or scope.


 -->

<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "List of all Notes"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>
	<?php require '/templates/db/db.conf.php'; ?>

</head>
<body>

	<div class="container-fluid">
		<div class="container">
		<?php if(isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['group']) && $_SESSION['email'] != "" ) { ?>
		<?php $res = $db->query("SELECT * FROM `upImage` WHERE userid='" . $_SESSION['userid'] . "'"); ?>
		<?php if ($res->num_rows) { ?>
<?php 

while ($row = $res->fetch_assoc()) {
	echo '<div class="row" style="border:2px solid red;">';
	echo '<div class="img-responsive">';
	echo '<img data-src="/images?fields&imageid=' . $row['imageid'] . '" alt="Hello World!" class="img-thumbnail" style="height:300px;width:200;">';
	echo '</div>';
	echo '</div>';
}

?>
		<?php } ?>
		<?php } ?>
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
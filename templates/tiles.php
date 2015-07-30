<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "Content Tiles Using jQuery"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>

</head>
<body>

<div class="container-fluid">
	<div class="row" style="z-index:100;">
		<div class="btn_container btn btn-block" style="margin:0px auto;border:2px solid red;" id="mainBtnBlock">
			<div class="btn-group hidden" id="mainBtnGroup">
				<!-- a.btn.btn-default.titleToggles[href="#$s"]{$} -->
				<a href="#1s" class="btn btn-default titleToggles">1</a>
				<a href="#2s" class="btn btn-default titleToggles">2</a>
				<a href="#3s" class="btn btn-default titleToggles">3</a>
				<a href="#4s" class="btn btn-default titleToggles">4</a>
				<a href="#5s" class="btn btn-default titleToggles">5</a>
				<a href="#6s" class="btn btn-default titleToggles">6</a>
				<a href="#7s" class="btn btn-default titleToggles">7</a>
				<a href="#8s" class="btn btn-default titleToggles">8</a>
				<a href="#9s" class="btn btn-default titleToggles">9</a>
				<a href="#10s" class="btn btn-default titleToggles">10</a>
			</div>
		</div>	
	</div>

	<!-- Lets add main Site Content to Page -->
	<div class="row">
		<!-- .tiles#$s[style="background:green;position:fixed;top:50px;left:0px;z-index:-$;"]*10>h3{Hello jQuery Content Tiles - $$s} -->
		<div class="tiles" id="1s" style="background:red;position:fixed;top:50px;left:0px;z-index:-1;">
			<h3>Hello jQuery Content Tiles - 01s</h3>
		</div>
		<div class="tiles" id="2s" style="background:red;position:fixed;top:50px;left:0px;z-index:-2;">
			<h3>Hello jQuery Content Tiles - 02s</h3>
		</div>
		<div class="tiles" id="3s" style="background:red;position:fixed;top:50px;left:0px;z-index:-3;">
			<h3>Hello jQuery Content Tiles - 03s</h3>
		</div>
		<div class="tiles" id="4s" style="background:red;position:fixed;top:50px;left:0px;z-index:-4;">
			<h3>Hello jQuery Content Tiles - 04s</h3>
		</div>
		<div class="tiles" id="5s" style="background:red;position:fixed;top:50px;left:0px;z-index:-5;">
			<h3>Hello jQuery Content Tiles - 05s</h3>
		</div>
		<div class="tiles" id="6s" style="background:red;position:fixed;top:50px;left:0px;z-index:-6;">
			<h3>Hello jQuery Content Tiles - 06s</h3>
		</div>
		<div class="tiles" id="7s" style="background:red;position:fixed;top:50px;left:0px;z-index:-7;">
			<h3>Hello jQuery Content Tiles - 07s</h3>
		</div>
		<div class="tiles" id="8s" style="background:red;position:fixed;top:50px;left:0px;z-index:-8;">
			<h3>Hello jQuery Content Tiles - 08s</h3>
		</div>
		<div class="tiles" id="9s" style="background:red;position:fixed;top:50px;left:0px;z-index:-9;">
			<h3>Hello jQuery Content Tiles - 09s</h3>
		</div>
		<div class="tiles" id="10s" style="background:red;position:fixed;top:50px;left:0px;z-index:-10;">
			<h3>Hello jQuery Content Tiles - 10s</h3>
		</div>


	</div>

<script>
	$("document").ready(function(){
		var a = $("#mainBtnBlock");
		a.mouseenter(function(ev){
			$("#mainBtnGroup").removeClass("hidden");
			// console.log(ev);
		});
		a.mouseleave(function(ev){
			$("#mainBtnGroup").addClass("hidden");
			// console.log(ev);
		});
	});
	$(".titleToggles").click(function(ev){
		var b = ev.currentTarget;
		var c = $("#" + b.text + "s");
		$(".tiles").addClass("hidden");
		c.removeClass("hidden");
		// console.log(c);
	});

</script>

</div>










</body>
</html>
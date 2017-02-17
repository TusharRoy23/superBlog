<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap-theme.css">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.8.0.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
	</head>
	<body>
		<div class="col-lg-12 col-md-12 leftRightPaddingSetZero navbar navbar-default hidden-xs hidden-sm" style="position: fixed; z-index: 200; top: 0;">
			<div class="col-lg-6 col-md-6">
				<h3 style="padding-left: 2%;">LOGO</h3>
			</div>
			<div class="col-lg-6 col-md-6"  style="padding-top:1%; padding-left: 2%;">
				<div class="col-md-6 col-lg-6">
					<input type="text" name="globalSearch" class="form-control">
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="col-md-6 col-lg-6">
						<a href="#">Sign Up</a>
					</div>
					<div class="col-lg-6 col-md-6">
						<a href="#">Sign In</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="col-sm-12 col-xs-12 hidden-lg hidden-md navbar navbar-default" style="position: fixed; z-index: 100; top: 0;">
			<div class="col-sm-6 col-xs-6 hidden-lg hidden-md" style="">
				<h4>LOGO</h4>
			</div>
			<div class="col-sm-6 col-xs-6 hidden-lg hidden-md" style="text-align: right;">
				<span style="font-size:185%;cursor:pointer" onclick="onOpen()">&#9776;</span>
			</div>
		</nav>
		<div class="col-sm-12 col-xs-12 sideBar hidden-lg hidden-md" id="sideBar">
			<a href="javascript:void(0)" class="closebtn" onclick="onClose()" style="text-align: right; font-size: 250%;">&times;</a><br />
  			<a href="#" style="text-align: center;">About</a><br />
  			<a href="#" style="text-align: center;">Services</a><br />
 			<a href="#" style="text-align: center;">Clients</a><br />
  			<a href="#" style="text-align: center;">Contact</a>
		</div>
		<script type="text/javascript" src="/superBlog/assets/customJs/sideBar.js"></script>
	</body>
</html>
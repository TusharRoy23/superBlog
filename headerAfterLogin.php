<!DOCTYPE html>
<?php
	//session_start();
	include_once("DBconfig.php");
?>
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
	<body class="textDecration">
		<div class="col-lg-12 col-md-12 leftRightPaddingSetZero navbar navbar-default hidden-xs hidden-sm" style="position: fixed; z-index: 200; top: 0;">
			<div class="col-lg-6 col-md-6 menuOfLeft">
				<div class="col-lg-3 col-md-3 col-sm-3" style="padding-left: 2%;padding-top: 1%;">
					<a href="dashboard.php">
						<img src="images/logo.png" style="height: 30%; width: 30%;">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3" style="padding-top:2%; padding-left: 0;">
					<a href="dashboard.php">Home</a>	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%;">
					<a href="myBlog.php">My Blog</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%;">
					<a href="#">My Profile</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6"  style="padding-top:1%; padding-left: 2%;">
				<div class="col-md-6 col-lg-6">
					<input type="text" name="globalSearch" class="form-control">
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="col-md-6 col-lg-6" style="text-align: center;">
						<h4>Hi <?php echo $_SESSION['username'];?>!</h4>
					</div>
					<div class="col-md-6 col-lg-6">
						<a href = "logout.php" class="btn btn-primary logout" role = "button">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="col-sm-12 col-xs-12 hidden-lg hidden-md navbar navbar-default" style="position: fixed; z-index: 100; top: 0;">
			<div class="col-sm-4 col-xs-4 hidden-lg hidden-md" style="">
				<a href="dashboard.php" style="padding-left: 2%;">
					<img src="images/logo.png" style="height: 25%; width: 25%;">
				</a>
			</div>
			<div class="col-sm-4 col-xs-4 hidden-lg hidden-md" style="text-align: center; padding-top: 1%;">
				<input type="text" name="globalSearch" class="form-control">
			</div>
			<div class="col-sm-4 col-xs-4 hidden-lg hidden-md" style="text-align: right;">
				<span style="font-size:185%;cursor:pointer" onclick="onOpen()">&#9776;</span>
			</div>
		</nav>
		<div class="col-sm-12 col-xs-12 sideBar hidden-lg hidden-md" id="sideBar">
			<a href="javascript:void(0)" class="closebtn" onclick="onClose()" style="text-align: right; font-size: 250%;">&times;</a><br />
			<h4 style="text-align: center;">Hi <?php echo $_SESSION['username'];?>!</h4>
  			<a href="dashboard.php" style="text-align: center;">Home</a><br />
  			<a href="myBlog.php" style="text-align: center;">My Blog</a><br />
 			<a href="#" style="text-align: center;">My Profile</a><br />
  			<a href="logout.php" style="text-align: center;">Logout</a>
		</div>
		<script type="text/javascript" src="/superBlog/assets/customJs/sideBar.js"></script>
	</body>
</html>
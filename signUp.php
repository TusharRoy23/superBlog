<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
	</head>
	<body>
		<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero" id="dashboard">
			<?php 
				include_once('header.php');
			?>
			<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 8%;">
				<div class="col-lg-6 col-md-6 col-sm-6" style=" padding-left: 18%; padding-top: 5%;">
					<img src="images/register_now.png" alt="Avatar" class="" style="width: 60%;">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6" style="">
					
						<?php
							session_start();
							include_once('register.php');
						?>
					
				</div>
			</div>
		</div>
	</body>
</html>
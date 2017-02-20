<!DOCTYPE html>
<?php
	session_start();
	include_once("DBconfig.php");
	if(empty($_SESSION)){
		$_SESSION['errMsg'] = "<font color ='red'><b>You have to Login First</b>";
		header('Location: dashboard.php');
	}
?>
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap-theme.css">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
	</head>
	<body>
		<div class="col-lg-12 col-sm-12 col-md-12 leftRightPaddingSetZero" id="dashboard">
			<?php 
			//echo $_SESSION['userID'];
			if($_SESSION['userID'] != null){

				include_once('headerAfterLogin.php');
			}
			else{
				include_once('header.php');
				$_SESSION['userID'] = null;
			}
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero" style="margin-top: 8%;">
				<?php
					include_once('allThreads.php');
				?>
			</div>	
		</div>
		<script type="text/javascript" src="/superBlog/assets/customJs/sideBar.js"></script>
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>
	</body>
</html>
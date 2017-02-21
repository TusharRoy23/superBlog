<!DOCTYPE html>
<?php
	//session_start();
	include_once('DBconfig.php');
	$commentErr = "";
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
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">	
	</head>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<textarea class="form-control" rows="4" name="comment"></textarea>
			<br>
			<span class="error"><?php echo $commentErr;?></span>
			<div class="col-lg-10 col-md-10 col-sm-10"></div>
			<div class="col-lg-2 col-md-2 col-sm-2">
				<input type="submit" name="comment" value="comment" class="form-control btn btn-xs btn-primary col-lg-6 col-md-6 col-sm-6">
				<input type="submit" name="comment" value="reply" class="form-control col-lg-6 col-md-6 col-sm-6 btn btn-xs btn-success">
			</div>
		</form>
	</body>
</html>
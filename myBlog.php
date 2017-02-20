<!DOCTYPE html>
<?php
	session_start();
	include_once("DBconfig.php");

	if(empty($_SESSION)){ //stop going back after successfully logged out
		$_SESSION['errMsg'] = "<font color ='red'><b>You have to Login First</b>";
		header('Location: login.php');
	}

	$title = $description = "";
	$titleErr = $descriptionErr = "";
	$valid = true;
	//$submitBtnClick = $_POST["upload"];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$valid = true;
		if(empty($_POST["title"]))
		{
			$valid = false;
			$titleErr = "title required";
		}
		else{
			$title = check_input($_POST["title"]);
		}
		if(empty($_POST["description"])){
			$valid = false;
			$descriptionErr = "description required";
		}
		else{
			$description = check_input($_POST["description"]);
		}
		if($valid == true){
			$userID = $_SESSION['userID'];
			$date = date("Y/m/d");
			date_default_timezone_set("Asia/Dhaka");
			$time = date("h:i a");

			$sql = "INSERT INTO threads (userID, uploadDate, uploadTime, threadTitle, threadContent, updateDate, updateTime) values (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("issssss", $userID, $date, $time, $title, $description, $date, $time);
			if($stmt->execute()){
				$_SESSION['uploadSuccessful'] = "<font color='green'><b>Successfully Uploaded !!</b>";
				$stmt->close();
			}
		}
	}
	function check_input($data){
		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>
<html>
	<head>
		<title>My Blog</title>
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
		<div class="col-lg-12 col-sm-12 col-md-12 leftRightPaddingSetZero" id="dashboard">
			<?php 
				include_once('headerAfterLogin.php');
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero" style="margin-top: 8%;">
				<div class="container" style="">
					<span>
            			<?php if(!empty($_SESSION['uploadSuccessful'])) { echo $_SESSION['uploadSuccessful']; } ?>		
       					<?php //unset($_SESSION['uploadSuccessful']); ?>
					</span>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<h4>Title</h4>
						<input type="text" name="title" class="form-control">
						<span class="error"><?php echo $titleErr;?></span><br />
						<h4>Description</h4>
						<textarea class="form-control" rows="7" name="description"></textarea>
						<span class="error"><?php echo $descriptionErr;?></span><br /><br />
						<input type="submit" name="upload" value="upload" class="btn btn-success btn-block">
					</form>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero" style="margin-top: 5%; ">
				<div class="container leftRightPaddingSetZero" style="">
					<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero">
						<?php
							include_once("threads.php");
							//$_SESSION['userID'] = $_SESSION['userID'];
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
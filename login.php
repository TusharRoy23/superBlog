<!DOCTYPE html>
<?php 
	session_start();
	include_once('DBconfig.php');
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$_SESSION['userID'] = "";
	$valid = true;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$valid = true;
		if(empty($_POST["username"]))
		{
			$valid = false;
			$usernameErr = "username required";
		}
		else{
			$username = check_input($_POST["username"]);
		}
		if(empty($_POST["password"]))
		{
			$valid = false;
			$passwordErr = "Password required";
		}
		else{
			$password = check_input($_POST["password"]);
		}
		if(!empty($username) && !empty($password)){
			if($valid == true)
			{
				$pass = md5($password);
				$sql = "SELECT * from users where username = ? AND password = ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss", $username, $pass);
				$stmt->execute();
				$result = $stmt->get_result();
				$checkUser = $result->num_rows;
				if($checkUser > 0){
					while($row = $result->fetch_assoc()){
						$_SESSION['userID'] = $row['userID'];
						$_SESSION['username'] = $row['username'];
					}
					$stmt->free_result();
					$stmt->close();
					$conn->close();
					header('Location: dashboard.php');
				}
				else{
					$_SESSION['errMsg'] = "<font color ='red'><b>Invalid Username or Password</b>";
				}
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
		<title>Login</title>
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
		<div class="col-lg-12 col-sm-12 col-md-12 leftRightPaddingSetZero" id="dashboard" >
			<?php 
				include_once('header.php');
			?>
			<div class="" style="margin-top: 8%;">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="col-lg-12 col-md-12 col-sm-12 imgcontainer">
						 <img src="images/avatar.png" alt="Avatar" class="avatar">
						 <div class="loginContainer" style="">
						 	<h4>Username</h4>
							<input type="text" name="username" class="form-control">
							<span class="error"><?php echo $usernameErr;?></span>
							<h4>Password</h4>
							<input type="Password" name="password" class="form-control"><br />
							<span class="error"><?php echo $passwordErr;?></span>
							<input type="submit" name="submit" class="btn btn-success btn-block" value="Login"><br />
							<a href="signUp.php"><b><u>Not register yet? Register Here..</u></b></a><br />
							<p>
								<div id="errMsg">
            						<?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
        						</div>
       							<?php unset($_SESSION['errMsg']); ?>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
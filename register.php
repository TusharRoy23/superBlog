<!DOCTYPE html>
<?php
	//session_start();
	include_once('DBconfig.php');
	$usernameErr = $passwordErr = $fullnameErr = $emailErr = "";
	$username = $password = $fullname = $email = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
			$valid = true;
			if (empty($_POST["username"])) {
				$valid = false;
				$usernameErr = "username is required";
			}
			else{
				$username = check_inputs($_POST["username"]);
				
				//preg_match("/^[a-zA-Z ]*$/",$username)
					//
	    		if( !preg_match('/^[a-zA-Z]{4,}+$/', $username)){
	    			$valid = false;
	    			$usernameErr = "Only letters, no space allowed and letters length must be 4 or more than that";
	    		}
	    		else{
	    			$valid = false;
	    			$sql = "SELECT * from users where username = ?";
	    			$stmt = $conn->prepare($sql);
	    			$stmt->bind_param("s", $username);
	    			$stmt->execute();
	    			$stmt->store_result(); //store the result first
	    			$check_username = $stmt->num_rows; //count the rows
	    			if($check_username > 0){
	    				$usernameErr = "This Username is already taken";
	    				$_SESSION['errMsg'] = "This Username is already taken";
	    			}
	    			else{
	    				$valid = true;
	    			}
	    			$stmt->close();
	    		}
			}
			if (empty($_POST["password"])) {
				$passwordErr = "password is required";
				$valid = false;
			}
			else{
				$password = check_inputs($_POST["password"]);
				if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password) === 0){
					$passwordErr = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
					$valid = false;
				}
	    		else{
	    			$valid = true;
	    		}
			}
			if (empty($_POST["fullname"])) {
				$fullnameErr = "fullname is required";
				$valid = false;
			}
			else{
				$fullname = check_inputs($_POST["fullname"]);
				if( !preg_match('/^[a-zA-Z ]{4,}+$/', $fullname)){
	    			$valid = false;
	    			$fullnameErr = "Only letters, white space allowed and letters length must be 4 or more than that";
	    		}
			}
			if (empty($_POST["email"])) {
				$emailErr = "email is required";
				$valid = false;
			}
			else{
				$email = check_inputs($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      			$emailErr = "Invalid email format";
	      			$valid = false;
	   			}
			}
			if($valid == true){
				$pwd = md5($password);
				$sql = "INSERT INTO users (username, password, fullname, email) values (?, ?, ?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssss", $username, $pwd, $fullname, $email);
				$stmt->execute();
				
				$_SESSION['errMsg'] = "<font color='green'><b>Now, You can login</b>";
				$stmt->close();
				//header('Location: login.php');
			}
	}
	function check_inputs($data){
		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
		<link rel="stylesheet" type="text/css" href="/superBlog/assets/css/bootstrap.css">
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>
	</head>
	<body>
		<div class="col-lg-12 col-md-12">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h4>Username</h4>
				<input type="text" name="username" class="form-control" placeholder="Enter username">
				<span class="error"><?php echo $usernameErr;?></span>
				<h4>Password</h4>
				<input type="password" name="password" class="form-control" placeholder="Enter password">
				<span class="error"><?php echo $passwordErr?></span>
				<h4>Full Name</h4>
				<input type="text" name="fullname" class="form-control" placeholder="Enter full name">
				<span class="error"><?php echo $fullnameErr?></span>
				<h4>E-mail</h4>
				<input type="text" name="email" class="form-control" placeholder="Enter e-mail"><br />
				<span class="error"><?php echo $emailErr?></span>
				<input type="submit" name="register" value="Sign Up" class="btn btn-success btn-block">
			</form>
		</div>
	</body>
</html>
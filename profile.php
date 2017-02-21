<!DOCTYPE html>
<?php 
	include_once("DBconfig.php");
	$userID = $_SESSION['userID'];
	$username = $fullname = $email = "";
	
	$sql = "SELECT * FROM users where userID = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $userID);
	$stmt->execute();
	$result = $stmt->get_result();
	$checkUser = $result->num_rows;
	if($checkUser > 0){
		while($row = $result->fetch_assoc()){
			$username = $row['username'];
			$fullname = $row['fullname'];
			$email = $row['email'];
		}
		//$stmt->close();
	}

	$fullnameErr = $emailErr = "";
	$editFullname = $editEmail = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['editPro'])){
			$valid = true;
			if (empty($_POST["editFullname"])) {
				$fullnameErr = "fullname is required";
				$valid = false;
			}
			else{
				$editFullname = checks($_POST["editFullname"]);
				if( !preg_match('/^[a-zA-Z ]{4,}+$/', $editFullname)){
	    			$valid = false;
	    			$fullnameErr = "Only letters, white space allowed and letters length must be 4 or more than that";
	    		}
			}
			if (empty($_POST["editEmail"])) {
				$emailErr = "email is required";
				$valid = false;
			}
			else{
				$editEmail = checks($_POST["editEmail"]);
				if (!filter_var($editEmail, FILTER_VALIDATE_EMAIL)) {
	      			$emailErr = "Invalid email format";
	      			$valid = false;
	   			}
			}
			if($valid == true){
				$name = $_POST['editFullname'];
				$mail = $_POST['editEmail'];
				$updateSql = "UPDATE users SET fullname = ? , email = ? WHERE userID = ?";
				$updateStmt = $conn->prepare($updateSql);
				$updateStmt->bind_param("ssi" , $name, $mail, $userID);
				$updateStmt->execute();
				$updateStmt->close();

				$Selectsql = "SELECT * FROM users where userID = ?";
				$Selectstmt = $conn->prepare($Selectsql);
				$Selectstmt->bind_param('i', $userID);
				$Selectstmt->execute();
				$results = $Selectstmt->get_result();
				$checkaUser = $results->num_rows;
				if($checkaUser > 0){
					while($rows = $results->fetch_assoc()){
						$username = $rows['username'];
						$fullname = $rows['fullname'];
						$email = $rows['email'];
					}
				}
			}
		}
	}
	function checks($data){
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
		<script type="text/javascript" src="/superBlog/assets/customJs/sideBar.js"></script>
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>
		<script type="text/javascript" src="/superBlog/assets/customJs/showOrHide.js"></script>
	</head>
	<body>
		<p style="text-align: center; font-size: 150%;">Username: <b><?php echo $username ?></b></p>
		<p style="text-align: center; font-size: 150%;">Fullname: <b><?php echo $fullname ?></b></p>
		<p style="text-align: center; font-size: 150%;">Email: <b><?php echo $email ?></b></p>
		<?php
			$u = "h";
			if($u == "h"){?>
				<p style="text-align: center; font-size: 150%;">Password: <b>************</b></p>
				<div class="col-lg-12 col-sm-12 col-md-12" id="editProfile" style="display: none; padding-top: 2%; padding-bottom: 2%;">
			        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<h4>Full Name</h4>
						<input type="text" name="editFullname" class="form-control" placeholder="Enter full name">
						<span class="error"><?php echo $fullnameErr;?></span>
						<h4>E-mail</h4>
						<input type="text" name="editEmail" class="form-control" placeholder="Enter e-mail"><br />
						<span class="error"><?php echo $emailErr?></span>
						<input type="submit" name="editPro" value="Confirm" class="btn btn-success btn-block">
			        </form>
		        </div>
		        <div class="col-lg-12 col-sm-12 col-md-12" style="text-align: center;">
		        	<input class="btn btn-success" type="button" name="" value="Edit Profile" id="hideShow">
		        </div>
				
		<?php }
		?>
		
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>	
	</head>
	<body class="textDecration">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero" style="">
				<?php
					include_once("DBconfig.php");

					if(empty($_SESSION)){ //stop going back after successfully logged out
						$_SESSION['errMsg'] = "<font color ='red'><b>You have to Login First</b>";
						header('Location: dashboard.php');
					}
					$userID = "none";
					
					if($_SESSION['userID'] != null){
						$userID = $_SESSION['userID'];
					}
					else{
						$userID = $_SESSION['userID'];
					}
					$sql = "SELECT * FROM threads JOIN users ON threads.userID = users.userID ORDER BY threadID DESC";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->get_result();
					$checkUser = $result->num_rows;
					if($checkUser > 0){
						while($row = $result->fetch_assoc()){ ?> 
							<div class="col-md-12 col-sm-12 col-lg-12 leftRightPaddingSetZero" style="padding-top: 1%;">
								<b>Uploaded By: </b><a href="#"><?php echo $row['fullname'];?></a>
							</div>
							<div class="col-md-12 col-sm-12 col-lg-12 leftRightPaddingSetZero">
								<p class="col-md-8 col-sm-8 col-lg-8 leftRightPaddingSetZero"><?php echo $row['uploadDate'] . '   ' . $row['uploadTime']?></p>
								<?php if($userID == $row['userID']){ 
										$_SESSION['threadID'] = $row['threadID'];
										$_SESSION['threadContent'] = $row['threadContent'];
										$_SESSION['threadTitle'] = $row['threadTitle'];
									?>
									<a href="threadEdit.php" target="_blank" class="col-md-2 col-sm-2 col-lg-2  btn btn-xs btn-primary">Edit</a>
									<a href="delete.php" data-href="" class="col-md-2 col-sm-2 col-lg-2  btn btn-xs btn-danger">Delete</a>
							</div>
						<?php } 
							$_SESSION['threadID'] = $row['threadID'];
						?>
							<p class="col-md-12 col-sm-12 col-lg-12 leftRightPaddingSetZero stopWordBreaking" style="font-size: 150%;"><b><?php echo $row['threadTitle']?></b></p>

							<a class="col-md-12 col-sm-12 col-lg-12 stopWordBreaking onlyBorder" style="font-size: 110%; cursor: pointer;" onclick="onread('<?php echo $row['threadTitle']?>', '<?php echo $row['threadContent']?>', '<?php echo $row['userID']?>', '<?php echo $row['threadID']?>','<?php echo $_SESSION['userID']?>')">Read this..</a>
							
							<br />
					<?php }
					}
					else{
						echo "<legend>No Threads<legend>";
					}
				?>
			</div>
		</div>
		<div class = "container"><!--Read the Blog Modal when Logged In-->
			<?php
				$commentErr = "";
				$comment = "";
				$valid = true;
				//$userID = "none";
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					$valid = true;
					if(isset($_POST['submit'])){
						if($_SESSION['userID'] != null){
							if(empty($_POST["comment"]))
							{
								$valid = false;
								$commentErr = "comment required";
							}
							else{
								$comment = check_input($_POST["comment"]);
							}
							if($valid == true){
								$userID = $_SESSION['userID'];
								$threadID = $_SESSION['threadID'];
								$date = date("Y/m/d");
								date_default_timezone_set("Asia/Dhaka");
								$time = date("h:i a");
								$commentSql = "INSERT INTO comments (threadID, commentContent, userID, commentDate, commentTime) VALUES (?, ?, ?, ?, ?)";
								$stmt = $conn->prepare($commentSql);
								$stmt->bind_param("isiss", $threadID, $comment, $userID, $date, $time);
								if($stmt->execute()){
									$_SESSION['commentSuccessful'] = "<font color='green'><b>Successfully Uploaded !!</b>";
									$stmt->close();
									//$conn->close();
								}
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
			<div class="modal fade" id="readModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" style="overflow-y: initial !important">
					 <div class="modal-content" style="">
						  <div class="modal-header">
							   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							   <h4 class="modal-title stopWordBreaking" id="myModalLabel" style="text-align: center"><b></b></h4>
						  </div>
						  <div class="modal-body" style="overflow-y: auto; height: 430px;">
						   		<p class="col-lg-12 col-sm-12 col-md-12 text-center description stopWordBreaking"></p>
						   		<p class="col-lg-12 col-sm-12 col-md-12 stopWordBreaking">  
						   			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<textarea class="form-control" rows="4" name="comment"></textarea>
										<span class="error"><?php echo $commentErr;?></span><br />
										<div class="col-lg-8 col-md-8 col-sm-8"></div>
										<div class="col-lg-12 col-md-12 col-sm-12 onlyBorder" style="padding-bottom: 1%;">
											<div class="col-md-4 col-sm-4 col-lg-4 col-lg-offset-8">
														<input type="submit" name="submit" value="comment" class="form-control btn btn-xs btn-primary">
											</div>
											
										</div>
									</form>
						   		</p>
						   		<div class="col-lg-12 col-sm-12 col-md-12 stopWordBreaking leftRightPaddingSetZero " id="showComments" style="padding-bottom: 1%;">
						   			
						   		</div>
						  </div>
						  <div class="modal-footer">
							  	<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						  </div>
					 </div>
				</div>
   			</div>
		</div>
		<?php include_once('modalOfContentReading.php');?>
	</body>
</html>
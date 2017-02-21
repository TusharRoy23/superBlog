<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/superBlog/assets/css/bootstrap.css">
		<script type="text/javascript" src="/superBlog/assets/js/jquery.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/superBlog/assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/superBlog/style/style.css">
		<script type="text/javascript" src="/superBlog/assets/customJs/sideBar.js"></script>
		<script type="text/javascript" src="/superBlog/assets/customJs/readView.js"></script>
	</head>
	<body>
		<div class="" style="">
			<div class="col-lg-12 col-md-12 col-sm-12 leftRightPaddingSetZero">
				<?php
					include_once("DBconfig.php");
					$userID = $_SESSION['userID'];
					$sql = "SELECT * FROM threads where userID = ? ORDER BY threadID DESC";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("i", $userID);
					$stmt->execute();
					$result = $stmt->get_result();
					$checkUser = $result->num_rows;
					if($checkUser > 0){
						while($row = $result->fetch_assoc()){ ?> 
							<div class="col-md-12 col-sm-12 col-lg-12 leftRightPaddingSetZero">
								<p class="col-md-8 col-sm-8 col-lg-8 leftRightPaddingSetZero"><?php echo $row['uploadDate'] . '   ' . $row['uploadTime']?></p>
								<?php if($userID == $row['userID']){ 
										//$_SESSION['threadID'] = $row['threadID'];
									?>
									<a href="#" class="col-md-2 col-sm-2 col-lg-2  btn btn-xs btn-primary">Edit</a>
									<a href="delete.php" data-href="" class="col-md-2 col-sm-2 col-lg-2  btn btn-xs btn-danger">Delete</a>
							</div>
						<?php } ?>
							
							<p class="col-md-12 col-sm-12 col-lg-12 leftRightPaddingSetZero stopWordBreaking" style="font-size: 150%;"><b><?php echo $row['threadTitle']?></b></p>
							<p class="col-md-12 col-sm-12 col-lg-12 stopWordBreaking onlyBorder" style="font-size: 110%;"><?php echo $row['threadContent']?></p>
							<br />
					<?php }
					}
					//$stmt->close();
				?>
				
				<p></p>
			</div>
		</div>

	</body>
</html>
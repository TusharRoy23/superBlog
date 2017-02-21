<!DOCTYPE html>
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
		<script type="text/javascript" src ="/superBlog/assets/customJs/readView.js"></script>
	</head>
	<body>

		<?php
				session_start();
				if($_POST['keyword'] && !empty($_POST['keyword'])){
					include_once('DBconfig.php');
					$keyword = $_POST['keyword'];
					$nonLoggedOrLoggedInID =""; 
					$nonLoggedOrLoggedInID = $_SESSION['userID'];;
        			$keyword="%$keyword%";
        			$sql = "SELECT * from threads JOIN users ON threads.userID = users.userID where threads.threadTitle like ?";
        			$stmt = $conn->prepare($sql);
        			$stmt->bind_param("s", $keyword);
        			$stmt->execute();
        			//$stmt->store_result();
        			$result = $stmt->get_result();
					$checkUser = $result->num_rows;
        			if($checkUser == 0){
        				echo "<div id='item' class = 'stopWordBreaking col-lg-12 col-md-12 col-sm-12' style='padding-top:1%; padding-bottom:1%;'> <p style = 'font-weight:bold;'>No results found </p></div>";
            			$stmt->close();
        			}
        			else{
            			while ($row = $result->fetch_assoc()) //outputs the records
            			{	?>
                			<div class="onlyBorder stopWordBreaking col-lg-12 col-md-12 col-sm-12" style='padding-top:1%; padding-bottom:1%;'>
                				<a id ='item' style='text-decoration: none; font-weight:bold; cursor:pointer;' onclick="onread('<?php echo $row['threadTitle']?>', '<?php echo $row['threadContent']?>', '<?php echo $row['userID']?>', '<?php echo $row['threadID']?>', '<?php echo $nonLoggedOrLoggedInID ;?>')">
                					<?php echo $row['threadTitle'];?>
                				</a>
                			</div>
            			<?php };
            			$stmt->close();

        			}
				}
		?>
	</body>
</html>
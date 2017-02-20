<?php
	include_once('DBconfig.php');
	$userID = $_POST['userID'];
	$threadID = $_POST['threadID'];
	$sql = "SELECT * FROM comments JOIN users ON comments.userID = users.userID where comments.threadID = ? ORDER BY comments.commentID DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $threadID);
	$stmt->execute();
	$result = $stmt->get_result();
	$arr = array();
	$checkUser = $result->num_rows; //count total rows
	if($checkUser > 0){
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
		echo json_encode($arr);

	}
	else{
		echo json_encode($arr);
	}
	$stmt->close();
	$conn->close();
?>
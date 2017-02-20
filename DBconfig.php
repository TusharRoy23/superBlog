<?php
	$conn = new mysqli("localhost","root","","superblog"); 
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error());
	}
?>
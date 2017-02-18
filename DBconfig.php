<?php
	$conn = mysqli_connect("localhost","root","","superblog"); 
	if(!$conn)
	{
		die("connection failed".mysqli_connect_error());
	}
?>
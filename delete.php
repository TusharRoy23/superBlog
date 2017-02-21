<?php
	session_start();
	include_once("DBconfig.php");
	echo $_SESSION['threadID'];
?>
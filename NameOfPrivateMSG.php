<?php 
	
	require 'Config/Config.php';

	$sender = $_COOKIE['LoginId'];
	$target = $_POST['target'];

	$sql = "SELECT `username` from users WHERE id = $target";

	$username = "";

	try{
		$res = $db->query($sql);

		while ($ac = $res->fetch_assoc()) {
			$username = $ac['username'];
		}
		echo "$username";
	}catch(Exception $ex){
		header("Location:home.php");
	}
	



?>
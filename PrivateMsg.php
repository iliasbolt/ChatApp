<?php 

	require 'Config/Config.php';


	$sender = $_COOKIE['LoginId'];
	$receiver = $_POST['idD'];
	$text = $_POST['text'];



	if(empty($text) || is_null($text))
	{
		header("Location:home.php");
	}
	if($sender == $receiver)
	{
		echo'<script>alert("You Cant send A message to You self... ");</script>';
		header("Location:home.php");
	}


	$date_msg = Date('Y-m-d H:i:s');;
	$read_msg = "0";

	try{
		$sql ="INSERT INTO private_msg (`sender`,`receiver`,`text`,`date_msg`,`read_msg`) VALUES ('$sender','$receiver','$text','$date_msg','$read_msg');";

		if(!$db->query($sql) === TRUE)
		{
			throw new Exception("Not Send ", 1);
		}

	}catch(Exception $ex)
	{
		header("Location:home.php");
	}

	





?>
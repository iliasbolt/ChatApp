<?php 

	require 'Config/Config.php';

	$me = $_COOKIE['LoginId'];
	$hisId = $_POST['idQ'];



	//hna khassni nkon chost les message li jawni sf 

	$sql = "UPDATE private_msg SET read_msg = 1 WHERE receiver = $me and sender = $hisId ";

	if(!$db->query($sql))
	{
		throw new Exception("Cant read correctlie ", 1);
		
	}




?>
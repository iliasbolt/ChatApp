<?php 

	require 'Config/Config.php';

	$id = $_COOKIE['LoginId'];

	$sql = "SELECT * FROM users WHERE id = $id";

	$imgset="";

	$getusername = "";
	$getpassword = "";
	$getdescription = "";
	$getage = "";
	$getdate= "";
$getimg = "";



	try{
		$res = $db->query($sql);
		while ($acc = $res->fetch_assoc()) {
			if(!is_null($acc['img']))
			{
				$imgset = $acc['img'];
			}
			$getage = $acc['age'];
			$getusername = $acc['username'];
			$getpassword = $acc['password'];
			$getdescription = $acc['description'];
			$getdate = $acc['date_naissance'];
			
		}

		if(is_null($imgset))
			$imgset = "uploads/User.png";
	
	}
	catch(Exception $ex){
		if(is_null($imgset))
			$imgset = "uploads/User.png";

	}
	




?>
<?php 
	
	$idCookie = $_COOKIE['LoginId'];
	if(empty($idCookie) || is_null($idCookie))
	{
		setcookie("LoginId","",time()-2000000);
		header("Location : index.php");

	}
	




?>
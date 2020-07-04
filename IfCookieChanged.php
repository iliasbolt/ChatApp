<?php 

	require 'Config/Config.php';

	$idCookie = $_COOKIE['LoginId'];


	$usErname = $_COOKIE['SSSTcaS'];

	$nn = $db->real_escape_string($usErname);

	$sql = "SELECT `id` FROM users WHERE email like '%$nn%'";

	$res = $db->query($sql);

	$normal_ID = "";

	$row = $res->fetch_array();

	if(count($row) == 0 || count($row) < 0 )//ila majab walo ya3ni bedel f email or id hhhhh
		{
			setcookie("LoginId","",time() - 200000);
			setcookie("SSSTcaS","",time() - 200000);
		}

	$normal_ID = $row['id'];

	if($idCookie != $normal_ID)
	{
		setcookie("LoginId","",time() - 200000);
		setcookie("SSSTcaS","",time() - 200000);
	}

	$normal_ID="";

	//

	//echo ' > '.$usErname.'';

	//$realId = "";





?>
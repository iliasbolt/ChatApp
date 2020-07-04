<?php 

	require 'Config/Config.php';

	$txt = $_POST['msg'];

if(!empty($txt) && !is_null($txt))
{
	$text = $db->real_escape_string($txt);

	$chat_user_id = $_COOKIE['LoginId'];
	$chat_text = $text;
	$chat_date = Date('Y-m-d H:i:s');
	 

	$sql = "INSERT INTO room (`chat_user_id`,`chat_text`,`chat_date`) VALUES ('$chat_user_id','$chat_text','$chat_date');";

	if(!$db->query($sql) === TRUE){
		throw new Exception("C'ant insert", 1);
	}

}


	//header("Location:home.php");



?>
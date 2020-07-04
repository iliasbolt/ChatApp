<?php 

	require 'Config.php';

	$id = $_COOKIE['LoginId'];

	$sql  = "SELECT * FROM private_msg where receiver = $id and read_msg = 0";

	$check = false;

	try
	{
		$res = $db->query($sql);
		$lisaredlek ="";

		while ($ac = $res->fetch_assoc()) {

			$lisaredlek = $ac['sender'];
			$check = true;
			//echo "<script> console.log('new messages');</script>";

			//khassni ndir xi song fax ykono new messages
			//ya3ni hnaya
			

		}

		if($check)
		{
			echo '<button class="MessagePrv" id="iconTested" style="background-image: url(imgs/havemessage.png);background-size: cover;" onclick="OpenMessages();"></button>';
			
		}
		else{
			echo '<button class="MessagePrv" id="iconTested" style="background-image: url(imgs/message.png);background-size: cover;"></button>';
			
		}
		$check = false;

	}catch(Exception $ex)
	{
		header("Location:home.php");
	}
	
		/*
		//test if you hhhh
		if($id == $lisaredlek)
		{
			continue ;
		}
		$s = "SELECT `username`,`id` FROM users where id = $lisaredlek";
		$ress = $db->query($s) or die ($db->error());
		$row  = $ress->fetch_array();
		$theName = $row['username'];
		echo "<script> console.log('message from $theName');</script>";
		*/

	

	




?>
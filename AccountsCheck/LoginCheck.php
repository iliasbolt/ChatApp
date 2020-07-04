<?php 

	require 'Config/Config.php';

	if(isset($_POST['submit']))
	{
		$error_msg="";
		$email = $_POST['email'];
		$password = $_POST['password'];
		$found = false;
		$id = 0;
		try{
			$sql = "SELECT `id`,`email`,`password` FROM users ";

			$res = $db->query($sql);
			while ($acc = $res->fetch_assoc()) {
				if($email == $acc['email'] && $password == $acc['password'])
				{
					$found = true;
					$id = $acc['id'];
					break;
				}
			}
			if($found)
			{
				$error_msg= "You In ";
				//wa ghansejel id dialo f cookie
				$dt = time();
					setcookie("LoginId",$id,$dt+10000);//expires in houre
					setcookie("SSSTcaS",$email,$dt+10000);
				//hna khasso yfte7 l home page
					header("Location:home.php");
			}
			elseif (!$found) {
				$error_msg = "Username or password not Correct !";
			}
		}catch(Exception $ex)
		{
			return;
		}
		


	}







?>
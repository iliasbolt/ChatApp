<?php 
	
	require 'Config/Config.php';
	
	if(isset($_POST['submitSIGNUP']))
	{	
		$error_msg2="";

		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$age = $_POST['age'];
		$YourIdRealOn="";
		$date_account = date('Y-d-m');

		$found = false;

		////now check if email or username is alredy exists
			$sql = "SELECT `username`,`email`,`id` FROM users";
			$res = $db->query($sql);
			while ($acc = $res->fetch_assoc()) {
				if($email == $acc['email'] )
				{
					$found =true;
					$error_msg2 = "email alredy exists !";
					break;
				}	
				if($username == $acc['username'] )
				{
					$found =true;
					$error_msg2 = "username alredy exists !";
					break;
				}		
			}

		////////
			$img ="uploads/User.png";
		if(!$found)
		{
			$sql = "INSERT INTO users (`fullname`,`username`,`email`,`password`,`age`,`date_account`,`img`) VALUES ('$fullname','$username','$email','$password','$age','$date_account','$img');";

			if(!$db->query($sql))
			{
				$error_msg2= "Can't insert somthing is wrong";
			}
			else{
				echo '<script>alert("Your Account Created Successfuly Now Log In Please ....");</script>';
			}

		}
		
		

	}


	$_POST['fullname'] = '';
	$_POST['username']= '';
	$_POST['email']= '';
	$_POST['password']= '';
	$_POST['age']= '';

?>
<?php


	try{
		$db = new mysqli('localhost','root','mysql','chat_app');
	}
	catch(Exception $ex)
	{
		throw new Exception("Can't connect to database :(", 1);
		
	}
	

	


?>
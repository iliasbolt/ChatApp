<?php 

	require 'Config/Config.php';

	$id = $_POST['idD'];
	//throw new Exception("$id >>>>>>>>>>>>>>>>>>>>>>>", 1);
	
	$sql = "SELECT * FROM users WHERE id = $id";

	$res = $db->query($sql);

	$img_get_profile="";
	$username_get_profile="";
	$fullname_get_profile="";
	$email_get_profile="";
	$datenaissance_get_profile="";
	$dateaccount_get_profile="";
	$age_get_profile="";
	$description_get_profile="";

	while ($ac = $res->fetch_assoc()) {

		$img_get_profile=$ac['img'];
		$username_get_profile=$ac['username'];
		$fullname_get_profile=$ac['fullname'];
		$email_get_profile=$ac['email'];
		$de = substr($ac['date_naissance'], 0,10);
		$datenaissance_get_profile=$de;
		$datee = substr($ac['date_account'], 0,10);
		$dateaccount_get_profile=$datee;
		$age_get_profile=$ac['age'];
		$description_get_profile=$ac['description'];

}
	if(empty($description_get_profile) || is_null($description_get_profile))
		$description_get_profile = "This Account Has No Description !";

	echo 'Username :'.$username_get_profile.' <br> Fullname :'.$fullname_get_profile.' <br> Email : '.$email_get_profile.' <br> Date de Naissance :'.$datenaissance_get_profile.' <br> Date Of Join :'.$dateaccount_get_profile.' <br> Age :'.$age_get_profile.'<br> Description :'.$description_get_profile;




?>
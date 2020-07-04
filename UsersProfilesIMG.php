<?php 

	require 'Config/Config.php';

	$id = $_POST['idD'];
	//throw new Exception("$id >>>>>>>>>>>>>>>>>>>>>>>", 1);
	
	$sql = "SELECT `img` FROM users WHERE id = $id";

	$res = $db->query($sql);
	$img_get_profile="";

	while ($ac = $res->fetch_assoc()) {
		$img_get_profile = $ac['img'];
	}
	if(is_null($img_get_profile) || empty($img_get_profile))//ghan3tih image par default ila am3andox
		$img_get_profile="uploads/User.png";


	echo '<img src="'.$img_get_profile.'" />';
	


?>
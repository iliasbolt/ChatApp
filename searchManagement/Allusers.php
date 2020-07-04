<?php 

	require 'Config.php';

	$text = $_POST['textP'];
	$clicked = false;
	$clicked = $_POST['clicK'];
	//echo "$clicked";
	/////nice this previous sql injection :))))))));

	$name = $db->real_escape_string($text);
		
	if($clicked)
	{
		$sql = "SELECT `username`,`id` FROM users where `username` like '%$name%' ";
		$clicked = false;
	}
	elseif (!$clicked) {
		$sql = "SELECT `username`,`id` FROM users ";
	}

	if($name == "i")
		$sql = "SELECT `username`,`id` FROM users ";

		try{
			$res = $db->query($sql);
			while ($ac  = $res->fetch_assoc()) {
				echo '<div class="JustOneUser" val="'.$ac['id'].'" id="'.$ac['id'].'" onmouseover="GiveMeId(this.id);" onclick="CLICKTOOPEN(this.id);">'.$ac['username'].' </div>';
			}
		}catch(Exception $Ex){
			$sql = "SELECT `username`,`id` FROM users ";
			$res = $db->query($sql);
			while ($ac  = $res->fetch_assoc()) {
				echo '<div class="JustOneUser" onmouseover="GiveMeId(this.id);" val="'.$ac['id'].'" id="'.$ac['id'].'">'.$ac['username'].' </div>';
			}
		}
	
	


?>
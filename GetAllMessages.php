<?php 

	require 'Config/Config.php';

	$id = $_COOKIE['LoginId'];
	$limit = 5;
	$limit += $_POST['clickU'];

	$sql = "SELECT * from (SELECT * FROM room ORDER BY chat_id DESC LIMIT $limit) sub ORDER BY chat_id ASC";
	$style = false;

	$res = $db->query($sql);
	while ($msg = $res->fetch_assoc()) {
		$floaT = "";
		$txt_align = "";

		$idt = $msg['chat_user_id'];
		$s = "SELECT * FROM users where id = $idt";
		$r = $db->query($s);
		$userN = "";
		while ( $e = $r->fetch_assoc()) {
			$userN = $e['username'];
			//you name shod replaced by you
			if($e['id'] == $id)
			{
				$userN = "you said :";
				$floaT = "right";
				$txt_align="right";
			}

			$datee = substr($msg['chat_date'], 0,19);
			//echo "$datee";

	}
		if(is_null($userN) || empty($userN))
			$userN = "Deleted User :";
	
			$div = '<div class="JustOneMessage">
						<div class="JustOneMessage_head">
							<div class="JustOneMessage_head_user" style="float:'.$floaT.'; margin-right:1%;">
								'.$userN.' &nbsp 
							</div>
							<div class="JustOneMessage_head_date">
								'.$datee.'
							</div>
						</div>
						<div class="JustOneMessage_message" style="text-align:'.$txt_align.'; margin-right:15%; ">
							&nbsp &nbsp&nbsp&nbsp'.$msg['chat_text'].'
						</div>
			</div>' ;

			$float = "";
			$txt_align="";


		echo $div."<br>";
	
}



	






?>
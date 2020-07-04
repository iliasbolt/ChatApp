<?php 

	require 'Config/Config.php';

	$me = $_COOKIE['LoginId'];
	$khassYjiw = $_POST['idS'];


	$limit = 5;

	$nb = $_POST['clickS'];

	$limit += $nb;	
	///flowe ghanxof les message li jawni (les message li ana howa khassni nsta9blom)
	//3ad ghanxof les message li sayfetom ana 

	//------makhasnixi nxof les message dial nas akhrin li hiya (receiver = $receiver ) 7itax ghaykono 7ta li maxi diali tma :)

	//niiiiiiiiiice hadi work well

	$user = "";

	$hisName ="";

	$myName = "";
	$sql = "SELECT `username` FROM users WHERE id = $me";
	$r = $db->query($sql);
	while ($im = $r->fetch_assoc()) {
		$myName = $im['username'];
	}


	$sql = "SELECT `username` FROM users WHERE id = $khassYjiw";
	$r = $db->query($sql);
	while ($im = $r->fetch_assoc()) {
		$hisName = $im['username'];
	}

	$sql = "SELECT * from (SELECT * FROM private_msg where (receiver = $me and sender = $khassYjiw) or (receiver = $khassYjiw and sender = $me) order by id DESC LIMIT $limit  ) sub ORDER BY id ASC ";

	//echo "$myName <br>";
	//echo "$hisName";

	try{

		$res = $db->query($sql);
		while ($ac = $res->fetch_assoc()) {
				//khassni ism dial li saredlek
				if($ac['sender'] == $me)
				{
					$user = $myName;
				}
				else{
						$user = $hisName;
				}
					//////////niiiiiiiice kolxi mzn db 
				echo  '<div class="DateOut">'.$user.'&nbsp &nbsp'.substr($ac['date_msg'], 0,19).'</div><div class="Output">'.$ac['text'].'</div><br>';

		}

	}catch(Exception $ex)
	{
		header("Location:home.php");
	}
	


?>
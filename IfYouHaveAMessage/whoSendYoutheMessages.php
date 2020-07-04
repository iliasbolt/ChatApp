<?php 


	class userMsg
	{
		public $name;
		public $ID;
		function construct($user,$idd)
		{
			$this->name = $user;
			$this->ID = $idd;
		}
	}



	require 'Config.php';

	$id = $_COOKIE['LoginId'];

	$sql  = "SELECT Distinct `id`,`sender`,`receiver` FROM private_msg where receiver = $id and read_msg = 0 ORDER BY id DESC ";

	$check = false;

	$arrayname = array();

	try
	{
		$res = $db->query($sql);
		$lisaredlek ="";

		while ($ac = $res->fetch_assoc()) {

			$lisaredlek = $ac['sender'];
			$check = true;
			//test if you hhhh
						if($id == $lisaredlek)
						{
							continue ;
						}

			$s = "SELECT  `username`,`id` FROM users where id = $lisaredlek ";
			$ress = $db->query($s) or die ($db->error());
			$row  = $ress->fetch_array();
			$theName = $row['username'];

			//object userMsg
			$u = new userMsg();
			$u->construct($theName,$lisaredlek);
			array_push($arrayname, $u);




			
		
			
		}
			$arrayname2 = array_unique($arrayname,SORT_REGULAR);//remove duplicate

			///print_r($arrayname2);

	$$firstline = "";


		for ($i=0; $i <count($arrayname2); $i++) { 
			$n = $arrayname2[$i]->name;
			$d = $arrayname2[$i]->ID;
			//test if user is deleted 
			if(is_null($d) || empty($d) || $d ==0){
				$n = "deleted User ";
			}
			if($i == count($arrayname2)-1)
				$firstline = "";


			echo '<div class="TakeTheUser" onmouseover="GivemeIdMSG(this.id);" id="'.$d.'" style="border-bottom:'.$firstline.'";>
					'.$n.' is sent a message
				</div><br>';

				$firstline="";
		}

		//niiiiiiice db andi array bla duplicate hhhhhhh

	}catch(Exception $ex)
	{
		header("Location:home.php");
	}
	
		
		

	

	




?>
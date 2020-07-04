<?php 
	
	
	require 'Config/Config.php';

	$ifhasImage = false;
	$imghas = "";

		if(isset($_POST['submitbtn']))
			{
				$username = $_POST['usernameUPDATE'];
				$password = $_POST['passwordUPDATE'];
				$age = $_POST['ageUPDATE'];
				$datenaissance = $_POST['datenaissanceUPDATE'];
				$description = $_POST['description'];

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$img = "";
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				$id   = $_COOKIE['LoginId'];	
				/////
								// Check if image file is a actual image or fake image
				
			try{
					//check if he have already an image
						
							
			try{//ila kacnt image empty exeption will thrown
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				        
				    }

					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						    $uploadOk = 0;
					}
					if ($uploadOk == 0) {
    				echo "Sorry, your file was not uploaded.";
    				}
    				else 
    				{
					    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					        $img = "uploads/".basename( $_FILES["fileToUpload"]["name"]);
					    } else {
					        echo "Sorry, there was an error uploading your file.";
					        
					    }
					}

					if(empty($img))
					{
						$img = "uploads/User.png";
						$sql = "SELECT `img` FROM users where id = $id";
						$testimage ="";
						$res  = $db->query($sql);
						while ($ac = $res->fetch_assoc()) {
							if(!is_null($ac['img']))
							{
								$ifhasImage = true;
								$imghas = $ac['img'];
								break;
							}
						}
						$img = $imghas;//bax tb9a hiya nefsa/
						echo "image from database is $img";
						echo "  <br> <br> <br>line 64 ;;; ";
					}
					
				}catch(Exception $ex)
				{
					//ghadi n3tih image li kannt ando f base de donner
					$sql = "SELECT `img` FROM users where id = $id";
						$testimage ="";
						$res  = $db->query($sql);
						while ($ac = $res->fetch_assoc()) {
							if(!is_null($ac['img']))
							{
								$ifhasImage = true;
								$imghas = $ac['img'];
								break;
							}
						}
					$img = $imghas;//bax tb9a hiya nefsa/
					if(empty($img) || is_null($img))//ila kant khawya or null ghan3tih par default
						{
							echo "  <br> <br> <br>line 85 ;;; ";
							$img = "uploads/User.png";
						}
				}

			}catch(Exception $ex)
			{
				$sql = "SELECT `img` FROM users where id = $id";
						$testimage ="";
						$res  = $db->query($sql);
						while ($ac = $res->fetch_assoc()) {
							if(!is_null($ac['img']))
							{
								$ifhasImage = true;
								$imghas = $ac['img'];
								break;
							}
						}
					$img = $imghas;//bax tb9a hiya nefsa/

					if(empty($img) || is_null($img))//ila kant khawya or null ghan3tih par default
					{
						$img = "uploads/User.png";
						echo "  <br> <br> <br>line 107 ;;; ";
					}
				
			}
			



				//end of image process
				

				echo " $username  ,$password    ,$age   , $datenaissance   ,$description  >>>> $id";
				
				$sql = "UPDATE users set `username` = '$username' , `password` = '$password' , `age` = '$age' , `date_naissance` = '$datenaissance' ,`description` = '$description' ,`img` = '$img' where id = $id ";

				if(!$db->query($sql) === TRUE)
				{
					throw new Exception("not updated", 1);
				}
				else {
					//header("Location:home.php");
				}

			}

		

			//redo l home page pour actualise la page
	header("Location:home.php");






?>
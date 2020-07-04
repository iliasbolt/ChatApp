<?php 
	
	require 'AccountsCheck/CheckIfcanGoHome.php';

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>I-Chat Home Page</title>
	<meta charset="utf-8" >
	<link rel="icon" type="image/png" href="imgs/icon.png">
	<link rel="stylesheet" type="text/css" href="HomeStyle.css">
	<script type="text/javascript" src="jquery.js"></script>



	
</head>
<body>
	<div class="shadow" id="shadow">
		<div class="contPRV" id="contPRV">
			<div class="contPRVHeader">
				
				<button class="close"></button>	
				
			</div>
			<div class="contPRVbody">
				<div class="profileIMG">
					
				</div>
				<div class="AllInforAndMSG">
					
					<fieldset>
						<legend>All Informations</legend>
						<div class="Informations">
							
						</div>
					</fieldset>

					<div class="MessagesPRVZONE">

						<div class="MessagesPRVZONE_head">
							
						</div>

							<div class="MessagesPRVZONE_body">
								<div class="DateOut">
									
								</div>
								<div class="Output">
									
								</div>
							</div>
							<div class="MessagesPRVZONE_footer">
								<button id="LoadMorePrv">L.M</button>
									<input type="text" id="prvMSG" name="prvMSG" class="MessagesPRVZONE_footer_input"
									pattern="\w{1,}" title="put more then one character" placeholder="Send Private Message ..." />

								<button class="MessagesPRVZONE_footer_btn" id="sendPRVMSG"></button>
							</div>
					</div>

				</div>

			</div>
			<script>
			
					var clickEEE=4;
						$(".close").click(function(){
							shadow.style.display = "none";
						});
			
					
					
				</script>
		</div>
		<div class="WhoSendMessages" id="WhoSendMessages">
			<button class="close" id="closeTS">
				</button>
			<div class="WhoSendMessages_header">
				You Get Some Messages :
				
			</div>

			<div class="WhoSendMessages_body">
				<?php 
					require 'IfYouHaveAMessage/whoSendYoutheMessages.php';
				?>
				
			</div>

		</div>
		<script>
			$("#closeTS").click(function(){
				//WhoSendMessages.style.display="none";
				shadow.style.display="none";
			});
			
			var idR = 0;
			function OpenMessages()
			{
				shadow.style.display="block";
				contPRV.style.display="none";
				WhoSendMessages.style.display="block";
			}

			function GivemeIdMSG(id)
			{
				//alert("from hover in receive"+id);
				idR=id;
				return id;
			}

			function SwitchFromOpenMSGToProfile(idR)
			{	
				CLICKTOOPEN(idR);
			}




		</script>
	</div>
	<div class="head">
			<div class="logo">
				<img src="imgs/icon.png" alt="I-Chat Logo">
				<h3>&nbsp I-Chat</h3>
			</div>
			<div class="buttons">
				
				<table>
					<div class="msgZoneTest">
						<?php 
							require 'IfYouHaveAMessage/checkForNewMessage.php';
						?>
					</div>
					
					<button class="LogOut"></button>
				</table>
				<script >
					$(document).ready(function(){
						$(".LogOut").click(function(){
							document.cookie = "LoginId = ";
							document.cookie = "SSSTcaS = ";
							window.location.href="index.php";
						});
					});
				</script>
			</div>
	</div>

	<div class="FullHome">
		
	
		<div class="LeftSide">
			<div class="LeftSideHead" id="LeftSideHeadName">
				
				<?php 
					include 'GetImage.php';
					echo "Hello ".$getusername;
				?>
			</div>
			<div class="LeftSideBody">
				
				<img src="<?php echo $imgset; ?>" >

				<form method="POST"  action="ProfileUpdate.php" class="update" enctype="multipart/form-data">

					<input type="file" name="fileToUpload"  class="chooseImage" id="fileToUpload"
					title="Import Image ... " />
					<input type="text" name="usernameUPDATE" placeholder="Username ... " id="usernameUPDATE" required pattern="\w{4,10}" title="Put letters or numbers more than 4 and less then 10" 
					value="<?php echo $getusername ;?>" />

					<input type="password" name="passwordUPDATE" placeholder="Password ..." id="passwordUPDATE" required pattern="\w{5,}" title="Put more then 5 characters or numbers.." 
					value="<?php echo $getpassword ;?>" 
					/>

					<input type="date" name="datenaissanceUPDATE" id="datenaissanceUPDATE" required 
					value="<?php echo date('Y-m-d', strtotime($getdate));?>" />

					<input type="text" name="ageUPDATE" placeholder="Your Age ..." id="ageUPDATE" pattern="\d{2}" title="Put age less then 3 numbers and bigger then one ..." required 
					value="<?php echo $getage ;?>" />

					<textarea name="description" id="description" placeholder="Describe your self" 
					id="descriptionUPDATE" ><?php echo $getdescription ;?></textarea>
					
				
					<div class="updateButtons">
						<input type="submit" name="submitbtn" id="submitbtn" value="Submit" />
					</div>
				
				</form>
				<script>

					
							/*$("#submitbtn").click(function(){
								$.ajax({url:'ProfileUpdate.php',type:'POST',data:{username:'user'}}).done(function(result){
									//window.location.Reload(true);
								});
							});*/

				</script>


				<!--<button id="updatebtn">Update</button>-->
				<script>
					$(document).ready(function(){
						
					});
				</script>
			</div>
		</div>
		<div class="RightSide">
			<div class="RightSideHeader">
				<div class="TextArea">
					<input type="text" name="searchText" id="searchText" placeholder="Search ... "  title="Search with Usernames .... !!" />
				</div>
				<div class="btnSearch" id="btnSearch">
					<button>
						
					</button>
					<script>
						var clicked = false;
						$("#btnSearch").click(function(){
							//$(".AllPeople").html("");
							//alert("clicked from search");
							clicked  = true;
							var textT = document.getElementById("searchText").value;
							
							$.ajax({url:'searchManagement/Allusers.php',type:'POST',data:{textP:textT,clicK:clicked}}).done(function(result){
								$(".AllPeople").html(result);
								//
								//window.location.Reload(true);
							});

							clicked = false;
						});
						//now text change bax mli ykhwa input nred kolxi;
						$("#searchText").keyup(function(){
							var textT = document.getElementById("searchText").value;

								clicked = false;

							if(textT =="")
							{	textT = "i";
								$.ajax({url:'searchManagement/Allusers.php',type:'POST',data:{textP:textT,clicK:clicked}}).done(function(result){
									$(".AllPeople").html(result);
								});
							}
						});
						

					</script>
				</div>
			</div>
			<div class="AllPeople">
				<?php 
					include 'searchManagement/Allusers.php';
				?>
			</div>
		</div>
		<div class="CenterSide">
			<div class="Container">
			
				<div class="loadMore">
					Load Previous Messages

				</div>


				<div class="ALLMessages">
					
					<?php 
						require 'GetAllMessages.php';
					?>
				</div>
			</div>
			<div class="inputMSG">
				<input type="text" name="sendMessageinput" id="sendMessageinput" title="Send A message ... " placeholder="Send A message .." data-emojiable="true" data-emoji-input="unicode" />
				<button class="SendMessage" id="sendMSG">
					
				</button>

				<script>
					
					$("#sendMSG").click(function(){
							var txt = document.getElementById("sendMessageinput").value;
							if(!txt == "")
							{
								$.ajax({url:'PutMessageRoom.php',type:'POST',data:{msg:txt}}).done(function(){
									$.ajax({url:'GetAllMessages.php',type:'POST'}).done(function(result){
										$(".ALLMessages").html(result);
								//window.location.Reload(true);
									}); 
								}); 
							}
					});
					
					var clickW=0;
					$(".loadMore").click(function(){
						clickW+=2;
						$.ajax({url:'GetAllMessages.php',type:'POST',data:{clickU:clickW}}).done(function(result){
								$(".ALLMessages").html(result);
						}); 

					});
					//////////////profiles mangement ////////
					var idCliked = 0;
						function GiveMeId(cl)
						{
							idCliked =  cl;
							//alert(cl);
						}
						function CLICKTOOPEN(idCliked)
						{
							//alert("clicked");
							WhoSendMessages.style.display = "none";
							shadow.style.display = "block";
							contPRV.style.display="block";
							
							//hna ghanjib ;les donner
							$.ajax({url:'UsersProfiles.php',type:'POST',data:{idD:idCliked}}).done(function(result){
								$(".Informations").html(result);//hna ghanjib ;les img dial same persone
									$.ajax({url:'UsersProfilesIMG.php',type:'POST',data:{idD:idCliked}}).done(function(result){
									$(".profileIMG").html(result);//hna ghanjib les msg prive between two
										$.ajax({url:'GetPrivateMessageBetweenTwo.php',type:'POST',data:{idS:idCliked}}).done(function(result){
											$(".MessagesPRVZONE_body").html(result);//nice les prv msg f kan loadihom f load dial profile 

										///nice goood db khassni njib ism dial profile hhh
											$.ajax({url:'NameOfPrivateMSG.php',type:'POST',data:{target:idCliked}}).done(function(res){
												$(".MessagesPRVZONE_head").html(res);//display f zone de name

												///khassni ndir dik read darori ///update l readmsg bax ytsemaw rak 9ritihom//
												//nice db wax 9riti msg khaddama mzn 
												$.ajax({url:'ifYoureadTheMessage.php',type:'POST',data:{idQ:idCliked}}).done(function(){
													//khassni nbedel icon hahah
													$(".MessagePrv").css("background-image","url(imgs/message.png)");
												});



											});
									});
								});
							});
							




				}

						/////load more in privee
					$("#LoadMorePrv").click(function(){
						clickEEE+=2;
						$.ajax({url:'LoadMorePrvMsg.php',type:'POST',data:{clickS:clickEEE,idWho:idCliked}}).done(function(res){
							$(".MessagesPRVZONE_body").html(res);
						});
					});
						
	//---------------------		});


	
						$("#sendPRVMSG").click(function(){
						//send private msg ...//
							
							var txtT = document.getElementById("prvMSG").value;
							if(!txtT == "")
							{

								$.ajax({url:'PrivateMsg.php',type:'POST',data:{idD:idCliked,text:txtT}}).done(function(){
									$.ajax({url:'GetPrivateMessageBetweenTwo.php',type:'POST',data:{idS:idCliked}}).done(function(result){
										$(".MessagesPRVZONE_body").html(result);
									});

								});
								document.getElementById("prvMSG").value = "";
							}
							

						});
						

						
						//hna kola marra ghadi ymxi yjib data//
						window.setInterval(function(){


							$.ajax({url:'IfCookieChanged.php',type:'POST'}).done(function(res){
								//$(".head").html(res);
								
							});
							window.setInterval(function(){
								var cc = "";
							var em="";
							cc = document.cookie;
							if(!cc.includes('SSSTcaS') || !cc.includes('LoginId'))
								window.location.href="index.php";
							
							},500);
							

							//---------------------hna khasso ymxi yjib data wa y2affichiha f chat room 
							$.ajax({url:'GetAllMessages.php',type:'POST',data:{clickU:clickW}}).done(function(result){
								$(".ALLMessages").html(result);

							}); 
							////niiiiiiiiiiiiiice
							//-------------------- wa db khassni realtime chat f privee
							var img = "";
							$.ajax({url:'IfYouHaveAMessage/checkForNewMessage.php',type:'POST'}).done(function(res){
								$(".msgZoneTest").html(res);
								///nice now i wanna audio play
								
								img = $("#iconTested").css("background-image");
								//alert(img);
									var audio = new Audio('sounds/song1.wav');

								if(img === 'url("http://localhost/ChatApp/imgs/havemessage.png")')
								{
									audio.play();
									
									img="";
								}
								else
								{
									//alert("no");
									try{
										audio.stop();
									}
									catch(err){
										return ;
									}
									
								}
								
						
							});
							try{
									//actualiser les checke
								$.ajax({url:'IfYouHaveAMessage/checkForNewMessage.php',type:'POST'}).done(function(result){
											$(".msgZoneTest").html(result);
								});
								//actualiser les whoSend
								$.ajax({url:'IfYouHaveAMessage/whoSendYoutheMessages.php'}).done(function(result){
											$(".WhoSendMessages_body").html("");
											$(".WhoSendMessages_body").html(result);
								});
							//niiiiiiiiiiiiiiiiicekolxi mzn db 
							}catch(exe){
								return ;
							}
							
							//console.log("hello");

						},5000);

				</script>

			</div>
		</div>
		

	</div>
	<footer>
		Copyright &copy to <strong>ilias Balhi 2020-2021</strong>
	</footer>

</body>
</html>
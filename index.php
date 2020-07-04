<!DOCTYPE html>
<html>
<head>
	<title>I-Chat</title>
	<link rel="icon" type="image/png" href="imgs/icon.png">
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	<div class="User">
		
	</div>
<div class="head">
		<table class="iconAndTitle">

			<tr>
				<td>
					<img src="imgs/icon.png" id="icon" title="I-Chat Icon" />
				</td>
				
				<td class="titre">
					I-Chat
				</td>
			</tr>

		</table>
	
		
			<ul style="margin-top: 10px;margin-right: 3%;">
				<li id="showAbout">About Us</li>
				<li id="showContact">Contact Us</li>
			</ul>
		
</div>
	<!------Shadows and contact and about us --->
	<div class="shadow" id="shadow">
		<!-- Contact Us-->
			<div class="Contact" id="about">
				<div class="cont">
					<div class="ContactHeader">
						About Us
					<button class="close"></button>

					</div>
					<div class="info" >
							<fieldset>
								<legend>
									Informations :
								</legend>
								<p>
									Hello ,
									 -> you should Respect other users in the website 
									  -> we using cookies so if you enter the website you agree about using them 
and i hope you have happy chatting<br> and meet new friends :) 
			
								</p>

							</fieldset>
					</div>
				
				
					
				</div>
				

				
			</div>

		<!--- About Us-->
		<div class="Contact" id="contact">
				<div class="ContactHeader">
					Contact Us
					<button class="close" style="margin-top: -27px;"></button>
				</div>
				<script>
					$(".close").click(function(){
						shadow.style.display = "none";
					});
				</script>
				<div class="info">
							<fieldset>
								<legend>
									Informations :
								</legend>
								<p>
									I'm Just Beginner who Made this website From scratche <br>
									FullName : Ilias Balhi <br>
									Country :Morroco<br>
									Email:balhi.ilias@gmail.com<br>
									Github:https://github.com/iliasbolt<br>
									linkedin:https://www.linkedin.com/in/ilias-balhi-73b7931a1/
									Facebook:https://www.facebook.com/ilyas.mohamm <br>
								</p>
								<button class="Facebook" id="fb">
								</button>
								<button class="Github" id="gt">
								</button>
								<button class="LinkedIn" id="lk">
								</button>
							</fieldset>
					</div>
		</div>
	</div>
	<script >
		$(document).ready(function(){
			$(".close").click(function(){
				shadow.style.display="none";
			});

			$("#showAbout").click(function(){
					shadow.style.display="block";
					contact.style.display = "none";
					about.style.display="block";

			});
			$("#showContact").click(function(){
				shadow.style.display="block";
				contact.style.display = "block";
				about.style.display="none";
			});
			$("#fb").click(function(){
				var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
				var URL = "https://www.facebook.com/ilyas.mohamm" ;
				window.open(URL, "_blank", strWindowFeatures);
			});
			$("#gt").click(function(){
				var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
				var URL = "https://github.com/iliasbolt" ;
				window.open(URL, "_blank", strWindowFeatures);
			});
			$("#lk").click(function(){
				var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
				var URL = "https://www.linkedin.com/in/ilias-balhi-73b7931a1/" ;
				window.open(URL, "_blank", strWindowFeatures);
			});
		});
	</script>


	<!---------- END of them------>
	<div class="Main">
		<div class="LogIn " >
			<div class="text">
				Log In 
			</div>
			<div class="Info_LogIn">
				<form method="POST" >
					<?php 
						require 'AccountsCheck/LoginCheck.php';
					?>
					<input type="email" name="email" id="username" placeholder="E-mail ..." required  title="Put your email ..."/><br>
					<input type="password" name="password" id="password"  placeholder="Password ..." required pattern="\w{5,}" title="Put more then 5 characters or numbers.."/><br>
					<input type="submit" name="submit" id="submitIn" value="Log In" />
					<h4 id="forget">Forget Password ! Click here </h4>
				</form>
				<script>
					$("#forget").click(function(){
						var email = "";

						email = username.value;

						if(email == ""){

							alert("Put Your Email in Email zone !!!!");
						}
						else{
						
						//khassni nchofe wax kayn @gmail.com f email zone 
						$.ajax({url:'sendMail.php',type:'POST',data:{MMail:email}}).done(function(result){
							$("#forget").html(result);
						});
					}


						
					});
				</script>
				<div class="errorZoneLOGIN">

					<?php 
						echo $error_msg;
					?>
					
				</div>
			</div>
		</div>
		
		<div class="SignUp">
			<div class="text">
				Sign Up
			</div>
			<div class="Info_SignUp">
				<form method="POST">

					<?php 
						require 'AccountsCheck/CreateAccount.php';
					?>
				<input type="text" name="fullname" id="fullnameSIGNUP" placeholder="FullName ..." required pattern="\w{4,}" title="Put letters or numbers more than 4" /><br>

				<input type="text" name="username" id="usernameSIGNUP" placeholder="Username ..." required pattern="\w{4,10}" title="Put letters or numbers more than 4 and less then 10"/><br>

				<input type="email" name="email" id="emailSIGNUP" placeholder="E-mail ..." required title="Put Your email .."/><br>

				<input type="password" name="password" id="passwordSIGNUP" placeholder="Password ..." required pattern="\w{5,}" title="Put more then 5 characters or numbers.." /><br>

				<input type="text" name="age" id="age" pattern="\d{2}"  required placeholder="Your Age ..." title="Put age less then 3 numbers and bigger then one ..."/><br>

				<input type="submit" name="submitSIGNUP" id="submitSIGNUP" value="Sign Up"/>

				</form>
				<div class="errorZone">
					<?php 
						echo $error_msg2;
					?>
				</div>
			</div>
		</div>
		<div class="ligne">
			
		</div>
	</div>
	<footer>
		Copyright &copy to <strong>ilias Balhi 2020-2021</strong>
	</footer>
	
</body>
</html>
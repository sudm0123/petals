<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Settings Page-->
<?php
	session_start();
	if(isset($_SESSION['security_question']))
	{
		;
	}
	else
	{
		header('location: security_question.php');
	}
	if(isset($_SESSION['email']))
	{
		$_SESSION['about']="settings";
		$_SESSION['contact']="settings";
	}
	else
	{
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<script>
			<?php
				if(isset($_SESSION['setting_pop_up']))
				{
					if($_SESSION['setting_pop_up']=="password_error")
					{
						echo 'alert("You Entered The Wrong Password...\nPlease Re-Enter Your Password !!!");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="password_length_error")
					{
						echo 'alert("Password Should Be Of Minimum 8 Characters.");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="password_format_error")
					{
						echo 'alert("Password Should Contain At-least 1 Lower-case Character, 1 Upper-case Character n 1 Digit...\nPlease Re-enter the Details !!");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="name_password_same_error")
					{
						echo 'alert("Please Enter A Better Password !!");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="password_match_error")
					{
						echo 'alert("Passwords Do Not Match...\nPlease Re-Enter !!!");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="password_match")
					{
						echo 'alert("Your Password Has Been Changed !!!");';
						$_SESSION['setting_pop_up']="null";
					}
					else if($_SESSION['setting_pop_up']=="null")
					{
						;
					}
				}
			?>
		</script>
		<style>
			h1{text-align:center;letter-spacing:2px;text-transform:uppercase;font-family:"Times New Roman", Times, serif;}
			td{text-align:right;}
		</style>
		<title>Petals Flower Store: Settings Page</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="formsheet.css"/>
		<link rel="stylesheet" type="text/css" href="navigationsheet.css"/>
		<meta name="keywords" content="flower, store,petals">
		<meta name="description" content="Project for Internshala VTC">
		<meta name="author" content="Sudhanshu Malik">
	</head>
	<body>
		<div class="center">
			<div class="fixed">
				<?php include 'canvas.php'; ?>
				<div style="position:absolute;right:0px">
					<ul>
						<li class="list"><a href="contact.php">Contact</a></li>
						<li class="list"><a href="about.php">About</a></li>
						<li class="list"><a href="logout.php">LogOut</a></li>
						<li class="list"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
			</div>
			<div class="box" style="margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;">
				<center>
					<div style="width:550px;background-color:#000009;border-radius:100px;height:40px">
						<h1 style="color:#99CC00">Change Password</h1>
					</div>
				</center>
				<div class="marker" style="min-height:30px;width:300px;background-color:#ffffff">
				</div>
				<form name="settings" action="setting_script.php" method="post">
					<center>
						<table>
							<tr>
								<td>Old Password:</td>
								<td><input type="password" name="old_password" required="true" placeholder="Old Password"></td>
							</tr>
							<tr>
								<td>New Password:</td>
								<td><input type="password" name="new_password" required="true" placeholder="New Password"></td>
							</tr>
							<tr>
								<td>Retype New Password:</td>
								<td><input type="password" name="retype_new_password" required="true" placeholder="New Password"></td>
							</tr>
						</table>
						<div class="marker" style="min-height:20px;width:300px;background-color:#ffffff">
						</div>
						<input type="submit" value="Submit!">
					</center>
				</form>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
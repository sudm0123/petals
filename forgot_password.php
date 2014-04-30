<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Forgot Password Page-->
<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		header('location: home.php');
	}
	else
	{
		$_SESSION['about']="forgot_password";
		$_SESSION['contact']="forgot_password";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<script>
			<?php
			if(isset($_SESSION['pop_up2']))
			{
				if($_SESSION['pop_up2']=="format_error")
				{
					echo 'alert("Please Re-Enter Your Security Answer !!!");';
					$_SESSION['pop_up2']="fail";
				}
				else if($_SESSION['pop_up2']=="email_error")
				{
					echo 'alert("Please Enter The Valid E-Mail !!!");';
					$_SESSION['pop_up2']="fail";
				}
				else if($_SESSION['pop_up2']=="no_email")
				{
					echo 'alert("Your Account Does Not Exists..\nPlease Sign-Up Using The Login Page !!!");';
					$_SESSION['pop_up2']="fail";
				}
				else if($_SESSION['pop_up2']=="security_question_error")
				{
					echo 'alert("You Did Not Completed The Sign-Up Process...\nTherefore \'Sign-Up\' Again Using The Sign-Up Page !!!");';
					$_SESSION['pop_up2']="fail";
				}
				else if($_SESSION['pop_up2']=="wrong_answer_error")
				{
					echo 'alert("You Entered The Wrong Answer Of The Security Question...\nPlease Enter The Answer Again !!!");';
					$_SESSION['pop_up2']="fail";
				}
				else
				{
					;
				}
			}
			?>
		</script>
		<title>Petals Flower Store: Forgot Password</title>
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
						<li class="list"><a href="login.php">SignUp/Login</a></li>
						<li class="list"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
			</div>
			<div class="box" style="margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;">
				<center>
					<div style="width:550px;background-color:#000009;border-radius:100px;height:40px">
						<h1 style="color:#99CC00">Forgot Password??</h1>
					</div>
				</center>
				<div class="marker" style="min-height:30px;width:300px;background-color:#ffffff">
				</div>
				<form name="forgot_password" action="forgot_password_script.php" method="post">
					<center>
						<table>
							<tr>
								<td style="font-size:18px;text-align:center">E-Mail Id:</td>
							</tr>
							<tr>
								<td><input type="text" name="email" required="true" style="width:200px" placeholder="xyz@email.com"></td>
							</tr>
							<tr>
								<td style="font-size:18px;text-align:center">Where were you when you had your first kiss?</td>
							</tr>
							<tr>
								<td><input type="text" name="security_answer" required="true" style="width:200px" placeholder="Your Answer !!"></td>
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
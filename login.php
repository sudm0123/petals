<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Login Page-->
<?php
	session_start();
	if(isset($_SESSION['email']))
		header('location: home.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<script>
			<?php
				if(isset($_SESSION['pop_up']))
				{
					if($_SESSION['pop_up']=="login_fail")
					{
						echo 'alert("Wrong E-Mail Id & Password Combination..\nPlease Enter The Details Again !!!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="sign_up_fail")
					{
						echo 'alert("This E-Mail Id Is Already Registered..\nPlease Login To Your Registered Account..\nThanks !!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="no_account")
					{
						echo 'alert("This E-Mail Id Is Not Registered...\nPlease Create your Account And Re-Login !!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="name_password_same_error")
					{
						echo 'alert("Please Enter A Better Password !!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="password_length")
					{
						echo 'alert("Password Should Be Of Minimum 8 Characters !!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="password_format_error")
					{
						echo 'alert("Password Should Contain At-least 1 Lower-case Character, 1 Upper-case Character n 1 Digit...\nPlease Re-enter the Details !!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="name_error")
					{
						echo 'alert("Please Enter The Valid Name !!!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="email_error")
					{
						echo 'alert("Please Enter The Valid E-Mail !!!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="contact_error")
					{
						echo 'alert("Please Enter The Valid Contact Detail !!!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="city_error")
					{
						echo 'alert("Please Enter The Valid City !!!");';
						$_SESSION['pop_up']="null";
					}
					else if($_SESSION['pop_up']=="forgot_password_success")
					{
						echo 'alert("Your New Password Has Been Sent To Your Mail...\nPlease Log-In Using Your New Password...\nAnd Change Your Password After Log-In !!!");';
						$_SESSION['pop_up']="null";
					}
				}
			?>
		</script>
		<style>
			h1{text-align:center;letter-spacing:2px;text-transform:uppercase;font-family:"Times New Roman", Times, serif;}
			a.text:link {color:#000009;}
			a.text:visited {color:#000009;}
			a.text:hover {color:#ffcc00;}
			td{text-align:right;}
		</style>
		<title>Petals Flower Store: Login Page</title>
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
			</div>
			<div class="header">
			</div>
			<div class="box" style="min-height:400px;float:left;width:300px;margin:20px 0px 0px 90px">
				<center>
					<div style="width:250px;border-radius:100px;background-color:#000009;height:40px">
						<h1 style="color:#99CC00">Sign-Up</h1>
					</div>
				</center>
				<div class="marker" style="min-height:25px;width:300px;background-color:#ffffff">
				</div>
				<!--Sign-Up Form-"Start"-->
				<script>
					function signUpValidateForm()
					{
						var x=document.forms["signup"]["signup_email"].value;
						var atpos=x.indexOf("@");
						var dotpos=x.lastIndexOf(".");
						var valpass=document.forms["signup"]["signup_password"].value;
						var passlength=valpass.length;
						if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
						{
							alert("Not A Valid E-Mail Address");
							return false;
						}
						else if(passlength<8)
						{
							alert("Password Should Be Of Minimum 8 Characters!!");
							return false;
						}
						else
						{
							var check=confirm("Confirm The Details Entered!!\nIf Everything Is Fine, Press 'OK' To Continue.");
							if(check==false)
							{
								return false;
							}
						}
					}
				</script>
				<form name="signup" action="signup_script.php" method="post" autocomplete="on" onsubmit="return signUpValidateForm();">
					<center>
						<table>
							<tr>
								<td>Full Name:</td> 
								<td><input type="text" name="fullname" required="true" placeholder="Enter Your First Name" pattern="[ A-Za-z]+" onblur="upperCase()" autofocus></td>
							</tr>
							<tr>
								<td>Date of Birth:</td>
								<td><input type="date" required="true" name="dob" value="2013-01-01"></td>
							</tr>
							<tr>
								<td>Gender:</td>
								<td style="text-align:left;">
									<select name="sex"  required="true">
										<option value="male">Male</option>
										<option value="female" selected>Female</option>
										<option value="other">Other</option>
									</select>
								</td>
							<tr>
								<td>E-mail:</td>
								<td><input type="email" name="signup_email" required="true" placeholder="xyz@email.com" title="xyz@email.com"></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="signup_password" required="true" placeholder="password" title="Minimum 8 Characters Password and Should Contain At-least 1 Lower-case Character, 1 Upper-case Character and 1 Digit"></td>
							</tr>
							<tr>
								<td>Contact:</td>
								<td><input type="text" name="contact" required="true" placeholder="10 Digit Mobile No." pattern="[0-9]{10}" title="10 Digit Mobile No."></td>
							</tr>
							<tr>
								<td>Address:</td> 
								<td><input type="text" name="address" required="true" spellcheck="true" placeholder="Address" onblur="addressUpperCase()"></td>
							</tr>
							<tr>
								<td>City:</td> 
								<td><input type="text" name="city" required="true" spellcheck="true" placeholder="City" pattern="[ A-Za-z]+" onblur="cityUpperCase()"></td>
							</tr>
						</table>
						<?php
							/*require_once('recaptchalib.php');
							$publickey = "your_public_key"; // you got this from the signup page
							echo recaptcha_get_html($publickey);*/
						?>
						<div class="marker" style="min-height:10px;width:300px;background-color:#ffffff">
						</div>
						<input type="submit" value="Sign Up!">
					</center>
				</form>
				<!--Sign-Up Form-"End"-->
			</div>
			<div class="box" style="min-height:400px;float:left;width:300px;margin:20px 0px 0px 80px">
				<center>
					<div style="width:250px;border-radius:100px;background-color:#000009;height:40px">
						<h1 style="color:#99CC00">Login</h1>
					</div>
				</center>
				<div class="marker" style="min-height:70px;width:300px;background-color:#ffffff">
				</div>
				<!--Login Form-"Start"-->
				<script>
					function loginValidateForm()
					{
						var x=document.forms["login"]["login_email"].value;
						var atpos=x.indexOf("@");
						var dotpos=x.lastIndexOf(".");
						if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
						{
							alert("Not A Valid E-Mail Address");
							return false;
						}
					}
				</script>
				<form name="login" action="login_script.php" method="post" autocomplete="on" onsubmit="return loginValidateForm();">
					<center>
						<table>
							<tr>
								<td>E-mail:</td>
								<td><input type="email" name="login_email" required="true" placeholder="Enter Your E-Mail" title="xyz@email.com"></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" required="true" name="login_password" placeholder="password"></td>
							</tr>
						</table>
						<div class="marker" style="min-height:10px;width:300px;background-color:#ffffff">
						</div>
						<input type="submit" value="Login!">
					</center>
				</form>
				<!--Login Form-"End"-->
				<center>
					<div>
						<a class="text" href="forgot_password.php" style="text-decoration:none;"><p><small>Forgot Password??</small></p></a>
					</div>
				</center>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
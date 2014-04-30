<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Contact Page-->
<?php
	session_start();
	$_SESSION['about']="contact";
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<style>
			h1{text-align:center;letter-spacing:2px;text-transform:uppercase;font-family:"Times New Roman", Times, serif;}
			td{text-align:right;}
		</style>
		<title>Petals Flower Store: Contact Page</title>
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
						<li class="list"><a <?php
											if($_SESSION['contact']=="index")
												echo 'href="index.php"';
											else if($_SESSION['contact']=="about")
												echo 'href="about.php"';
											else if($_SESSION['contact']=="home")
												echo 'href="home.php"';
											else if($_SESSION['contact']=="settings")
												echo 'href="settings.php"';
											else if($_SESSION['contact']=="success")
												echo 'href="success.php"';
											else if($_SESSION['contact']=="confirm")
												echo 'href="confirm.php"';
											else if($_SESSION['contact']=="forgot_password")
												echo 'href="forgot_password.php"';
											?>
											>Back</a></li>
						<li class="list"><a href="about.php">About</a></li>
						<li class="list"><a <?php
											if(isset($_SESSION['email']))
											{
												echo 'href="logout.php">';
												echo 'LogOut';
											}
											else
											{
												echo 'href="login.php">';
												echo 'SignUp/Login';
											}
											?>
											</a></li>
						<li class="list"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
			</div>
			<div class="box" style="width:700px;margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;">
				<center>
					<div style="width:600px;border-radius:100px;background-color:#000009;height:40px">
						<h1 style="color:#99CC00">We Love Hearing From You!!!</h1>
					</div>
				</center>
				<div class="marker" style="min-height:40px;width:300px;background-color:#ffffff">
				</div>
				<script>
					function contactValidateForm()
					{
						var x=document.forms["contact"]["contact_email"].value;
						var atpos=x.indexOf("@");
						var dotpos=x.lastIndexOf(".");
						if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
						{
							alert("Not a valid e-mail address");
							return false;
						}
					}
				</script>
				<form name="contact" action="MAILTO:sudm0123@yahoo.com" method="post" enctype="text/plain" <?php
																												if(isset($_SESSION['email']))
																												{
																													;
																												}
																												else
																												{
																													echo 'onsubmit="return contactValidateForm();"';
																												}
																											?>>
					<center>
						<table>
							<tr>
								<td>Name:</td>
								<td><input type="text" name="name" required="true" placeholder="Your Name" pattern="[ A-Za-z]+" onblur="upperCase()"></td>
							</tr>
							<?php
								if(isset($_SESSION['email']))
								{
									echo '<input type="hidden" name="contact_email" value=$_SESSION[\'email\']>';
								}
								else
								{
									echo '<tr>
											<td>E-mail:</td>
											<td><input type="email" name="contact_email" required="true" placeholder="Your E-Mail" title="xyz@email.com"></td>
										</tr>';
								}
							?>
							<tr>
								<td>Comment:</td>
								<td><textarea rows="5" cols="16" spellcheck="true">
									</textarea>
									</td>
							</tr>
						</table>
						<div class="marker" style="min-height:20px;width:300px;background-color:#ffffff">
						</div>
						<input style="display:inline" type="submit" value="Send">
						<input style="display:inline" type="reset" value="Reset">
						<div class="marker" style="min-height:20px;width:300px;background-color:#ffffff">
						</div>
					</center>
				</form>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
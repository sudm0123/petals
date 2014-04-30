<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the About Page-->
<?php
	session_start();
	$_SESSION['contact']="about";
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<style>
			@font-face
			{
				font-family: edwardian_script;
				src: url(itcedscr.ttf);
			}
			p {text-align:center;line-height:190%;letter-spacing:3px;font-size:16px;}
			p:first-letter{color:#ffcc00;font-size:xx-large;}
		</style>
		<title>Petals Flower Store: About Page</title>
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
											if($_SESSION['about']=="index")
												echo 'href="index.php"';
											else if($_SESSION['about']=="contact")
												echo 'href="contact.php"';
											else if($_SESSION['about']=="settings")
												echo 'href="settings.php"';
											else if($_SESSION['about']=="forgot_password")
												echo 'href="forgot_password.php"';
										?>
										>Back</a></li>
					<li class="list"><a href="contact.php">Contact</a></li>
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
		<div class="box" style="padding:50px;margin-left:auto;margin-right:auto;margin-top:50px;margin-down:50px;;background-color:#000009;min-height:100px">
			<p style="color:#99CC00">We have been pioneers in delivering of flowers <i><span style="color:#ffffff">since 2001</span></i>.
			We have the widest network which covers all cities, towns and villages. 
			Whenever and whatever flower you wish to gift your near and dear ones on a special occasion think of <span style="color:#ffcc00;font-family:edwardian_script;font-size:40px">Petals</span> for an effective solution. 
			An Online Shopping Mall for Flowers.We provide you with an opportunity to send flowers of all types to anywhere <i><span style="color:#ffffff">all over India!!!</span></i>
			</p>
		</div>
		<div class="marker" style="background-color:#99cc00">
		</div>
	</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
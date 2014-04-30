<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Landing Page-->
<?php
	session_start();
	if(isset($_SESSION['email']))
		header('location: home.php');
	$_SESSION['about']="index";
	$_SESSION['contact']="index";
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<style>
			img:hover
			{
				opacity:0.4;
			}
			@font-face
			{
				font-family: edwardian_script;
				src: url(itcedscr.ttf);
			}
			.back
			{
				font-family:edwardian_script;
				border-style:solid;
				border-width:10px;
				border-color:#99cc00;
				border-radius:10px;
				width:720px;
				height:405px;
				background:url(images/main.jpg);
				background-repeat:no-repeat;
				background-size:100% 100%;
			}
		</style>
		<title>
			Petals Flower Store: Landing Page
		</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="formsheet.css"/>
		<link rel="stylesheet" type="text/css" href="navigationsheet.css"/>
		<meta name="keywords" content="flower, store,petals">
		<meta name="description" content="Project for Internshala VTC">
		<meta name="author" content="Sudhanshu Malik">
	</head>
	<body>
		<div class="center" style="min-height:1105px;">
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
			<div class="box" style="padding:20px;margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;width:740px;height:945px;background-color:#ffffff;border-radius:20px">
				<div class="back">
					<p style="margin:150px 0px;line-height:70px;font-size:30px;color:#000000;"><span style="font-size:70px;">Flowers</span>...for those</br>
					<span style="font-weight:bold;color:#99cc00;font-size:120px;">Special</span></br>
					<span style="font-size:80px;">Occasions...</span>
					</p>
				</div>
				<div>
				<video id="movie" style="border-style:solid;border-width:5px;border-color:#99cc00;border-radius:10px;margin:30px 0px 0px 5px;float:left" width="360px" height="200px" controls autoplay>
					<source src="movie.mp4" type="video/mp4">
					<source src="movie.flv" type="video/flv">
					Your browser does not support the format of this video!!!
				</video>
				</div>
				<div>
					<a href="login.php"><img id="one" style="margin:30px 0px 0px 20px;float:left" src="images/1.jpg" alt="Flower 1" width="160px" height="180px"/></a>
				</div>
				<div>
					<a href="login.php"><img id="two" style="margin:30px 0px 0px 25px;" src="images/2.jpg" alt="Flower 2" width="160px" height="180px"/></a>
				</div>
				<div class="footer" style="border-style:dotted;border-width:2px 0px 0px 0px;border-color:#99cc00;line-height:0px;text-align:left;margin:0px 0px 0px 385px;width:345px;float:left">
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.500&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.600</p>
				</div>
				<div>
					<div style="width:360px;height:200px;border-style:solid;border-width:5px;border-color:#99cc00;border-radius:10px;margin:20px 0px 0px 5px;float:left;background:url(images/main1.jpg);background-repeat:no-repeat;background-size:100% 100%;">
						<center>
							<div style="padding:5px;opacity:0.7;height:170px;width:340px;background-color:#ffffff;margin:10px auto;">
								<p style="line-height:20px;color:#000000;font-weight:bold">Sending flowers online is the perfect way to give a last-minute gift or commemorate a special occasion across the miles. Our FTD and Teleflora flowers range from tropical flower arrangements to funeral flowers to flowers for men, and are hand-delivered with care and accuracy by REAL florists.</p>
							</div>
						</center>
					</div>
					<div>
						<a href="login.php"><img id="three" style="margin:20px 0px 0px 20px;float:left" src="images/3.jpg" alt="Flower 3" width="160px" height="180px"/></a>
					</div>
					<div>
						<a href="login.php"><img id="four" style="margin:20px 0px 0px 25px;float:left" src="images/4.jpg" alt="Flower 4" width="160px" height="180px"/></a>
					</div>
				</div>
				<div class="footer" style="border-style:dotted;border-width:2px 0px 0px 0px;border-color:#99cc00;line-height:0px;text-align:left;margin:0px 0px 0px 385px;width:345px;float:left">
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.700&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.200</p>
				</div>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Home Page-->
<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		$_SESSION['contact']="home";
	}
	else
	{
		header('location: login.php');
	}
	if(isset($_SESSION['security_question']))
	{
		;
	}
	else
	{
		header('location: security_question.php');
	}
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
				if($_SESSION['pop_up']=="sign_up_success")
				{
					echo 'alert("Welcome..\nYour Account Has Been Created!!!");';
					$_SESSION['pop_up']="fail";
				}
				else if($_SESSION['pop_up']=="login_success")
				{
					echo 'alert("Welcome..\nYou Have Been Logged In Now!!!");';
					$_SESSION['pop_up']="fail";
				}
			}
			?>
		</script>
		<style>
			div.img
			{
				opacity:1.0;
				border-width:1px;
				border-color:#ffcc00;
				border-top-style:hidden;
				border-right-style:solid;
				border-bottom-style:hidden;
				border-left-style:hidden;
				height: auto;
				width: auto;
				float: left;
				text-align: center;
			}
			span{color:#ffcc00;}
			span:hover{color:#000000;}
			div.img:hover
			{
				color:#000000;
				opacity:0.4;
			}	
		</style>
		<title>
			Petals Flower Store: Home Page
		</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="formsheet.css"/>
		<link rel="stylesheet" type="text/css" href="navigationsheet.css"/>
		<meta name="keywords" content="flower, store,petals">
		<meta name="description" content="Project for Internshala VTC">
		<meta name="author" content="Sudhanshu Malik">
	</head>
	<body>
		<div class="center" style="min-height:1000px;">
			<div class="fixed">
				<?php include 'canvas.php'; ?>
				<div style="position:absolute;right:0px">
					<ul>
						<li class="list"><a href="contact.php">Contact</a></li>
						<li class="list"><a href="settings.php">Settings</a></li>
						<li class="list"><a href="logout.php">LogOut</a></li>
						<li class="list"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
			</div>
			<div class="box" style="margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;border-radius:15px;width:805px;min-height:800px">
				<form action="confirm.php" method="post">
					<div class="img" title="The Beautiful Yellow">
						<img src="images/1.jpg" alt="Flower 1" width="200" height="200"/>
						<div>#1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.500<br>
							<span><input type="checkbox" name="flower[]" value="1">Add!</span>
						</div>
					</div>
					<div class="img" title="The Pinky!!">
						<img src="images/2.jpg" alt="Flower 2" width="200" height="200"/>
						<div>#2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.600<br>
							<span><input type="checkbox" name="flower[]" value="2">Add!</span>
						</div>
					</div>
					<div class="img" title="Red=Love!!">
						<img src="images/3.jpg" alt="Flower 3" width="200" height="200"/>
						<div>#3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.700<br>
							<span><input type="checkbox" name="flower[]" value="3">Add!</span>
						</div>
					</div>
					<div class="img" style="border-style:hidden" title="The White Beauty">
						<img src="images/4.jpg" alt="Flower 4" width="200" height="200"/>
						<div>#4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.200<br>
							<span><input type="checkbox" name="flower[]" value="4">Add!</span>
						</div>
					</div>
					<div class="marker" style="background-color:#ffffff;width:800px">
					</div>
					<hr>
					<div class="img" title="Pink Rose Bouquet">
						<img src="images/5.jpg" alt="Flower 5" width="200" height="200"/>
						<div>#5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.100<br>
							<span><input type="checkbox" name="flower[]" value="5">Add!</span>
						</div>
					</div>
					<div class="img" title="Red Rose Bouquet">
						<img src="images/6.jpg" alt="Flower 6" width="200" height="200"/>
						<div>#6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.100<br>
							<span><input type="checkbox" name="flower[]" value="6">Add!</span>
						</div>
					</div>
					<div class="img" title="Pink Roses">
						<img src="images/7.jpg" alt="Flower 7" width="200" height="200"/>
						<div>#7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.1000<br>
							<span><input type="checkbox" name="flower[]" value="7">Add!</span>
						</div>
					</div>
					<div class="img" style="border-style:hidden" title="Yellow Roses">
						<img src="images/8.jpg" alt="Flower 8" width="200" height="200"/>
						<div>#8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.750<br>
							<span><input type="checkbox" name="flower[]" value="8">Add!</span>
						</div>
					</div>
					<div class="marker" style="background-color:#ffffff;width:800px">
					</div>
					<hr>
					<div class="img" title="Multicolour Roses">
						<img src="images/9.jpg" alt="Flower 9" width="200" height="200"/>
						<div>#9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.870<br>
							<span><input type="checkbox" name="flower[]" value="9">Add!</span>
						</div>
					</div>
					<div class="img" title="The Vine Magic">
						<img src="images/10.jpg" alt="Flower 10" width="200" height="200"/>
						<div>#10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.1100<br>
							<span><input type="checkbox" name="flower[]" value="10">Add!</span>
						</div>
					</div>
					<div class="img" title="Small Red Rose Bouquet">
						<img src="images/11.jpg" alt="Flower 11" width="200" height="200"/>
						<div>#11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.250<br>
							<span><input type="checkbox" name="flower[]" value="11">Add!</span>
						</div>
					</div>
					<div class="img" style="border-style:hidden" title="Large Red Rose Bouquet">
						<img src="images/12.jpg" alt="Flower 12" width="200" height="200"/>
						<div>#12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.320<br>
							<span><input type="checkbox" name="flower[]" value="12">Add!</span>
						</div>
					</div>
					<div class="marker" style="background-color:#ffffff;width:800px">
					</div>
					<center>
						<input type="submit" value="Buy Now!">
					</center>
					<div class="marker" style="background-color:#ffffff;width:800px">
					</div>
				</form>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
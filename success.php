<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Success Page-->
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
		$_SESSION['contact']="success";
		$con = mysql_connect("localhost","root","");
		mysql_select_db("my_db");
		foreach ($_POST['item'] as $value)
		{
			$result=mysql_query("SELECT fid,price FROM flower");
			$row = mysql_fetch_row($result);
			while($row)
			{
				if($row[0]==$value)
				{
					$price[]=$row[1];
				}
				$row = mysql_fetch_row($result);
			}
		}
		$total=0;
		$increment=-1;
		foreach ($_POST['quantity'] as $value)
		{
			$increment++;
			$total=$total+($value*$price[$increment]);
		}
		$to = $_SESSION['email'];
		$subject = "Order Details";
		$message = "Your order is placed at 'Petals'.\nOrder Placed at: ".$_POST['date']."\nYou have to pay Rs.".$total." on delivery.\nThanks!!";
		$from = "~Petals~";
		$header = "From:" . $from;
		mail($to,$subject,$message,$header);
	
		$to = "sudm0123@yahoo.com";
		$subject = "New Order Details";
		$flower="Following flowers has been ordered:\n";
		foreach ($_POST['item'] as $value)
		{
			$flower=$flower."Item #".$value."\n";
		}
		$flower=$flower."and their quantity respectively are:\n";
		foreach ($_POST['quantity'] as $value)
		{
			$flower=$flower."Quantity:".$value."\n";
		}
		$message =$flower."Customr Details:\nName: ".$_SESSION['username']."\nE-mail Id: ".$_SESSION['email']."\nOrder Placed at: ".$_POST['date']."\nThanks!!";
		$from = "~Petals~";
		$header = "From:" . $from;
		mail($to,$subject,$message,$header);
		mysql_close($con);
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
		<style>
			@font-face
			{
				font-family: edwardian_script;
				src: url(itcedscr.ttf);
			}
			p{text-align:center;line-height:200%;letter-spacing:3px;font-size:16px;}
			a.text:link {color:#ffffff;}
			a.text:visited {color:#ffffff;}
			a.text:hover {color:#ffcc00;}
		</style>
		<title>Petals Flower Store: Success Page</title>
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
						<li class="list"><a href="settings.php">Settings</a></li>
						<li class="list"><a href="logout.php">LogOut</a></li>
						<li class="list"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
			</div>
			<div class="box" style="padding:50px;background-color:#000009;margin-left:auto;margin-right:auto;margin-top:100px;margin-down:100px;;min-height:100px">
				<p style="color:#99CC00"><span style="font-variant:small-caps;">Thank you for ordering from</span> <span style="color:#ffcc00;font-family:edwardian_script;font-size:40px">Petals</span>.</br>
				<span style="font-variant:small-caps;">Check your mail for order details.</br>The flowers shall be delivered to you shortly.</br>
				Order some more flowers <a class="text" href="home.php" style="text-decoration:none;">here.</a></span></p>
			</div>
			<div class="marker" style="background-color:#99cc00">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
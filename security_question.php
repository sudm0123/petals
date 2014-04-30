<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Security Question Page-->
<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		;
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
			if(isset($_SESSION['pop_up1']))
			{
				if($_SESSION['pop_up1']=="format_error")
				{
					echo 'alert("Please Re-Enter Your Security Answer !!!");';
					$_SESSION['pop_up1']="fail";
				}
				else
				{
					;
				}
			}
			?>
		</script>
		<title>Petals Flower Store: Security Question</title>
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
			<div class="box" style="margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;">
				<center>
					<div style="width:550px;background-color:#000009;border-radius:100px;height:40px">
						<h1 style="color:#99CC00">Security Question</h1>
					</div>
				</center>
				<div class="marker" style="min-height:30px;width:300px;background-color:#ffffff">
				</div>
				<form name="settings" action="security_question_script.php" method="post">
					<center>
						<table>
							<tr>
								<td style="font-size:18px;color:#CCA300;text-align:center">Where were you when you had your first kiss?</td>
							</tr>
							<tr>
								<td><input type="text" name="security_answer" style="width:200px;" required="true" placeholder="Your Answer !!"></td>
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
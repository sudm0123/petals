<!--Created by: SUDHANSHU MALIK-->
<!--Project for "Internshala VTC"-->
<!--This is the Confirmation Page-->
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
	if($_POST['flower'] && isset($_SESSION['email']))
	{
		$_SESSION['contact']="confirm";
	}
	else
	{
		header('location: home.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="alert.js">
		</script>
		<style>
			h1{text-align:center;letter-spacing:2px;text-transform:uppercase;font-family:"Times New Roman", Times, serif;}
			p{text-align:center;font-size:16px;}
			table{border-collapse:collapse;}
			th{background-color:#ffcc00;border:1px solid #CCA300;padding:12px;text-align:center;}
			td{background-color:#FFE066;border:1px solid #CCA300;padding:12px;text-align:center;}
			input[type="number"],input[type="text"]{font-size:16px;background-color:#FFE066;border:1px solid #CCA300;padding:0px;text-align:center;font-family:"Comic Sans MS", cursive, sans-serif;}
		</style>
		<title>Petals Flower Store: Confirmation Page</title>
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
		<div class="box" style="margin-left:auto;margin-right:auto;margin-top:20px;margin-down:20px;min-height:100px">
			<center>
				<div style="border-radius:100px;width:550px;background-color:#000009;height:40px">
					<h1 style="color:#99CC00">Your Order</h1>
				</div>
			</center>
			<p>Please confirm that you wish to order the following items.</p>
			<center>
				<form name="confirm" action="success.php" method="post" oninput="<?php
																			$arrlength=count($_POST['flower']);
																			foreach ($_POST['flower'] as $value)
																			{
																				echo "x".$value.".value=parseInt(a".$value.".value)*parseInt(b".$value.".value),";
																			}
																			echo "y.value=";
																			foreach ($_POST['flower'] as $value)
																			{
																				if($arrlength==1)
																				{
																					echo "parseInt(x".$value.".value)";
																				}
																				else
																				{
																					echo "parseInt(x".$value.".value)+";
																				}
																				$arrlength--;
																			}
																			?>">
																			<?php
																				foreach ($_POST['flower'] as $value)
																				{
																					echo '<input type="hidden" name="item[]" value="'.$value.'">';
																				}
																			?>
																			<script>
																					var d=new Date();
																					document.write('<input type="hidden" name="date" value="'+d+'">');
																			</script>
					<table border="0" cellpadding="5px" cellspacing="0">
						<tr>
							<th>Item Number</th>
							<th>Cost</th>
							<th>Quantity</th>
							<th>Total Cost</th>
						</tr>
						<?php
							$con = mysql_connect("localhost","root","");
							mysql_select_db("my_db");
							foreach ($_POST['flower'] as $value)
							{
								echo "<tr>";
									echo "<td>#".$value."</td>";
									$result=mysql_query("SELECT fid,price FROM flower");
									$row = mysql_fetch_row($result);
									while($row)
									{
										if($value==$row[0])
										{
											echo '<td><input type="text" id="a'.$value.'" value="'.$row[1].'" style="background-color:#FFE066;border:0;width:100px;"></td>';
											echo '<td><input type="number" id="b'.$value.'" name="quantity[]" min="1" max="5"></td>';
											echo '<td><output name="x'.$value.'"></output></td>';
										}
										$row = mysql_fetch_row($result);
									}
								echo "</tr>";
							}
							mysql_close($con);
						?>
						<tr>
							<td style="background-color:#ffcc00;" colspan="3">Total</td>
							<td style="background-color:#ffcc00;"><output name="y"></output></td>
						</tr>
					</table>
					<div class="marker" style="min-height:10px;width:300px;background-color:#ffffff">
					</div>
					<input type="submit" value="Confirm!">
				</form>
				<div class="marker" style="min-height:10px;width:300px;background-color:#ffffff">
				</div>
			</center>
		</div>
		<div class="marker" style="background-color:#99cc00">
		</div>
	</div>
	<?php include 'footer.php'; ?>
	</body>
</html>
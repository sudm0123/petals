<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("my_db");
	session_start();
	$q_email=stripslashes(trim($_POST['email']));
	$q_email=mysql_real_escape_string($q_email);
	$q_email=strip_tags($q_email);
	$security_answer_trimmed=stripslashes(trim($_POST['security_answer']));
	$security_answer_trimmed=mysql_real_escape_string($security_answer_trimmed);
	$security_answer_trimmed=strip_tags($security_answer_trimmed);
	$security_answer_hashed=md5($security_answer_trimmed);
	$regex_txt="/^[ A-Za-z]+$/";
	$regex_email= "/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/";
	$result=mysql_query("SELECT email FROM persons");
	$row = mysql_fetch_row($result);
	$check=0;
	while($row)
	{
		if($q_email==$row[0])
		{
			$check=1;
		}
		$row = mysql_fetch_row($result);
	}
	$result1=mysql_query("SELECT email,answer,yn FROM persons");
	$row1 = mysql_fetch_row($result1);
	$check1=0;
	while($row1)
	{
		if($q_email==$row1[0])
		{
			if($row1[2]=="n")
				$check1=1;
			else
			{
				if($security_answer_hashed==$row1[1])
					$check1=2;
				else
					$check1=3;
			}
		}
		$row1 = mysql_fetch_row($result1);
	}
	if(preg_match($regex_txt,$security_answer_trimmed)==false)
	{
		$_SESSION['pop_up2']="format_error";
		header('location: forgot_password.php');
	}
	else if(preg_match($regex_email,$q_email)==false)
	{
		$_SESSION['pop_up2']="email_error";
		header('location: forgot_password.php');
	}
	else if($check==0)
	{
		$_SESSION['pop_up2']="no_email";
		header('location: forgot_password.php');
	}
	else if($check1==1)
	{
		$_SESSION['pop_up2']="security_question_error";
		header('location: forgot_password.php');
	}
	else if($check1==3)
	{
		$_SESSION['pop_up2']="wrong_answer_error";
		header('location: forgot_password.php');
	}
	else
	{
		$p=substr(md5(uniqid(rand(),1)),3,10);
		$p_hashed=md5($p);
		mysql_query("UPDATE persons SET password='$p_hashed' WHERE email='$_SESSION[email]'");
		$_SESSION['pop_up']="forgot_password_success";
		$to = $_SESSION['email'];
		$subject = "New Password";
		$message = "Your New Password is: ".$p."\nPlease Log-In Using This Password.\nAnd Change Your Password After Log-In !!!";
		$from = "~Petals~";
		$header = "From:" . $from;
		mail($to,$subject,$message,$header);
		header('location: login.php');
	}
	mysql_close($con);
?>
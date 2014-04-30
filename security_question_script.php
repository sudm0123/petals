<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("my_db");
	session_start();
	$security_answer_trimmed=stripslashes(trim($_POST['security_answer']));
	$security_answer_trimmed=mysql_real_escape_string($security_answer_trimmed);
	$security_answer_trimmed=strip_tags($security_answer_trimmed);
	$security_answer_hashed=md5($security_answer_trimmed);
	$regex_txt="/^[ A-Za-z]+$/";
	if(preg_match($regex_txt,$security_answer_trimmed)==false)
	{
		$_SESSION['pop_up1']="format_error";
		header('location: security_question.php');
	}
	else
	{
		mysql_query("UPDATE persons SET answer='$security_answer_hashed' WHERE email='$_SESSION[email]'");
		mysql_query("UPDATE persons SET yn='y' WHERE email='$_SESSION[email]'");
		$_SESSION['security_question']="success";
		header('location: home.php');
	}
	mysql_close($con);
?>
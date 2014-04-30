<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("my_db");
	session_start();
	$q_old_password=stripslashes(trim($_POST['old_password']));$q_old_password=mysql_real_escape_string($q_old_password);$q_old_password=strip_tags($q_old_password);
	$q_old_password_hashed=md5($q_old_password);
	$q_new_password=stripslashes(trim($_POST['new_password']));$q_new_password=mysql_real_escape_string($q_new_password);$q_new_password=strip_tags($q_new_password);
	$q_new_password_hashed=md5($q_new_password);
	$q_retype_new_password=stripslashes(trim($_POST['retype_new_password']));$q_retype_new_password=mysql_real_escape_string($q_retype_new_password);$q_retype_new_password=strip_tags($q_retype_new_password);
	$q_retype_new_password_hashed=md5($q_retype_new_password);
	$result=mysql_query("SELECT email,password FROM persons");
	$row = mysql_fetch_row($result);
	$check=0;
	while($row)
	{
		if($_SESSION['email']==$row[0])
		{
			if($q_old_password_hashed==$row[1])
			{
				$check=1;
			}
		}
		$row = mysql_fetch_row($result);
	}
	$result1=mysql_query("SELECT name FROM persons");
	$row1 = mysql_fetch_row($result1);
	$check1=0;
	while($row1)
	{
		if($q_new_password==$row1[0])
		{
				$check1=1;
		}
		$row1 = mysql_fetch_row($result);
	}
	$password1_length = strlen($q_new_password);
	$password2_length = strlen($q_retype_new_password);
	$password3_length = strlen($q_old_password);
	if($check==0)
	{
		$_SESSION['setting_pop_up']="password_error";
		header('location: settings.php');
	}
	else if(($password1_length < 8)||($password2_length < 8)||($password3_length < 8))
	{
		$_SESSION['setting_pop_up']="password_length_error";
		header('location: settings.php');
	}
	else if(preg_match('%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{8,}\z%',$q_old_password)==false)
	{
		$_SESSION['setting_pop_up']="password_format_error";
		header('location: settings.php');
	}
	else if(preg_match('%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{8,}\z%',$q_new_password)==false)
	{
		$_SESSION['setting_pop_up']="password_format_error";
		header('location: settings.php');
	}
	else if(preg_match('%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{8,}\z%',$q_retype_new_password)==false)
	{
		$_SESSION['setting_pop_up']="password_format_error";
		header('location: settings.php');
	}
	else if($check1==1)
	{
		$_SESSION['setting_pop_up']="name_password_same_error";
		header('location: settings.php');
	}
	else if($q_new_password==$q_retype_new_password)
	{
		mysql_query("UPDATE persons SET password='$q_new_password_hashed' WHERE email='$_SESSION[email]'");
		$_SESSION['setting_pop_up']="password_match";
		header('location: settings.php');
	}
	else
	{
		$_SESSION['setting_pop_up']="password_match_error";
		header('location: settings.php');
	}
	mysql_close($con);
?>
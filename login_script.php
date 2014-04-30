<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("my_db");
	session_start();
		$q_login_email=stripslashes(trim($_POST['login_email']));$q_login_email=mysql_real_escape_string($q_login_email);$q_login_email=strip_tags($q_login_email);
		$q_login_password=stripslashes(trim($_POST['login_password']));$q_login_password=mysql_real_escape_string($q_login_password);$q_login_password=strip_tags($q_login_password);
		$q_login_password_hashed=md5($q_login_password);
	$regex_email= "/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/";
	$result=mysql_query("SELECT email,password FROM persons");
	$row = mysql_fetch_row($result);
	$check1=0;
	while($row)
	{
		if($q_login_email==$row[0])
		{
			$check1=1;
		}
		$row = mysql_fetch_row($result);
	}
	$result=mysql_query("SELECT name,email,password FROM persons");
	$row = mysql_fetch_row($result);
	$check2=0;
	while($row)
	{
		if(($q_login_email==$row[1])&&($q_login_password_hashed==$row[2]))
		{
			// store session data
			$_SESSION['username'] = $row[0];
			$_SESSION['email'] = $q_login_email;
			$_SESSION['pop_up']="login_success";
			$result_question=mysql_query("SELECT email,yn FROM persons");
			$row_question=mysql_fetch_row($result_question);
			$question_value='n';
			while($row_question)
			{
				if($q_login_email==$row_question[0])
				{
					$question_value=$row_question[1];
				}
				$row_question = mysql_fetch_row($result_question);
			}
			$check2=1;
			if($question_value=='y')
			{
				$_SESSION['security_question']="success";
				header('location: home.php');
			}
			else
			{
				header('location: security_question.php');
			}
		}
		$row = mysql_fetch_row($result);
	}
	if(preg_match($regex_email,$q_login_email)==false)
	{
		$_SESSION['pop_up']="login_fail";
		header('location: login.php');
	}
	else if(filter_var($q_login_email, FILTER_VALIDATE_EMAIL)==false)
	{
		$_SESSION['pop_up']="login_fail";
		header('location: login.php');
	}
	else if($check1==0)
	{
		$_SESSION['pop_up']="no_account";
		header('location: login.php');
	}
	else if(preg_match('%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{8,}\z%',$q_login_password)==false)
	{
		$_SESSION['pop_up']="login_fail";
		header('location: login.php');
	}
	else if($check2==0)
	{
		$_SESSION['pop_up']="login_fail";
		header('location: login.php');
	}
	mysql_close($con);
?>
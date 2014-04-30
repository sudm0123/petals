<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("my_db");
	session_start();
		$q_fullname=stripslashes(trim($_POST['fullname']));$q_fullname=mysql_real_escape_string($q_fullname);$q_fullname=strip_tags($q_fullname);
		$q_signup_email=stripslashes(trim($_POST['signup_email']));$q_signup_email=mysql_real_escape_string($q_signup_email);$q_signup_email=strip_tags($q_signup_email);
		$q_signup_password=stripslashes(trim($_POST['signup_password']));$q_signup_password=mysql_real_escape_string($q_signup_password);$q_signup_password=strip_tags($q_signup_password);
		$q_signup_password_hashed=md5($q_signup_password);
		$q_contact=stripslashes(trim($_POST['contact']));$q_contact=mysql_real_escape_string($q_contact);$q_contact=strip_tags($q_contact);
		$q_dob=stripslashes(trim($_POST['dob']));$q_dob=mysql_real_escape_string($q_dob);$q_dob=strip_tags($q_dob);
		$q_sex=stripslashes(trim($_POST['sex']));$q_sex=mysql_real_escape_string($q_sex);$q_sex=strip_tags($q_sex);
		$q_address=stripslashes(trim($_POST['address']));$q_address=mysql_real_escape_string($q_address);$q_address=strip_tags($q_address);
		$q_city=stripslashes(trim($_POST['city']));$q_city=mysql_real_escape_string($q_city);$q_city=strip_tags($q_city);
	$result=mysql_query("SELECT email,password FROM persons");
	$row = mysql_fetch_row($result);
	$check=0;
	$password_length=strlen($q_signup_password);
	$regex_txt="/^[ A-Za-z]+$/";
	$regex_mobile= "/^[789][0-9]{9}$/";
	$regex_email= "/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/";
	/*require_once('recaptchalib.php');
	$privatekey = "your_private_key";
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification
  }*/
	while($row)
	{
		if($q_signup_email==$row[0])
		{
			$check=1;
		}
		$row = mysql_fetch_row($result);
	}
	if(preg_match($regex_txt,$q_fullname)==false)
	{
		$_SESSION['pop_up']="name_error";
		header('location: login.php');
	}
	else if(preg_match($regex_email,$q_signup_email)==false)
	{
		$_SESSION['pop_up']="email_error";
		header('location: login.php');
	}
	else if(filter_var($q_signup_email, FILTER_VALIDATE_EMAIL)==false)
	{
		$_SESSION['pop_up']="email_error";
		header('location: login.php');
	}
	else if($q_fullname==$q_signup_password)
	{
		$_SESSION['pop_up']="name_password_same_error";
		header('location: login.php');
	}
	else if($password_length<8)
	{
		$_SESSION['pop_up']="password_length";
		header('location: login.php');
	}
	else if(preg_match('%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{8,}\z%',$q_signup_password)==false)
	{
		$_SESSION['pop_up']="password_format_error";
		header('location: login.php');
	}
	else if(preg_match($regex_mobile,$q_contact)==false)
	{
		$_SESSION['pop_up']="contact_error";
		header('location: login.php');
	}
	else if(preg_match($regex_txt,$q_city)==false)
	{
		$_SESSION['pop_up']="city_error";
		header('location: login.php');
	}
	else if($check==1)
	{
		$_SESSION['pop_up']="sign_up_fail";
		header('location: login.php');
	}
	else
	{
		mysql_query("INSERT INTO persons(name,dob,gender,email,password,address,city,contact,answer,yn)
	VALUES('$q_fullname','$q_dob','$q_sex','$q_signup_email','$q_signup_password_hashed','$q_address','$q_city','$q_contact','lol','n');");
	// store session data
	$_SESSION['username'] = $q_fullname;
	$_SESSION['email'] = $q_signup_email;
	$_SESSION['pop_up']="sign_up_success";
	header('location: security_question.php');
	}
	mysql_close($con);
?>
<?php
	session_start();
	include('lib/dbh.php');


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
    $firstname=check_input($_POST['firstname']);
    $lastname=check_input($_POST['lastname']);
    $gender=check_input($_POST['gender']);
    $contact=check_input($_POST['contact']);
    $county=check_input($_POST['county']);
	$email=check_input($_POST['email']);
	$password=md5(check_input($_POST['password']));

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['sign_msg'] = "Invalid email format";
  		header('location:signup.php');
	}

	else{

		$query=mysqli_query($conn,"select * from users where email='$email'");
		if(mysqli_num_rows($query)>0){
			$_SESSION['sign_msg'] = "Email already taken";
  			header('location:signup.php');
		}
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

		mysqli_query($conn,"insert into users (firstname,lastname,gender,contact,county,email, password, code) values ('$firstname','$lastname','$gender','$contact','$county','$email', '$password', '$code')");
		$uid=mysqli_insert_id($conn);
		//default value for our verify is 0, means it is unverified

		//sending email verification
		$to = $email;
			$subject = "cybermaisha Verification Code";
			$message = "
				<html>
				<head>
				<title>Cybermaisha Account Verification</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Your Account Login Details:</p>
				<p>Email: ".$email."</p>
				<p>Password: ".$_POST['password']."</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='https://www.survey.cybermaisha.co.ke/activate.php?uid=$uid&code=$code'>Activate My Account</h4>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: admin@cybermaisha.co.ke". "\r\n" .
						"CC:accounts@cybermaisha.co.ke";

		mail($to,$subject,$message,$headers);

		$_SESSION['sign_msg'] = "Verification code sent to your email.";
  		header('location:signup.php');

  		}
	}
	}
?>

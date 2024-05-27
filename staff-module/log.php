<?php
session_start();
include('lib/dbh.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}

		$email=check_input($_POST['email']);
		$password=md5(check_input($_POST['password']));

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$_SESSION['log_msg'] = "Invalid email format";
  			header('location:login.php');
		}
		else{
			$query=mysqli_query($conn,"select * from staff where email='$email' and password='$password'");
			if(mysqli_num_rows($query)==0){
				$_SESSION['log_msg'] = "User not found or Wrong password";
  				header('location:login.php');
			}
			else{
				$row=mysqli_fetch_array($query);
				if($row['verify']==0){
					$_SESSION['log_msg'] = "staff not verified. Please activate account";
  					header('location:login.php');
				}
				else{
					$_SESSION['staff_id']=$row['id'];
					$_SESSION['staff_firstname']=$row['firstname'];
					$_SESSION['staff_middlename']=$row['middlename'];
					$_SESSION['staff_lastname']=$row['lastname'];
					$_SESSION['staff_gender']=$row['gender'];
					$_SESSION['staff_contact']=$row['contact'];
					$_SESSION['staff_county']=$row['county'];
					$_SESSION['staff_email']=$row['email'];
					$uip=$_SERVER['REMOTE_ADDR'];
					$uid=$row['email'];
			        $log =mysqli_query($conn,"INSERT INTO stafflog (staff,ip)VALUES('$uid','$uip')");
					header('location:index.php?page=home'); 
				}
			}
		}

	}
?>
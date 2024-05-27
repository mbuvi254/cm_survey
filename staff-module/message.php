<?php
session_start();
if(!empty($_POST["send"])) {
	$name = $_SESSION['staff_name'];
	$email = $_SESSION['staff_email'];
	$subject = $_POST["subject"];
	$content = $_POST["message"];

	$toEmail = "info@cybermaisha.co.ke";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once "contact.php";
?>
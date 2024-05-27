<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$conn = mysqli_connect("localhost", "cyberma1_mbuvi", "1994410Mbuvi@", "cyberma1_survey") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO user_message (user_name, user_email,subject,content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
	$insert_id = mysqli_insert_id($conn);
	//if(!empty($insert_id)) {
	   $message = "Your Message Sent successfully.";
	   $type = "success";
	//}
}
require_once "contact-view.php";
?>
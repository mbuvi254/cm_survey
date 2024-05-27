<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'save_ufield'){
	$save = $crud->save_ufield();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_page_img'){
	$save = $crud->save_page_img();
	if($save)
		echo $save;
}

if($action == "save_answer"){
	$save = $crud->save_answer();
	if($save)
		echo $save;
}
if($action == "field_answer"){
	$save = $crud->field_answer();
	if($save)
		echo $save;
}
if($action == "update_user"){
	$save = $crud->update_user();
	if($save)
		echo $save;
}

ob_end_flush();
?>

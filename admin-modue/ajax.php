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
if($action == 'save_county'){
	$save = $crud->save_county();
	if($save)
		echo $save;
}
if($action == 'delete_county'){
	$save = $crud->delete_county();
	if($save)
		echo $save;
}
if($action == 'save_admin'){
	$save = $crud->save_admin();
	if($save)
		echo $save;
}
if($action == 'delete_admin'){
	$save = $crud->delete_admin();
	if($save)
		echo $save;
}
if($action == 'save_staff'){
	$save = $crud->save_staff();
	if($save)
		echo $save;
}
if($action == 'delete_staff'){
	$save = $crud->delete_staff();
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
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == "save_survey"){
	$save = $crud->save_survey();
	if($save)
		echo $save;
}
if($action == "delete_survey"){
	$delete = $crud->delete_survey();
	if($delete)
		echo $delete;
}
if($action == "save_question"){
	$save = $crud->save_question();
	if($save)
		echo $save;
}
if($action == "delete_question"){
	$delsete = $crud->delete_question();
	if($delsete)
		echo $delsete;
}

if($action == "action_update_qsort"){
	$save = $crud->action_update_qsort();
	if($save)
		echo $save;
}
if($action == "save_answer"){
	$save = $crud->save_answer();
	if($save)
		echo $save;
}
if($action == "update_user"){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == "delete_field_user"){
	$delete = $crud->delete_field_user();
	if($delete)
		echo $delete;
}

ob_end_flush();
?>

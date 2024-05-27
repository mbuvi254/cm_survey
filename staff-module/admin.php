<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'lib/dbh.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff where email = '".$uid."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['staff_'.$key] = $value;
			}
			$uip=$_SERVER['REMOTE_ADDR'];
			$log = $this->db->query("INSERT INTO staffLog (staff,ip)VALUES('$uid','$uip')");
		 
		     return 1;

	}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function save_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM staff where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO staff set $data");
		}else{
			$save = $this->db->query("UPDATE staff set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	function update_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','table')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM staff where email ='$email' ".(!empty($id) ? " and id != {$_SESSION['staff_id']} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO staff set $data");
		}else{
			$save = $this->db->query("UPDATE staff set $data where id ={$_SESSION['staff_id']}");
		}

		if($save){
			foreach ($_POST as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			return 1;
		}
	}
	function save_ufield(){
		extract($_POST);
		$data = "";
		//$data .= ", staff_id='{$_SESSION['staff_id']}' ";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM field_users where contact ='$contact' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO field_users set $data");
		}else{
			$save = $this->db->query("UPDATE field_users set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}	
	function update_ufield(){
		extract($_POST);
		$data = "";
		$data .= ", staff_id='{$_SESSION['staff_id']}' ";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','table')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM field_user where email ='$email' ".(!empty($id) ? " and id != {$_SESSION['staff_id']} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO field_user set $data");
		}else{
			$save = $this->db->query("UPDATE field_user set $data where id ={$_SESSION['staff_id']}");
		}

		if($save){
			foreach ($_POST as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			return 1;
		}
	}




	function save_page_img(){
		extract($_POST);
		if($_FILES['img']['tmp_name'] != ''){
				$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
				if($move){
					$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
					$hostName = $_SERVER['HTTP_HOST'];
						$path =explode('/',$_SERVER['PHP_SELF']);
						$currentPath = '/'.$path[1]; 
   						 // $pathInfo = pathinfo($currentPath); 

					return json_encode(array('link'=>$protocol.'://'.$hostName.$currentPath.'/admin/assets/uploads/'.$fname));

				}
		}
	}

	function save_answer(){
		extract($_POST);
			foreach($qid as $k => $v){
				$data = " survey_id=$survey_id ";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", staff_id='{$_SESSION['staff_id']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='[".implode("],[",$answer[$k])."]' ";
				}else{
					$data .= ", answer='$answer[$k]' ";
				}
				$save[] = $this->db->query("INSERT INTO staff_answers set $data");
			}
					

		if(isset($save))
			return 1;
	}
		function field_answer(){
		extract($_POST);
			foreach($qid as $k => $v){
				$data = " survey_id=$survey_id ";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", user_id=$user_id";
				$data .= ", staff_id='{$_SESSION['staff_id']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='[".implode("],[",$answer[$k])."]' ";
				}else{
					$data .= ", answer='$answer[$k]' ";
				}
				$save[] = $this->db->query("INSERT INTO field_answers set $data");
			}
					

		if(isset($save))
			return 1;
	}
	
}
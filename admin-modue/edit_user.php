<?php
include './lib/dbh.php';
$qry = $conn->query("SELECT users.firstname,users.middlename,users.lastname,users.email,county.countyName,users.contact FROM users inner join county on users.county=county.id where users.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_user.php';
?>
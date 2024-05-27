<?php
include 'lib/dbh.php';
$qry = $conn->query("SELECT staff.firstname,staff.middlename,staff.lastname,staff.contact,staff.email,county.countyName FROM staff inner join county on staff.county=county.id where staff.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_staff.php';
?>
<?php
include './lib/dbh.php';
$qry = $conn->query("SELECT * FROM county where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	if($k == 'countyName')
		$k = 'countyName';
	$$k = $v;
}
include 'add_county.php';
?>
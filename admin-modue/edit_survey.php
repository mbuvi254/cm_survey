<?php
include './lib/dbh.php';
//$qry = $conn->query("SELECT * FROM survey where id = ".$_GET['id'])->fetch_array();
$qry=$conn->query("SELECT survey.id,survey.county, survey.title,survey.description,county.countyName,survey.start_date,survey.end_date FROM survey INNER JOIN county ON survey.county=county.id WHERE survey.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	if($k == 'title')
		$k = 'stitle';
	$$k = $v;
}
include 'add_survey.php';
?>
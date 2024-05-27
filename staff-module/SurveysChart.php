<?php
     //set timezone
	//date_default_timezone_set('Africa/Nairobi');
	$year = date('Y');
	$total=array();
	for ($month = 1; $month <= 12; $month ++){
		$sql="select *, count(DISTINCT survey_id,user_id) as total from field_answers where month(date_created)='$month' and year(date_created)='$year' and staff_id = {$_SESSION['staff_id']}";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$total[]=$row['total'];
	}

	$tjan = $total[0];
	$tfeb = $total[1];
	$tmar = $total[2];
	$tapr = $total[3];
	$tmay = $total[4];
	$tjun = $total[5];
	$tjul = $total[6];
	$taug = $total[7];
	$tsep = $total[8];
	$toct = $total[9];
	$tnov = $total[10];
	$tdec = $total[11];

	$pyear = $year - 1;
	$pnum=array();

	for ($pmonth = 1; $pmonth <= 12; $pmonth ++){
		$sql="select *, count(distinct survey_id,user_id) as ptotal from field_answers where month(date_created)='$pmonth' and year(date_created)='$pyear' and staff_id = {$_SESSION['staff_id']}";
		$pquery=$conn->query($sql);
		$prow=$pquery->fetch_array();

		$ptotal[]=$prow['ptotal'];
	}
	
	$pjan = $ptotal[0];
	$pfeb = $ptotal[1];
	$pmar = $ptotal[2];
	$papr = $ptotal[3];
	$pmay = $ptotal[4];
	$pjun = $ptotal[5];
	$pjul = $ptotal[6];
	$paug = $ptotal[7];
	$psep = $ptotal[8];
	$poct = $ptotal[9];
	$pnov = $ptotal[10];
	$pdec = $ptotal[11];
?>
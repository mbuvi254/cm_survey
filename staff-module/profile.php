<?php include 'lib/dbh.php' ?>
<?php
if(isset($_SESSION['staff_id'])){
$qry = $conn->query("SELECT *,concat(staff.lastname,', ',staff.firstname,' ',staff.middlename) as name ,staff.gender,staff.contact,staff.county,county.countyName,staff.email FROM staff inner Join county ON staff.county=county.id where staff.id = ".$_SESSION['staff_id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
	<div class="card card-primary">
		<div class="card-header">
		<h3>Staff Profile</h3>
		</div>
		<div class="card-body">
			<table class="table">
		<tr>
			<th>Name:</th>
			<td><b><?php echo ucwords($name) ?></b></td>
		</tr>
		<tr>
			<th>Gender:</th>
			<td><b><?php echo $gender ?></b></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><b><?php echo $email ?></b></td>
		</tr>
		<tr>
			<th>Contact:</th>
			<td><b><?php echo $contact ?></b></td>
		</tr>
		<tr>
			<th>County:</th>
			<td><b><?php echo $countyName ?></b></td>
		</tr>
		<tr>
			<th>Users Registered:</th>
			<td><b><?php echo $conn->query("SELECT * FROM field_users  where staff_id = {$_SESSION['staff_id']}")->num_rows; ?></b></td>
		</tr>
			<tr>
			<th>Surveys Conducted:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM field_answers  where staff_id = {$_SESSION['staff_id']}")->num_rows; ?></b></td>
		</tr>
		<tr>
			<th>Surveys Taken:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM staff_answers  where staff_id = {$_SESSION['staff_id']}")->num_rows; ?></b></td>
		</tr>
	</table>
</div>
	<a href="index.php?page=update_profile" class="btn btn-primary btn-flat btn-block btn-success btn-lg">Update Profile</a>
		</div>
	








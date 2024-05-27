<?php include 'lib/dbh.php' ?>
<?php
if(isset($_SESSION['user_id'])){
	$type_arr = array('',"Admin","Staff","Subscriber");
	$qry = $conn->query("SELECT *,concat(users.lastname,', ',users.firstname) as name ,users.contact,users.gender,users.county,county.countyName,users.email FROM users inner Join county ON users.county=county.id where users.id = ".$_SESSION['user_id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container py-2">
	<div class="card">
		<div class="card-header" style="background-color: #008000">
		<h3 class="text-light">Profile</h3>
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
			<th>Surveys Taken:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM answers  where user_id = {$_SESSION['user_id']}")->num_rows; ?></b></td>
		</tr>
	</table>
</div>
	<a href="index.php?page=update_profile" class="btn btn-primary btn-flat btn-block btn-success btn-lg">Update Profile</a>
		</div>
	</div>
</div>







<?php include './lib/dbh.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(users.lastname,', ',users.firstname,' ',users.middlename) as name,users.contact,county.countyName FROM users inner join county on  users.county=county.id where users.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<table class="table">
		<tr>
			<th>Name:</th>
			<td><b><?php echo ucwords($name) ?></b></td>
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
			<th>Address:</th>
			<td><b><?php echo $countyName ?></b></td>
		</tr>
		<tr>
			<th>Completed Surveys:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM answers  where user_id = {$_GET['id']}")->num_rows; ?></b></td>
		</tr>
	</table>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary btn-flat btn-block" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
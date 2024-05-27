<?php include './lib/dbh.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT *,concat(field_users.lastname,', ',field_users.firstname,' ',field_users.middlename) as name,county.countyName,field_users.contact FROM field_users inner join county on field_users.county=county.id where field_users.id = ".$_GET['id'])->fetch_array();
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
			<th>Contact:</th>
			<td><b><?php echo $contact ?></b></td>
		</tr>
		<tr>
			<th>County:</th>
			<td><b><?php echo $countyName ?></b></td>
		</tr>
		<tr>
			<th>Completed Surveys:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM field_answers  where user_id = {$_GET['id']}")->num_rows; ?></b></td>
		</tr>
	</table>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
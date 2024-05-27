<?php include 'lib/dbh.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff where id = ".$_GET['id'])->fetch_array();
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
			<th>County:</th>
			<td><b><?php echo $county ?></b></td>
		</tr>
		<tr>
			<th>Surveys Conducted:</th>
			<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM field_answers  where staff_id = {$id}")->num_rows; ?></b></td>
		</tr>
		<tr>
			<th>Registered Users:</th>
			<td><b><?php echo $conn->query("SELECT distinct(id) FROM field_users  where staff_id = {$id}")->num_rows; ?></b></td>
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
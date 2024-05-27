<?php include 'lib/dbh.php';?>
<div class="col-12" style="padding-top:2rem;">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Add User</h3>
</div>
<div class="card-body" style="padding:1rem;">
<form action="" id="manage_user">
<input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff_id'];?>">
<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
<div class="row">
<div class="col-md-12">
<b class="text-muted">User Data</b>
<div class="form-group">
<label for="" class="control-label">First Name</label>
<input type="text" name="firstname" class="form-control form-control" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
</div>
<div class="form-group">
<label for="" class="control-label">Middle Name</label>
<input type="text" name="middlename" class="form-control form-control"  value="<?php echo isset($middlename) ? $middlename : '' ?>">
</div>
<div class="form-group">
<label for="" class="control-label">Last Name</label>
<input type="text" name="lastname" class="form-control form-control" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
</div>
<div class="form-group">
<label for="" class="control-label">Gender</label>
<select class="form-control" id="gender" name="gender">
<option value="">Selcet your Gender</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
<option value="Trans-Gender">Trans Gender</option>
</select>
</div>
<div class="form-group">
<label for="" class="control-label">Contact No.</label>
<input type="text" name="contact" class="form-control form-control" required value="<?php echo isset($contact) ? $contact : '' ?>">
</div>
<div class="form-group">
<label>Select County</label>
<select name="county" id="county" class="form-control" required>
<option value="<?php echo isset($county) ? $county : '' ?>">County:<?php echo isset($county) ? $countyName : '' ?></option>
<?php $qry = $conn->query("SELECT * FROM county");
while($row= $qry->fetch_assoc()):?>
<option value="<?php echo $row['id'] ?>"><?php echo $row['countyName'] ?></option>
<?php endwhile?>
</select>
</div>
<hr>
<div class="card-footer">
<button class="btn btn-primary btn-block btn-flat">Add User</button>
<hr>
<button class="btn btn-secondary btn-block btn-flat" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
</div>
</div>
</form>
</div>
</div>
</div>
<script>
	$('#manage_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
	
		$.ajax({
			url:'ajax.php?action=save_ufield',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('User successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=user_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>User already exist.</div>");
					$('[name="contact"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>
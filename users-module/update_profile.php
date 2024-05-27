<?php
include 'lib/dbh.php';
$qry = $conn->query("SELECT users.id,users.firstname,users.lastname,users.contact,users.county,users.email,users.gender,county.countyName FROM users inner join county on users.county=county.id where users.id = ".$_SESSION['user_id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}?>
<div class="container py-2">
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<b class="text-muted">Personal Information</b>
						<div class="form-group">
							<label for="" class="control-label">First Name</label>
							<input type="text" name="firstname" class="form-control form-control" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Name</label>
							<input type="text" name="lastname" class="form-control form-control" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
						<div class="form-group">
						<label class="control-label">Gender</label>
		<select class="form-control" id="gender" name="gender">
		<option value="<?php echo isset($gender) ? $gender : '' ?>"><?php echo isset($gender) ? $gender : '' ?></option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
		<option value="Trans-Gender">Trans Gender</option>
		</select>
	</div>
						<div class="form-group">
							<label class="control-label">County</label>
					       <select name="county" id="county" class="form-control" required>
					<option value="<?php echo isset($county) ? $county : '' ?>">County:<?php echo isset($county) ? $countyName : '' ?></option>
					<?php $qry = $conn->query("SELECT * FROM county");
                     while($row= $qry->fetch_assoc()):?>
                     	<option value="<?php echo $row['id'] ?>"><?php echo $row['countyName'] ?></option>
                          <?php endwhile?>
                      </select>
						</div>
					</div>
					<div class="col-md-6 border-left">
						<b class="text-muted">System Information</b>
							<div class="form-group">
							<label for="" class="control-label">Contact No.</label>
							<input type="text" name="contact" class="form-control form-control" required value="<?php echo isset($contact) ? $contact : '' ?>">
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control form-control" name="email"  value="<?php echo isset($email) ? $email : '' ?>" placeholder="Optional">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control form-control" name="password" <?php echo isset($id) ? "":'required' ?>>
							<small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password":'' ?></i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirm Password</label>
							<input type="password" class="form-control form-control" name="cpass" <?php echo isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
						</div>
					</div>
				</div>
				<hr>
				<div class="card-footer">
					<button class="btn btn-primary btn-flat btn-block">Update Profile</button>
					<button class="btn btn-secondary btn-block btn-flat" type="button" onclick="location.href = 'index.php?page=profile'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if($('#pass_match').attr('data-status') != 1){
			if($("[name='password']").val() !=''){
				$('[name="password"],[name="cpass"]').addClass("border-danger")
				end_load()
				return false;
			}
		}
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=profile')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>

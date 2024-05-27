<?php
if(!isset($conn)){
	include './lib/dbh.php' ;
}
?>
<div class="col-lg-12">
	<div class="card card-secondary">
		<div class="card-header">
			 <h3 class="card-title">Add County</h3>
		</div>
		<div class="card-body">
			<form action="" id="manage_county">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
					<div class="form-group">
						<label for="" class="control-label">County code</label>
						<input type="text" name="countyCode" class="form-control" required value="<?php echo isset($countyCode) ? $countyCode : '' ?>">
						</div>
					<div class="form-group">
						<label for="" class="control-label">County Name</label>
						<input type="text" name="countyName" class="form-control" required value="<?php echo isset($countyName) ? $countyName : '' ?>">
						</div>
				</div>
				<div class="card-footer">
				<button class="btn btn-primary btn-flat btn-block">Add County</button>
			<button class="btn btn-secondary btn-flat btn-block" type="button" onclick="location.href = 'index.php?page=county_list'">Cancel</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#manage_county').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_county',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('County successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=county_list')
					},1500)
				}
			}
		})
	})
</script>
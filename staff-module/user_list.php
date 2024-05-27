<?php include'./lib/dbh.php' ?>
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding-top:1rem;">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
                <div class="card-tools">
				<a class="btn btn-block btn-sm btn-danger btn-flat border-warning" href="./index.php?page=new_user"><i class="fa fa-plus"></i> Add New User</a>
			</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  	<th class="text-center">#</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Contact #</th>
						<th>County</th>
						<th>Surveys Taken</th>
						<th>Action</th>
                  </thead>
                  <tbody>
					<?php
					$i = 1;
					//$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM field_users order by concat(lastname,', ',firstname,' ',middlename) asc");
					$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name ,field_users.id,field_users.contact,field_users.county ,county.countyName FROM field_users  inner join county on field_users.county=county.id order by concat(lastname,', ',firstname,' ',middlename) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo $row['gender'] ?></b></td>
						<td><b><?php echo $row['contact'] ?></b></td>
						<td><b><?php echo $row['countyName'] ?></b></td>
						<td><b><?php echo $conn->query("SELECT distinct(survey_id) FROM field_answers  where user_id = {$row['id']}")->num_rows; ?></b></td>
						<td class="text-center">
						<a class="btn btn-block btn-success btn-flat" href="index.php?page=field_surveys&uid=<?php echo $row['id'] ?>">Surveys</a>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
                  <tfoot>
                  <tr>
                   	<th class="text-center">#</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Contact #</th>
						<th>County</th>
						<th>Surveys Taken</th>
						<th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<script>
	$(document).ready(function(){
		$('#list').dataTable()
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_user.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
 <?php include'./lib/dbh.php'?>
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        
           <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Survey List</h3>
                <div class="card-tools">
        <a class="btn btn-block btn-sm btn-primary btn-flat border-primary" href="index.php?page=add_survey"><i class="fa fa-plus"></i> Add New Survey</a>
      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th class="text-center">#</th>
                  <th>Title</th>
                  <th>County</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
          $i = 1;
          //$qry = $conn->query("SELECT * FROM survey_set order by date(start_date) asc,date(end_date) asc");
          $qry=$conn->query("SELECT survey.id, survey.title,county.countyName,survey.start_date,survey.end_date FROM survey INNER JOIN county ON survey.county=county.id");
          while($row= $qry->fetch_assoc()):
          ?>

          <tr>
            <th class="text-center"><?php echo $i++ ?></th>
            <td><b><?php echo ucwords($row['title']) ?></b></td>
            <td><?php echo $row['countyName'] ?></td>
            <td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
            <td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
            <td class="text-center">
              <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                          Action
                        </button>
                        <div class="dropdown-menu" style="">
                          <a class="dropdown-item" href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item delete_survey" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                        </div> -->
                        <div class="btn-group">
                            <a href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a  href="./index.php?page=view_survey&id=<?php echo $row['id'] ?>" class="btn btn-info btn-flat">
                              <i class="fas fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-flat delete_survey" data-id="<?php echo $row['id'] ?>">
                              <i class="fas fa-trash"></i>
                            </button>
                        </div>
            </td>
          </tr> 
        <?php endwhile; ?>
        </tbody>
                  <tfoot>
                  <tr>
                  <th class="text-center">#</th>
                  <th>Title</th>
                  <th>County</th>
                  <th>Start</th>
                  <th>End</th>
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
  $('.delete_survey').click(function(){
  _conf("Are you sure to delete this survey?","delete_survey",[$(this).attr('data-id')])
  })
  })
  function delete_survey($id){
    start_load()
    $.ajax({
      url:'ajax.php?action=delete_survey',
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
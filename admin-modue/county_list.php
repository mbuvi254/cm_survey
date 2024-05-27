 <?php include'./lib/dbh.php'?>
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        
           <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">County List</h3>
                <div class="card-tools">
        <a class="btn btn-block btn-sm btn-primary btn-flat border-primary" href="./index.php?page=add_county"><i class="fa fa-plus"></i> Add County </a>
      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th class="text-center">#</th>
                  <th>County Code</th>
                  <th>County Name</th>
                  <th>County Population</th>
                  <th>County Surveys</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
          $i = 1;
          $qry = $conn->query("SELECT * FROM county");
          while($row= $qry->fetch_assoc()):
          ?>
          <tr>
            <th class="text-center"><?php echo $i++ ?></th>
            <td><b><?php echo ucwords($row['countyCode']) ?></b></td>
            <td> <?php echo $row['countyName'] ?></td>
            <td><b><?php echo $row['countyPopulation'] ?></b></td>
            <td><b></b><?php echo $conn->query("SELECT * FROM survey where county={$row['id']}")->num_rows; ?></td>
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
                            <a href="./index.php?page=edit_county&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a  href="./index.php?page=view_county&id=<?php echo $row['id'] ?>" class="btn btn-info btn-flat">
                              <i class="fas fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-flat delete_county" data-id="<?php echo $row['id'] ?>">
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
                  <th>Description</th>
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
  $('.delete_county').click(function(){
  _conf("Are you sure to delete this county ?","delete_county",[$(this).attr('data-id')])
  })
  })
  function delete_county($id){
    start_load()
    $.ajax({
      url:'ajax.php?action=delete_county',
      method:'POST',
      data:{id:$id},
      success:function(resp){
        if(resp==1){
          alert_toast("County successfully deleted",'success')
          setTimeout(function(){
            location.reload()
          },1500)

        }
      }
    })
  }
</script>
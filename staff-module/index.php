<?php session_start() ?>
<?php 
  if(!isset($_SESSION['staff_id']))
      header('location:login.php');
  include './lib/meta.php';
  include './lib/dbh.php' 
?>
<?php include "lib/meta.php"?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include "./lib/nav.php"?>
  <?php include "./lib/sidebar.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php 
          $page = isset($_GET['page']) ? $_GET['page'] : 'home';
          include $page.'.php';
          ?>
      </div><!-- /.container-fluid -->
      <!-- /.content -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <a href="ajax.php?action=logout">Logout</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy;<?php echo date('Y') ?><a href="https://cybermaisha.co.ke">Cybermaisha</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include "./lib/footer.php"?>
</body>
</html>

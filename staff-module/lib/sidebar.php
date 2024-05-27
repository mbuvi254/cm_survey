<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="public/img/cm.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cybermaisha Staff</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/img/cm.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="dropdown-item" href="index.php?page=profile" class="d-block">
          <?php echo ucwords($_SESSION['staff_firstname'].' '.$_SESSION['staff_lastname']) ?>
        </a>
        </div>
      </div>
   <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Field Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=user_list" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=new_user" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=user_chart" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Chart</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?page=contact" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

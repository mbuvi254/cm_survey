<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="./public/img/cm.png" alt="Cybermaisha Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cybermaisha Admin</span>
    </a>
<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/img/cm.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucwords($_SESSION['admin_firstname'].' '.$_SESSION['admin_lastname']) ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu">
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Surveys
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=survey_report" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Survey Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=survey_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Survey List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=add_survey" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Survey</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                County
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=county_report" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>County Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=county_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>County List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=add_county" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add County</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Online Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=user_log" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Log</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Field Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=field_user_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Field User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="./index.php?page=user_log" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Field User Log</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=staff_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=new_staff" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li>
              <a href="index.php?page=staff_log" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Log</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Adminstrators
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=admin_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=new_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="index.php?page=admin_log" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Log</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
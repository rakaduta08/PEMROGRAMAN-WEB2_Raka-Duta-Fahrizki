 <?php 
 if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location: login.php");
  exit();
 }
 ?>
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../Landing Page/index.html" class="brand-link">
      <img src="dist/img/AdminLTELogo1.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Puskesmas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['name'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <p><?= ucfirst($_SESSION['role']) ?></p>
            </a>
          </li>
          <li class="nav-header">Data Puskesmas</li>
          <li class="nav-item">
            <a href="data_pasien.php" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Data Pasien</p>
            </a>
          </li>
          <li class="nav-header">Autentifikasi</li>
          <li class="nav-item">
            <a href="?logout" class="nav-link">
              <i class="fas fa-door-closed nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
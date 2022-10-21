<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a href="" class="navbar-brand">HomePage</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="./home_page.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="./profile_page.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="./editdepart_page.php">จัดการแผนก</a></li>
        <li class="nav-item"><a class="nav-link" href="./addfile_page.php">เพิ่มเอกสาร</a></li>
      </ul>


      <div class="d-flex">
        <h5 class="me-3 mt-2">User : <?= $_SESSION['user_name']; ?></h5>
        <a href="./../services/logout_service.php" class="btn btn-outline-danger">Logout</a>
      </div>
    </div>
  </div>
</nav>
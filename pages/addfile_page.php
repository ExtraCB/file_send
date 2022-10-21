<?php
session_start();
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/department.php');
require_once('./../services/functions/file_myself.php');

if (isset($_GET['fileid'])) {
  $fileid = $_GET['fileid'];
  $query_delete = $conn->query("DELETE FROM files WHERE file_id = $fileid AND file_owner = $myid");
  $query_delete->execute();
  $_SESSION['success'] = "delete success";
  header('location:./addfile_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
  </script>

</head>

<body>
  <!-- navbar -->
  <?php include('./components/navbar.php') ?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-2"></div>
      <div class="col-6">
        <form class="" action="./../services/addfile.php" method="post" enctype="multipart/form-data">
          <?php include('./components/error.php') ?>
          <h3>เพิ่มไฟล์</h3>
          <input type="file" name="file" class="form-control" value="" required>
          <h4 class="mt-3">แผนกที่จะส่งให้</h4>
          <?php
          if ($result_depart) { ?>
          <select name="dep" class="form-select" id="">
            <option value="0" selected>ทุกคน</option>
            <?php foreach ($result_depart as $dep) {
              ?>
            <option value="<?= $dep['de_id'] ?>"><?= $dep['de_name'] ?></option>
            <?php } ?>
          </select>
          <?php }
          ?>

          <input type="submit" name="submitfile" class="btn btn-primary mt-2" value="addfile">
          <input type="hidden" name="id_owner" value="<?= $_SESSION['user_id'] ?>">
        </form>
      </div>
      <div class="col-2"></div>
    </div>

    <div class="row">

      <div class="col-12">
        <table class="table hover">
          <tr>
            <th>รหัสไฟล์</th>
            <th>ชื่อไฟล์</th>
            <th>วันที่อัพโหลดไฟล์</th>
            <th>จัดการ</th>
          </tr>
          <?php if ($result_file) {
            foreach ($result_file as $file) { ?>
          <tr>
            <td><?= $file['file_id'] ?></td>
            <td><?= $file['file_name'] ?></td>
            <td><?= $file['file_timestamp'] ?></td>
            <td>
              <a href="./addfile_page.php?fileid=<?= $file['file_id'] ?>" class="btn btn-outline-danger">Delete</a>
            </td>
          </tr>
          <?php }
          } ?>

        </table>
      </div>

    </div>
  </div>




  </script>
</body>

</html>
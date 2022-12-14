<?php
session_start();
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/department.php');
require_once('./../services/functions/file_all.php');
require_once('./../services/functions/file_depart.php');

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
    <div class="row">

      <div class="col-12">
        <h3>ไฟล์ส่วนรวม</h3>
        <table class="table hover">
          <tr>
            <th>รหัสไฟล์</th>
            <th>ชื่อไฟล์</th>
            <th>อัพโหลดจาก</th>
            <th>วันที่อัพโหลดไฟล์</th>
            <th>จัดการ</th>
          </tr>
          <?php if ($result_file) {
            foreach ($result_file as $file) { ?>
          <tr>
            <td><?= $file['file_id'] ?></td>
            <td><?= $file['file_name'] ?></td>
            <td><?= $file['user_name'] ?></td>
            <td><?= $file['file_timestamp'] ?></td>
            <td>
              <a href="./../files/<?= $file['file_name'] ?>" class="btn btn-outline-success" download>Download</a>
            </td>
          </tr>
          <?php }
          } ?>

        </table>
      </div>

    </div>
    <div class="row">

      <div class="col-12">
        <h3>ไฟล์ประจำแผนกของคุณ</h3>
        <table class="table hover">
          <tr>
            <th>รหัสไฟล์</th>
            <th>ชื่อไฟล์</th>
            <th>อัพโหลดจาก</th>
            <th>วันที่อัพโหลดไฟล์</th>
            <th>จัดการ</th>
          </tr>
          <?php if ($result_dep) {
            foreach ($result_dep  as $file_dep) { ?>
          <tr>
            <td><?= $file_dep['file_id'] ?></td>
            <td><?= $file_dep['file_name'] ?></td>
            <td><?= $file_dep['user_name'] ?></td>
            <td><?= $file_dep['file_timestamp'] ?></td>
            <td>
              <a href="./../files/<?= $file_dep['file_name'] ?>" class="btn btn-outline-success" download>Download</a>
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
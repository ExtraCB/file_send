<?php
session_start();
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/department.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_delete  = $conn->prepare("DELETE FROM department WHERE de_id = :id");
  $query_delete->bindParam(":id", $id);
  $query_delete->execute();
  header('location:./editdepart_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit_Department</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-6">
        <?php include('./components/error.php') ?>
        <h3>เพิ่มแผนก</h3>
        <form action="./../services/adddep_service.php" method="post">
          <div class="input-group">
            <input type="text" name="dep_name" class="form-control">
            <input type="submit" value="Submit" name="submit_dep" class="btn btn-primary">
          </div>
        </form>

        <h3>จัดการแผนก</h3>
        <table class="table">
          <tr>
            <th>รหัสแผนก</th>
            <th>ชื่อแผนก</th>
            <th>จัดการ</th>
          </tr>
          <?php
          if ($result_depart) {
            foreach ($result_depart as $dep) {
          ?>
          <tr>
            <td><?= $dep['de_id'] ?></td>
            <td><?= $dep['de_name'] ?></td>
            <td>
              <a href="./editdeparts_page.php?id=<?= $dep['de_id'] ?>"><button
                  class="btn btn-outline-primary">Edit</button></a>
              <a href="./editdepart_page.php?id=<?= $dep['de_id'] ?>"><button
                  class="btn btn-outline-primary">Delete</button></a>
            </td>
          </tr>
          <?php }
          } ?>
        </table>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>
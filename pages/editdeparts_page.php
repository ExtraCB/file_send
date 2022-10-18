<?php
session_start();
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/department.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $edit_query = $conn->query("SELECT * FROM department WHERE de_id = $id");
  $edit_query->execute();
  $result_edit = $edit_query->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['dep_id'])) {
  $dep_id = $_POST['dep_id'];
  $dep_name = $_POST['dep_name'];
  $query_update = $conn->query("UPDATE department SET de_name = '$dep_name' WHERE de_id = $dep_id");
  $query_update->execute();
  $_SESSION['success'] = "แก้ไขสำเร็จ !";
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

        <h3>แก้ไขแผนก</h3>
        <form action="./editdeparts_page.php" method="post">
          <div class="input-group">
            <input type="hidden" name="dep_id" value="<?= $result_edit['de_id'] ?>">
            <input type="text" name="dep_name" value="<?= $result_edit['de_name'] ?>" class="form-control">
            <input type="submit" value="Submit" name="submit_dep" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>
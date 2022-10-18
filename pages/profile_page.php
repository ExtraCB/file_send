<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../services/connect.php');
require_once('./../services/functions/securecheck.php');

$myid = $_SESSION['user_id'];
$myself = $conn->query("SELECT * FROM users,department WHERE user_id = $myid AND user_depart = de_id");
$myself->execute();
$result_myself = $myself->fetch(PDO::FETCH_ASSOC);

require_once('./../services/functions/department.php');

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
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
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-6">
        <?php include('./components/error.php'); ?>
        <h3>Edit profile</h3>
        <form action="./../services/edit_service.php" method="post">
          <label for="" class="form-label">Username</label>
          <input type="text" name="" value="<?= $result_myself['user_name'] ?>" class="form-control" id="" disabled>
          <label for="" class="form-label">Password</label>
          <input type="text" name="password" value="<?= $result_myself['user_password'] ?>" class="form-control" id="">

          <label for="" class="form-label">Department</label>
          <?php
          if ($result_depart) { ?>
          <select name="dep" class="form-select" id="">
            <option value="<?= $result_myself['user_depart'] ?>" selected><?= $result_myself['de_name'] ?></option>

            <?php foreach ($result_depart as $dep) {
              ?>
            <option value=" <?= $dep['de_id'] ?>"><?= $dep['de_name'] ?></option>
            <?php } ?>
          </select>
          <?php }
          ?>

          <input type="submit" class="btn btn-outline-primary mt-2" value="submit" name="edit_submit">
          <input type="hidden" name="dep_old" value="<?= $myself['user_depart'] ?>">

        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>
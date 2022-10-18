<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login_page</title>
  <link rel="stylesheet" href="./../styles/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <div class="col-2"></div>
      <div class="col-6">
        <?php
        session_start();
        if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger">
          <?= $_SESSION['error'] ?>
        </div>
        <?php  }
        if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
          <?= $_SESSION['success'] ?>
        </div>
        <?php }
        ?>
        <h2>Login</h2>
        <form action="./../services/login_service.php">
          <label for="" class="form-label">Username : </label>
          <input class="form-control mb-2" type="text" name="username" id="">
          <label for="" class="form-label">Password : </label>
          <input class="form-control mb-2" type="text" name="password" id="">
          <input class="btn btn-primary mt-2" type="submit" name="" id="">
        </form>
        <a href="./../pages/register_page.php">ยังไม่ได้สมัครสมาชิก ..</a>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>
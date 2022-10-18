<?php
include('./connect.php');
session_start();

if (isset($_POST['submit_dep'])) {
  $dep_name = $_POST['dep_name'];

  if ($_SESSION['user_status'] == 'admin') {
    $query_insert = $conn->prepare("INSERT INTO department (de_name) VALUES (:dep_name)");
    $query_insert->bindParam(":dep_name", $dep_name);
    $query_insert->execute();
    $_SESSION['success'] = "เพิ่มสำเร็จ !";
    header('location:./../pages/editdepart_page.php');
  } else {
    echo "required admin status";
  }
}
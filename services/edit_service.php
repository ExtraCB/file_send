<?php
session_start();
include('./connect.php');


if (isset($_POST['edit_submit'])) {
  $password = $_POST['password'];
  $dep = $_POST['dep'];

  echo $dep;

  $query_update = $conn->prepare("UPDATE `users` SET `user_password` = :password ,`user_depart` = :dep WHERE `user_id` = :userid");

  $query_update->bindParam(":password", $password);
  $query_update->bindParam(":dep", $dep);
  $query_update->bindParam(":userid", $_SESSION['user_id']);

  $query_update->execute();

  $_SESSION['success'] = 'แก้ไขสำเร็จ !';
  header('location:./../pages/profile_page.php');
}
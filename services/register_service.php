<?php
session_start();
include('./connect.php');

if (isset($_POST['register_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $dep = $_POST['dep'];

  if ($password == $password2) {
    try {
      $check_username = $conn->prepare("SELECT user_name FROM users WHERE user_name = :username");
      $check_username->bindParam(":username", $username);
      $check_username->execute();
      $result = $check_username->fetch(PDO::FETCH_ASSOC);
      if ($result['user_name'] == $username) {
        $_SESSION['error'] = 'มี username นี้ในระบบแล้ว <a href="./../pages/login_page.php">เข้าสู่ระบบ</a>';
        header('location:../pages/register_page.php');
      } else if (!isset($_SESSION['error'])) {
        $query_insert  = $conn->prepare("INSERT INTO `users`( `user_name`, `user_password`,`user_depart`) VALUES (:username,:password,:dep)");
        $query_insert->bindParam(":username", $username);
        $query_insert->bindParam(":password", $password);
        $query_insert->bindParam(":dep", $dep);
        $query_insert->execute();
        $_SESSION['success'] = "สมัครสมาชิกสำเร็จแล้ว <a href='./../pages/login_page.php'>เข้าสู่ระบบ</a>";
        header('location:./../pages/register_page.php');
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  } else {
    $_SESSION['error'] = 'รหัสผ่านยืนยันไม่ตรงกัน';
    header('location:./../pages/register_page.php');
  }
}
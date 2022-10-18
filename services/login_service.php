<?php
session_start();
include('./connect.php');

if (isset($_POST['login_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    $check_username = $conn->prepare("SELECT *FROM users WHERE user_name = :username AND user_password  = :password LIMIT 1");
    $check_username->bindParam(":username", $username);
    $check_username->bindParam(":password", $password);
    $check_username->execute();
    $result = $check_username->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      if ($result['user_status'] == '1') {
        $_SESSION['user_status'] = 'user';
      } else {
        $_SESSION['user_status'] = 'admin';
      }
      $_SESSION['user_id'] = $result['user_id'];
      $_SESSION['user_dep'] = $result['user_depart'];
      $_SESSION['user_name'] = $result['user_name'];
      header('location:./../pages/home_page.php');
    } else {
      $_SESSION['error'] = 'ไม่พบเจอข้อมูล username และ password นี้ในระบบ';
      header('location:./../pages/login_page.php');
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
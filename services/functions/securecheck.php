<?php
if (!isset($_SESSION['user_id'])) {
  $_SESSION['error'] = 'เข้าสู่ระบบก่อนใช้งาน';
  header('location:./login_page.php');
}
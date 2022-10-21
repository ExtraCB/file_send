<?php
session_start();
include('./../services/connect.php');

if (isset($_POST['submitfile'])) {
  $own_id = $_POST['id_owner'];
  $file = $_FILES['file'];
  $dep = $_POST['dep'];


  if ($file) {
    $allow = array("pdf", "jpg", "png", "docx", "jpeg", "png", "sql");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew  = rand() . "." . $fileExt;
    $filePath = "../files/" . $fileNew;
    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }
  }

  $query_insert = $conn->prepare("INSERT INTO `files`(`file_owner`, `file_name`, `file_status`) VALUES (:own_id,:fileNew,:dep)");
  $query_insert->bindParam(":own_id", $own_id);
  $query_insert->bindParam(":fileNew", $fileNew);
  $query_insert->bindParam(":dep", $dep);
  $query_insert->execute();

  $_SESSION['success'] = 'upload file success';
  header('location:./../pages/addfile_page.php');
}

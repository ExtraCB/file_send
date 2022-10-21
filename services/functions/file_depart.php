<?php
$myid = $_SESSION['user_id'];
$query_user = $conn->query("SELECT user_depart FROM users WHERE user_id = $myid");
$query_user->execute();
$result_user =  $query_user->fetch(PDO::FETCH_ASSOC);

$dep = $result_user['user_depart'];
$query_dep = $conn->query("SELECT * FROM files,users WHERE file_status = $dep AND file_owner = user_id");
$query_dep->execute();
$result_dep = $query_dep->fetchAll();
<?php
$myid = $_SESSION['user_id'];
$query_file = $conn->query("SELECT * FROM files WHERE file_owner = $myid");
$query_file->execute();
$result_file = $query_file->fetchAll();
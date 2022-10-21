<?php
$myid = $_SESSION['user_id'];
$query_file = $conn->query("SELECT * FROM files,users WHERE file_status = 0 AND file_owner = user_id");
$query_file->execute();
$result_file = $query_file->fetchAll();
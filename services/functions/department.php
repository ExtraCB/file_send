<?php
$query_depart = $conn->query('SELECT * FROM department');
$query_depart->execute();
$result_depart = $query_depart->fetchAll();
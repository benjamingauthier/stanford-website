<?php
include('connectbdd.php');

$ndd = $_POST['ndd'];

$stmt = $dbh->prepare("INSERT INTO users (ndd) VALUES (:ndd)");

$stmt->bindValue(':ndd', $ndd);
$stmt->execute();


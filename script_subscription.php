<?php
include('connectbdd.php');

$ndd = $_POST['ndd'];

$stmt = $dbh->prepare("INSERT INTO user (ndd) VALUES (:ndd)");

$stmt->bindValue(':ndd', $ndd);
$stmt->execute();


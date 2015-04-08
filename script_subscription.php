<?php
include('connectbdd.php');
session_start();

$ndd = $_POST['ndd'];
$_SESSION['ndd'] = $ndd;
$stmt = $dbh->prepare("INSERT INTO users (ndd) VALUES (:ndd)");

$stmt->bindValue(':ndd', $ndd);
$stmt->execute();


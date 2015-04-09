<?php
include('connectbdd.php');

$email = $_POST['email'];

$stmt = $dbh->prepare("INSERT INTO emails (email) VALUES (:email)");

$stmt->bindValue(':email', $email);
$stmt->execute();


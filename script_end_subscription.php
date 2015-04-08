<?php
include('connectbdd.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$city = $_POST['city'];

$stmt = $dbh->prepare("UPDATE users SET firstname = :firstname AND lastname = :lastname AND address = :address AND postcode = :postcode AND city = :city WHERE id = :id");

$stmt->bindValue(':firstname', $firstname);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':address', $address);
$stmt->bindValue(':postcode', $postcode);
$stmt->bindValue(':city', $city);
$stmt->bindValue(':id', $dbh->lastInsertId());
$stmt->execute();


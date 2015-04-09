<?php
session_start();
include('connectbdd.php');
if(isset($_SESSION['ndd'])) {
    $ndd = $_SESSION['ndd'];
    unset($_SESSION['ndd']);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$city = $_POST['city'];

$stmt = $dbh->prepare("UPDATE users SET email = :email, firstname = :firstname, lastname = :lastname, address = :address, postcode = :postcode, city = :city WHERE ndd = :ndd");

$stmt->bindValue(':email', $email);
$stmt->bindValue(':firstname', $firstname);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':address', $address);
$stmt->bindValue(':postcode', $postcode);
$stmt->bindValue(':city', $city);
$stmt->bindValue(':ndd', $ndd);
$stmt->execute();

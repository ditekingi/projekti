<?php
include_once 'UserRepository.php';
$email = $_GET['email'];

$urep = new UserRepository();
$urep->deleteUser($email);

header("location:Dashboard.php");
?>
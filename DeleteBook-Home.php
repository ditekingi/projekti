<?php
include_once('HomeRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libriToDelete = $_POST['libri'];

    $hrep = new HomeRepository();
    $existingBook = $hrep->getHomeByLibri($libriToDelete);

    if($existingBook){
        $hrep->deleteHome($libriToDelete);
        $_SESSION['deletemessage'] = "Libri: $libriToDelete u fshi nga " . $_SESSION['username'] . "!";
    }
    else{
        $_SESSION['deletemessage'] = "Libri: $libriToDelete nuk ekziston!";
    }

    header("location: Home.php");
    exit();
}
?>
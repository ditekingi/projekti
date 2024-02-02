<?php
include_once('BookRepository.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libriToDelete = $_POST['libri'];

    $hrep = new BookRepository();
    $existingBook = $hrep->getBooksByLibri($libriToDelete);

    if($existingBook){
        $hrep->deleteBooks($libriToDelete);
        $_SESSION['deletemessage'] = "Libri: $libriToDelete u fshi nga " . $_SESSION['username'] . "!";
    }
    else{
        $_SESSION['deletemessage'] = "Libri: $libriToDelete nuk ekziston!";
    }

    header("location: Books.php");
    exit();
}
?>
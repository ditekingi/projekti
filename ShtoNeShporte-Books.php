<?php
include_once('BookRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libriToAdd = $_POST['libri'];

    $hrep = new BookRepository();
    $existingBook = $hrep->getBooksByLibri($libriToAdd);

    if($existingBook){
        $hrep->insertLibriIntoShporta($libriToAdd);
        echo "<script>alert('Book added to shopping cart successfully!')</script>";
        
    }else{
        echo "<script>alert('Book not found in the database!')</script>";
    }
    
    header("location: Books.php");
    exit();
}
?>
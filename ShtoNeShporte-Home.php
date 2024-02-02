<?php
include_once('HomeRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libriToAdd = $_POST['libri'];

    $hrep = new HomeRepository();
    $existingBook = $hrep->getHomeByLibri($libriToAdd);

    if($existingBook){
        $hrep->insertLibriIntoShporta($libriToAdd);
        echo "<script>alert('Book added to shopping cart successfully!')</script>";
        
    }else{
        echo "<script>alert('Book not found in the database!')</script>";
    }
    
    header("location: Home.php");
    exit();
}
?>
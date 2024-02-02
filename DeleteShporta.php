<?php
include_once('ShportaRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artikulliDelete = $_POST['libri'];

    $shrep = new ShportaRepository();
    $artikulli = $shrep->getShportaByLibri($artikulliDelete);

    if($artikulliDelete){
        $shrep->deleteLibri($artikulliDelete);
        echo "Book deleted successfully!";
    }
    else{
        echo "Book not found in the database!";
    }

    header("location: Shporta.php");
    exit();
}
?>
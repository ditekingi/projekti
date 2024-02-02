<?php
include 'Libri-Home.php';
session_start();

if(!isset($_SESSION['username'])){
    header("location:LogIn.php");
    exit();
}

if($_SESSION['role'] != "admin"){
    header("location:Home.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once('HomeRepository.php');

    if(empty($_POST['libri']) || empty($_POST['cmimi']) || empty($_POST['autori']) || empty($_POST['imagePath'])){
        echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Nuk keni regjistruar liber te ri!</div>";
    }
    else{
        $libri = $_POST['libri'];
        $cmimi = $_POST['cmimi'];
        $autori = $_POST['autori'];
        $imagePath = $_POST['imagePath'];

        $hrep = new HomeRepository();
        $emriLibrit = $hrep->getHomeByLibri($libri);
        
        if($emriLibrit){
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Libri ekziston ne databaze te homepage!</div>";
        }
        try{
            $newBook = new Libri($libri,$cmimi,$autori,$imagePath);
            $hrep->insertLibri($newBook);
            header("location: Home.php");
            exit();
        }
        catch(PDOException $e){
            if($e->getCode() == '23000'){
                echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Libri ekziston ne databaze te homepage!</div>";
            }
            else{
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="AddBook.css">
</head>
<body>
    <div class="wrapper">
        <form action="AddBook-Home.php" method="post">
            <h1 style="text-align: center;">Add a Book</h1>
                 
    
            <div class="inputbox">
                <input type="text" placeholder="Libri" name="libri">
            </div>
    
            <div class="inputbox">
                <input type="text" placeholder="Cmimi" name="cmimi">
            </div>
    
            <div class="inputbox">
                <input type="text" placeholder="Autori" name="autori">
            </div>

            <div class="inputbox">
                <input type="text" placeholder="Image" name="imagePath">
            </div>
    
            <input type="submit" name="addbtn" value="Add Book" class="add">
        </form>
    </div>
</body>
</html>
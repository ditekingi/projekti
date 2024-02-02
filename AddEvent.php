<?php
include 'Eventi.php';
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
    include_once('NewsRepository.php');

    if(empty($_POST['eventi']) || empty($_POST['dita']) || empty($_POST['muaji']) || empty($_POST['viti']) || empty($_POST['ora'])){
        echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Nuk keni regjistruar liber te ri!</div>";
    }
    else{
        $eventi = $_POST['eventi'];
        $dita = $_POST['dita'];
        $muaji = $_POST['muaji'];
        $viti = $_POST['viti'];
        $ora = $_POST['ora'];

        $nrep = new NewsRepository();
        $emriEventit = $nrep->getNewsByEventi($eventi);
        
        if($emriEventit){
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Eventi ekziston ne databaze!</div>";
        }
        try{
            $newEvent = new Eventi($eventi,$dita,$muaji,$viti,$ora);
            $nrep->insertEventi($newEvent);
            header("location: News.php");
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
    <title>Add Event</title>
    <link rel="stylesheet" href="AddBook.css">
</head>
<body>
    <div class="wrapper">
        <form action="AddEvent.php" method="post">
            <h1 style="text-align: center;">Add an Event</h1>
                 
    
            <div class="inputbox">
                <input type="text" placeholder="Emri i eventit" name="eventi">
            </div>
    
            <div class="inputbox">
                <input type="int" placeholder="Dita" name="dita">
            </div>
    
            <div class="inputbox">
                <input type="text" placeholder="Muaji" name="muaji">
            </div>

            <div class="inputbox">
                <input type="text" placeholder="Viti" name="viti">
            </div>

            <div class="inputbox">
                <input type="text" placeholder="Ora" name="ora">
            </div>
    
            <input type="submit" name="addbtn" value="Add Event" class="add">
        </form>
    </div>
</body>
</html>
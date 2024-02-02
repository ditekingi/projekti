<?php
include_once('NewsRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventDelete = $_POST['eventi'];

    $nrep = new NewsRepository();
    $eventi = $nrep->getNewsByEventi($eventDelete);

    if($eventDelete){
        $nrep->deleteEventi($eventDelete);
        $_SESSION['deletemessage'] = "Libri: $eventDelete u fshi nga " . $_SESSION['username'] . "!";
    }
    else{
        $_SESSION['deletemessage'] = "Libri: $eventDelete nuk ekziston!";
    }

    header("location: News.php");
    exit();
}
?>
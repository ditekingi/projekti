<?php
include_once 'KontaktiRepository.php';
$mesazhi = $_GET['mesazhi'];

$krep = new KontaktiRepository();
$krep->deleteMesazhi($mesazhi);

header("location:Dashboard.php");
?>
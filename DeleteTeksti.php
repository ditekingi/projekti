<?php
include_once('AboutUsRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tekstiDelete = $_POST['teksti'];

    $arep = new AboutUsRepository();
    $teksti = $arep->getAboutUsByTeksti($tekstiDelete);

    if ($teksti) {
        $arep->deleteTeksti($tekstiDelete);
        echo "<script>alert('Text deleted successfully!')</script>";
    } else {
        echo "<script>alert('Text not found in the database!')</script>";
    }

    header("location: AboutUs.php");
    exit();
}
?>
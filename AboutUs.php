<?php
session_start();
include_once('AboutUsRepository.php');
include_once('Teksti.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_text"])) {
    $text = $_POST["new_text"];

    $newTeksti = new Teksti($text);
    $arep = new AboutUsRepository();
    $arep->insertTeksti($newTeksti);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$arep = new AboutUsRepository();
$texts = $arep->getAllTeksti();

$hide="";
if(!isset($_SESSION['username'])){
    header("location:LogIn.php");
}
else{
    if($_SESSION['role'] == "admin"){
        $hide = "Dashboard";
    }
?>

<style>
    @media(min-width: 768px){
        .news{
            margin-left: -4px;
        }
        .dash{
            margin-left: -10px;
        }
        .lleg{
            font-size: larger;
            padding: 10px;
            margin-left: 10px;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>
    <link rel="stylesheet" href="AboutUs.css">
</head>
<body>
    <header class="h1" style="height: 90px;">
        <div class="logo">
            <img style="border-radius: 10px;" src="logoo.png" alt="logo" height="65px">
        </div>

        <ul class="hederi">
            <li><a href="Home.php">Home</a></li>
            <div class="dropdown">
                <button class="drop" style="font-family: garamond;"><a href="Books.php" style="text-decoration: none; color: rgb(211, 178, 95);">Books</a></button>
                <div class="content">
                    <a href="Books.php#sh">Shqip</a>
                    <a href="Books.php#f">Femije</a>
                    <a href="Books.php#fj">Fjalore</a>
                    <a href="Books.php#shk">Shkollore</a>
                    <a href="Books.php#kl">Klasike</a>
                    <a href="Books.php#th">Thriller</a>
                    <a href="Books.php#r">Romance</a>
                    <a href="Books.php#h">Horror</a>
                    <a href="Books.php#dr">Drama</a>
                    <a href="Books.php#sc">Shkence</a>
                    <a href="Books.php#m">Muzike</a>
                    <a href="Books.php#c">Comics</a>
                </div>
            </div>
            <li><a href="#top">About Us</a></li>
            <li><a href="News.php" class="news" style=" margin-right: 5px;">News</a></li>
            <li><a href="Dashboard.php" class="dash"><?php echo $hide?></a></li>
            <button class="b"><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></button>
            <li>/</li>
            <button class="b"><a style="text-decoration: none; color: black;" href="SignUp.php">Sign Up</a></button>
        </ul>
    </header>
    
    <fieldset class="f1">
        <h1 id="aboutus" style="color: rgb(65, 34, 52);">BIBLIOPOLIUM</h1>
        <fieldset class="f2" style="border-radius: 20px;">
            <legend class="lleg" style="color: rgb(65, 34, 52);">
                Opening Hours
            </legend>
            <ul class="orari">
                    <li>Monday 9 AM - 8 PM</li>
                    <li>Tuesday 9 AM - 8 PM</li>
                    <li>Wednesday 9 AM - 8 PM</li>
                    <li>Thursay 9 AM - 8 PM</li>
                    <li>Friday 9 AM - 8 PM</li>
                    <li>Saturday 9 AM - 8 PM</li>
                    <li>Sunday Closed</li>
            </ul>
        </fieldset>
        <?php foreach($texts as $text){ ?>
            <div class="container">
                <p style="font-size: 22px;">
                    <?= $text['Teksti']?>
                    <?php if($_SESSION['role'] == 'admin'){
                    echo "(Added by: " . $text['AddedBy'] . ")";
                    } ?>
                </p>
                <?php if ($_SESSION['role'] == 'admin'){ ?>
                    <form method='POST' action='DeleteTeksti.php'>
                        <input type='hidden' name='teksti' value='<?= $text['Teksti'] ?>'>
                        <input type='submit' name='deleteButton' value='Delete' class="butoni" style="border-color: rgb(65, 34, 52); font-family: garamond; color: rgb(65, 34, 52); border-radius: 3px; background-color: white;">
                    </form>
                <?php } ?>
            </div>
        <?php } ?>
            
        <?php if ($_SESSION['role']=='admin') {?>
            <form method="POST" action="" style="margin-top: 20px; margin-bottom: 20px;">
                <textarea id="new_text" name="new_text" rows="1" cols="30" style="padding: 8px; border: 1px solid rgb(65, 34, 52); border-radius: 4px; margin-right: 10px; width: 20%;"></textarea>
                <input type="submit" name="add_text" value="Add Text" style="color: rgb(65, 34, 52); font-family: garamond; border-color: rgb(65, 34, 52);">
            </form>
        <?php } ?>
    </fieldset>
    <div class="quote">
        <div class="tekst">“ Books can be dangerous. The best ones should be labeled “ This could change your life. ” „</div>
    </div>
    
    <footer>
        <div class="f">
            <div class="footerleft">
                <h2 style="color: rgb(211, 178, 95);">Contact Us</h2>
                <p>Phone: *** ** *** ***</p>
                <p>E-mail: Bibliopolium@email.com</p>
            </div>

            <div class="footerright">
                <h2 style="color: rgb(211, 178, 95);">Our Socials</h2>
                <a href="https://www.facebook.com/"><img style="margin-right: 10px;" src="facebook.png" alt="" width="32px" height="32px">Facebook</a>
                <a href="https://www.twitter.com/"><img style="margin-right: 10px;" src="twitter.png" alt="" width="32px" height="32px">Twitter</a>
                <a href="https://www.instagram.com/"><img style="margin-right: 10px;" src="instagram.png" alt="" width="32px" height="32px">Instagram</a>
                <a href="https://www.pinterest.com/"><img style="margin-right: 10px;" src="pinterest.png" alt="" width="32px" height="32px">Pinterest</a>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
  }
?>
<?php
session_start();
include_once('KontaktiRepository.php');
include_once('Ankesa.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_text"])) {
    $mesazhi = $_POST["new_text"];

    $newMesazhi = new Mesazhi($mesazhi);
    $krep = new KontaktiRepository();
    $krep->insertMesazhi($newMesazhi);

    $notification = "Message added successfully!";

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$krep = new KontaktiRepository();
$mesazhet = $krep->getAllMesazhi();

if(!isset($_SESSION['username'])){
    header("location:LogIn.php");
}

$useri = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakti</title>
    <link rel="stylesheet" href="Home.css">

    <script>
        function confirmMessage(mesazhi){
            var confirmMessage = confirm("Are you sure you want to send this message: " + mesazhi + "?");

            if (confirmMessage){
                alert("Mesazhi u dergua me sukses");
            }
            else{
                alert("Mesazhi nuk u dergua");
                return false;
            }
        }
    </script>
</head>
<body>
    <header class="h1" style="height: 90px;">
        <div class="logo">
            <img src="logoo.png" alt="logo" height="65px">
        </div>

        <ul>
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
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="News.php" class="news" style="margin-right: 5px;">News</a></li>
            <button class="b"><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></button>
            <li>/</li>
            <button class="b"><a style="text-decoration: none; color: black;" href="SignUp.php">Sign Up</a></button>
            <?php if($_SESSION['role']=='user'){ ?>
                <div class="cart" style="margin-left: 10px;">
                    <button style="background-color: rgb(65, 34, 52); border:none">
                        <a href="Shporta.php"><img src="cart-icon.png" alt="Cart Icon" height="30px"></a>
                    </button>
                </div>
            <?php } ?>
        </ul>
    </header>

    <main>

        <div class="BestSellers">
            <p style="font-size: larger; font-weight: bolder; text-decoration: underline;"><?php echo $useri ?></p>
        </div>

        <form method="POST" action="" style="margin-left: 30px; margin-bottom: 299.5px;">
            <textarea id="new_text" placeholder="write message" name="new_text" rows="20" cols="80" style="padding: 8px; border: 1px solid rgb(65, 34, 52); border-radius: 4px; margin-right: 10px; width: 40%;"></textarea>
            <input type="submit" onclick="return confirmMessage(document.getElementById('new_text').value)" name="add_text" value="Add Message" style="color: rgb(65, 34, 52); font-family: garamond; border-color: rgb(65, 34, 52);">
        </form>
        
        
        <footer>
            <div class="f">
                <div class="footerleft">
                    <h2><a style="color: rgb(211, 178, 95);" href="#top">Contact Us</a></h2>
                    <p>Phone: +38344111999 </p>
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
    </main>
</body>
</html>
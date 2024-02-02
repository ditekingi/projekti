<?php
session_start();
include_once('ShportaRepository.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libri = $_POST['libri'];
    $cmimi = $_POST['cmimi'];
    $autori = $_POST['autori'];
    $imagePath = $_POST['imagePath'];
    
    $book = new Libri($libri,$cmimi,$autori,$imagePath);
    $shrep = new ShportaRepository();
    $shrep->insertLibri($book);
}

$shrep = new ShportaRepository();
$books = $shrep->getAllBooksFromShporta();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShtoLibra</title>
    <link rel="stylesheet" href="Shto.css">

    <style>
        @media(min-width: 768px){
            .news{
                margin-left: -4px;
            }
            .emri{
                font-size: 30px;
            }
            .autori{
                font-size: 25px;
            }
            .cmimi{
                font-size: 25px;
            }
        }
    </style>
</head>
<body>
    <header class="h1" style="height: 90px;">
        <div class="logo">
            <img style="border-radius: 10px;" src="logoo.png" alt="logo" height="65px">
        </div>

        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Books.php" style="margin-left: -9px; margin-right: -9px;" >Books</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="News.php" class="news" style="margin-right: 5px;">News</a></li>
            <button class="b"><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></button>
            <li>/</li>
            <button class="b"><a style="text-decoration: none; color: black;" href="SignUp.php">Sign Up</a></button>
        </ul>
    </header>

    <main>
        <div class="shporta">
            <h2 style="margin-left: 70px; margin-top: 40px; color: rgb(65, 34, 52);">Shporta Juaj</h2>
                <?php foreach($books as $book){ ?>
                    <div class="kutia">
                        <div class="info">
                            <div>
                                <img src="<?= $book['ImagePath'] ?>" alt="" class="libri">
                            </div>
                            <div class="librat">
                                <p class="emri"><?= $book['Libri'] ?></p>
                                <p class="autori"><?= $book['Autori'] ?></p>
                                <p class="cmimi"><?= $book['Cmimi'] ?>$</p>
                            </div>
                            <form action="DeleteShporta.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $book['Libri']; ?>">
                                    <button class="vazhdo" style=" width: 100%; font-family: 'Times New Roman', Times, serif; height: 35px;">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <button class="vazhdo" style="font-family: 'Times New Roman', Times, serif; margin-left: 29.5vw; width: 40%;">Vazhdo Blerjen</button>

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
    </main>
</html>
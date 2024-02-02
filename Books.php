<?php
session_start();

include_once('BookRepository.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libri = $_POST['libri'];
    $cmimi = $_POST['cmimi'];
    $autori = $_POST['autori'];
    $imagePath = $_POST['imagePath'];

    $newBook = new LibriBooks($libri,$cmimi,$autori,$imagePath);
    $brep = new BookRepository();
    $brep->insertLibri($newBook);
}

$brep = new BookRepository();
$librat = $brep->getAllBooks();

$hide="";
if(!isset($_SESSION['username'])){
    header("location:LogIn.php");
}
else{
    if($_SESSION['role'] == "admin"){
        $hide = "Dashboard";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="Books.css">
</head>
<body>
    <header class="h1" style="height: 90px;">
        <div class="logo">
            <img style="border-radius: 10px;" src="logoo.png" alt="logo" height="65px">
        </div>

        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="#top" style="@media (min-width: 1024px){margin-left: -9px; margin-right: -9px;}" >Books</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="News.php" style="@media (min-width: 1024px){margin-left: -4px;} margin-right: 5px;">News</a></li>
            <li><a href="Dashboard.php" style="@media (min-width: 1024px){margin-left: -10px;}"><?php echo $hide?></a></li>
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
        <div class="categories">
                <div class="genres"><a class="link" href="#sh">Shqip</a></div>
                <div class="genres"><a class="link" href="#f">Femije</a></div>
                <div class="genres"><a class="link" href="#fj">Fjalore</a></div>
                <div class="genres"><a class="link" href="#shk">Shkollore</a></div>
                <div class="genres"><a class="link" href="#kl">Klasike</a></div>
                <div class="genres"><a class="link" href="#th">Thriller</a></div>
                <div class="genres"><a class="link" href="#r">Romance</a></div>
                <div class="genres"><a class="link" href="#h">Horror</a></div>
                <div class="genres"><a class="link" href="#dr">Drama</a></div>
                <div class="genres"><a class="link" href="#sc">Shkence</a></div>
                <div class="genres"><a class="link" href="#m">Muzike</a></div>
                <div class="genres"><a class="link" href="#c">Comics</a></div>
        </div>

        <div class="slider">
            <h2 style="color: rgb(65, 34, 52);">Popular</h2>
            <img id="slideshow">
            <button class="arrow prev" onclick="prevSlide()">❮</button>
            <button class="arrow next" onclick="nextSlide()">❯</button>
        </div>


        <h2 id="sh" class="tituj">Shqip</h2>
        <div class="kategorite">
            <?php foreach ($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Shqip'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){ ?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="f" class="tituj">Femije</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Femije'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="fj" class="tituj">Fjalore</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Fjalore'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="shk" class="tituj">Shkollore</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Shkollore'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="kl" class="tituj">Klasike</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Klasike'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                            <form action="ShtoNeShporte-Books.php" method="post">
                                <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <h2 id="th" class="tituj">Thriller</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Thriller'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="r" class="tituj">Romance</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Romance'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                    <form action="ShtoNeShporte-Books.php" method="post">
                                        <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                        <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                    </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="h" class="tituj">Horror</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Horror'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="dr" class="tituj">Drame</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Drame'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                    </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="sc" class="tituj">Shkence</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Shkence'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <h2 id="m" class="tituj">Muzike</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Muzike'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        
        <h2 id="c" class="tituj">Comics</h2>
        <div class="kategorite">
            <?php foreach($librat as $libri){ ?>
                <?php if($libri['Category'] === 'Comics'){ ?>
                    <div class="container">
                        <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                        <div class="info">
                            <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                            <p><?php echo $libri['Autori']; ?></p>
                            <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                        </div>
                        <div style="text-align: center;">
                            <?php if($_SESSION['role']=='admin'){?>
                                <form action="DeleteBook-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                                </form>
                            <?php } ?>

                            <?php if($_SESSION['role']=='user'){?>
                                <form action="ShtoNeShporte-Books.php" method="post">
                                    <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                    <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <button class="blej" style="font-family: 'Times New Roman', Times, serif; margin-left: 29.5vw; width: 40%; <?php echo $_SESSION['role'] !== 'admin' ? 'display: none;' : ''; ?>" onclick="window.location.href='AddBook-Books.php'">Add a Book</button>

        <footer>
            <div class="f">
                <div class="footerleft">
                    <h2><a style="color: rgb(211, 178, 95);" href="Kontakti.php">Contact Us</a></h2>
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

    <script>
        let i = 0;
        let images = ['book23.jpg','book24.jpg','book25.jpg','book26.jpg','book27.jpg','book28.jpg','book29.jpg','book30.jpg','book31.jpg','book32.jpg','book33.jpg','book34.jpg','book35.jpg','book36.jpg'];

        function nextSlide(){
            document.getElementById('slideshow').src = images[i];

            if(i < images.length - 1){
                i++;
            }
            else{
                i = 0;
            }
        }
        function prevSlide(){
            document.getElementById('slideshow').src = images[i];

            if(i == 0){
                i = images.length - 1;
            }
            else{
                i--;
            }
        }
        document.addEventListener(onload, nextSlide());

        function confirmDelete(libri){
            var confirmDelete = confirm("Are you sure you want to delete the book: " + libri + "?");

            if (confirmDelete){
                alert("Book: " + libri + " was deleted by " + '<?php echo $_SESSION['username']; ?>');
            }
            else{
                alert("Libri: " + libri +" nuk u fshi");
                return false;
            }
        }

        <?php
            if(isset($_SESSION['insertmessage'])){
                echo 'alert("' . $_SESSION['insertmessage'] . '");';
                unset($_SESSION['insertmessage']);
            }
        ?>
    </script>
</body>
</html>

<?php
  }
?>
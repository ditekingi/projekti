<?php
session_start();

include_once('HomeRepository.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $libri = $_POST['libri'];
    $cmimi = $_POST['cmimi'];
    $autori = $_POST['autori'];
    $imagePath = $_POST['imagePath'];
    
    $newBook = new Libri($libri,$cmimi,$autori,$imagePath);
    $hrep = new HomeRepository();
    $hrep->insertLibri($newBook);
}

$insertmessage = isset($_SESSION['insertmessage']) ? $_SESSION['insertmessage'] : "";
unset($_SESSION['insertmessage']);

$hrep = new HomeRepository();
$librat = $hrep->getAllBooks();

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
    <title>Home</title>
    <link rel="stylesheet" href="Home.css">
    
    <?php if($insertmessage){ ?>
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                var insertMessage = <?php echo json_encode($insertmessage); ?>;
                var message = insertMessage;
                
                if(message){
                    var messageDiv = document.createElement("div");
                    messageDiv.style.backgroundColor = "rgb(211, 178, 95)";
                    messageDiv.style.color = "white";
                    messageDiv.style.textAlign = "center";
                    messageDiv.style.position = "fixed";
                    messageDiv.style.top = "0";
                    messageDiv.style.left = "50%";
                    messageDiv.style.transform = "translateX(-50%)";
                    messageDiv.style.width = "15%";
                    messageDiv.style.borderRadius = "5px";
                    messageDiv.style.padding = "10px";
                    messageDiv.innerHTML = message;

                    document.body.appendChild(messageDiv);

                    setTimeout(function(){
                        messageDiv.remove();
                    }, 5000);
                }
            });

            function confirmDelete(libri){
                var confirmDelete = confirm("Are you sure you want to delete the book: " + libri + "?");

                if(confirmDelete){
                    alert("Book: " + libri + " was deleted by " + '<?php echo $_SESSION['username']; ?>');
                }
                else{
                    alert("Libri: " + libri +" nuk u fshi");
                    return false;
                }
            }
        </script>
    <?php } ?>
    <style>
    @media(min-width: 768px){
        .news{
            margin-left: -4px;
        }
        .dash{
            margin-left: -10px;
        }
    }
    </style>

</head>
<body>
    <header class="h1" style="height: 90px;">
        <div class="logo">
            <img src="logoo.png" alt="logo" height="65px">
        </div>

        <ul>
            <li><a href="#top">Home</a></li>
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
            <li><a href="Dashboard.php" class="dash"><?php echo $hide?></a></li>
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
        <div class="bgphoto">
            <input type="text" placeholder="Search" style="height: 20px;">
            <button  style="width: 50px; height: 25px; background-color: rgb(65, 34, 52); border: inset 0px; border-radius: 4px; margin-left: 3px;"><img src="search.jpg" alt="" height="25px"></button>
        </div>

        <div class="BestSellers">
            <p style="font-size: larger; font-weight: bolder; text-decoration: underline;">Best Sellers</p>
        </div>

        <div class="photos">
            <?php foreach($librat as $libri){ ?>
                <div class="container">
                    <img src="<?php echo $libri['ImagePath']; ?>" alt="" class="img">
                    <div class="info">
                        <p style="font-size: 25px; font-weight: bold;"><?php echo $libri['Libri']; ?></p>
                        <p><?php echo $libri['Autori']; ?></p>
                        <p class="p"><?php echo $libri['Cmimi']; ?>$</p>
                    </div>
                    <div style="text-align: center;">
                        <?php if($_SESSION['role']=='admin'){ ?>
                            <form action="DeleteBook-Home.php" method="post">
                                <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                                <button class="blej" onclick="return confirmDelete('<?php echo $libri['Libri']; ?>')" style="font-family: 'Times New Roman', Times, serif; width: 40%; height: 35px">Delete</button>
                            </form>
                        <?php } ?>
                        
                        <?php if($_SESSION['role']=='user'){ ?>
                        <form action="ShtoNeShporte-Home.php" method="post">
                            <input type="hidden" name="libri" value="<?php echo $libri['Libri']; ?>">
                            <button type="submit" class="blej" style="font-family: 'Times New Roman', Times, serif;">Shto ne Shporte</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="blej" style="font-family: 'Times New Roman', Times, serif; margin-left: 29.5vw; width: 40%; <?php echo $_SESSION['role'] !== 'admin' ? 'display: none;' : ''; ?>" onclick="window.location.href='AddBook-Home.php'">Add a Book</button>

        <footer>
            <div class="f">
                <div class="footerleft">
                    <h2 style="color: rgb(211, 178, 95);">Contact Us</h2>
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
<?php
}
?>
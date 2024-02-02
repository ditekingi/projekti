<?php
session_start();
include_once('NewsRepository.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $emri = $_POST['Eventi'];
    $dita = $_POST['Dita'];
    $muaji = $_POST['Muaji'];
    $viti = $_POST['Viti'];
    $ora = $_POST['Ora'];
    
    $event = new Libri($emri,$dita,$muaji,$viti,$ora);
    $nrep = new NewsRepository();
    $nrep->insertLibri($event);
}

$insertmessage = isset($_SESSION['insertmessage']) ? $_SESSION['insertmessage'] : "";
unset($_SESSION['insertmessage']);

$newsRepo = new NewsRepository();
$events = $newsRepo->getAllEventet();

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    <title>News</title>
    <link rel="stylesheet" href="News.css">

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

            function confirmDelete(Eventi){
                var confirmDelete = confirm("Are you sure you want to delete the book: " + Eventi + "?");

                if (confirmDelete){
                    alert("Book: " + Eventi + " was deleted by " + '<?php echo $_SESSION['username']; ?>');
                }
                else{
                    alert("Libri: " + Eventi +" nuk u fshi");
                    return false;
                }
            }
        </script>
    <?php } ?>

    <style>
    @media(min-width: 768px){
        h2{
            margin-left: 70px;
            margin-top: 40px;
            color: rgb(65, 34, 52);
        }
        .book{
            margin-left: -9px;
            margin-right: -9px;
        }
        .news{
            margin-left: -4px;
            margin-right: 5px;
        }
        .dash{
            margin-left: -10px;
        }
        .eventi{
            font-size: 25px;
        }
        .ora{
            font-size: 20px;
        }
        .add{
            font-family: garamond;
            border-color: rgb(65, 34, 52);
            height: 45px;
            width: 180px;
            background-color: rgb(65, 34, 52);
            box-shadow: 2px 2px 8px #111;
            border-radius: 40px;
            font-size:16px;
            color: rgb(211, 178, 95);
            font-weight: 600;
            margin-left: 29.5vw;
            width: 40%;
        }
        .data{
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
            <li><a href="Books.php" class="book">Books</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="#top" class="news" style="margin-right: 5px;">News</a></li>
            <li><a href="Dashboard.php" class="dash"><?php echo $hide?></a></li>
            <button class="b"><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></button>
            <li>/</li>
            <button class="b"><a style="text-decoration: none; color: black;" href="SignUp.php">Sign Up</a></button>
        </ul>
    </header>

    <main>
        <div class="news">
            

            <h2>Evente</h2>
            <?php foreach($events as $event){ ?>
                <div class="event">
                    <div class="info">
                        <div class="data" style="font-size: 25px;">
                            <p><?= $event['Dita'] ?></p>
                            <p><?= $event['Muaji'] ?></p>
                            <p style="margin-bottom: 25px;"><?= $event['Viti'] ?></p>
                        </div>
                        <div class="lajme">
                            <p class="eventi"><?= $event['Eventi'] ?></p>
                            <p class="ora">Ora: <?= $event['Ora'] ?></p>
                            <p class="libraria">Libraria Bibliopolium</p>
                        </div>

                        <?php if($_SESSION['role'] == 'admin'){ ?>
                            <form method="POST" action="DeleteEvent.php" style="display: inline;">
                                <input type="hidden" name="eventi" value="<?= $event['Eventi'] ?>">
                                <button type="submit" onclick="return confirmDelete('<?php echo $event['Eventi']; ?>')" class="delete">Delete</button>
                            </form>
                        <?php } ?>

                        <?php if($_SESSION['role'] == 'user'){ ?>
                        <button class="meShume" style="font-family: 'Times New Roman', Times, serif;"><input type="checkbox">Attending</button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <button class="add" style="border: solid; font-family: 'Times New Roman', Times, serif;<?php echo $_SESSION['role'] !== 'admin' ? 'display: none;' : ''; ?>" onclick="window.location.href='AddEvent.php'">Add an Event</button>
        </div>
        <footer>
            <div class="f">
                <div class="footerleft">
                    <h2><a style="color: rgb(211, 178, 95);" href="Kontakti.php">Contact Us</a></h2>
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

<?php
}
?>
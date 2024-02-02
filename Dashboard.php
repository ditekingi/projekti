<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">

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
            <li><a href="#top" class="dash">Dashboard</a></li>
            <button class="b"><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></button>
            <li>/</li>
            <button class="b"><a style="text-decoration: none; color: black;" href="SignUp.php">Sign Up</a></button>
        </ul>
    </header>
    
    <main>
        <h2>User Dashboard</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('DatabaseConnection.php');
                include_once('UserRepository.php');

                $urep = new UserRepository();
                $users = $urep->getAllUsers();

                foreach($users as $user){
                    echo "<tr>";
                    echo "<td>{$user['Emri']}</td>";
                    echo "<td>{$user['Mbiemri']}</td>";
                    echo "<td>{$user['Email']}</td>";
                    echo "<td>{$user['Username']}</td>";
                    echo "<td>{$user['Pass']}</td>";
                    echo "<td>{$user['Roli']}</td>";
                    echo "<td><a href='EditUser.php?email={$user['Email']}' style='text-decoration: none; color: rgb(65, 34, 52)'>Edit</a></td>";
                    echo "<td><a href='DeleteUser.php?email={$user['Email']}' style='text-decoration: none; color: rgb(65, 34, 52)'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 style="margin-top: 10vh;">User Messages</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('DatabaseConnection.php');
                include_once('KontaktiRepository.php');

                $krep = new KontaktiRepository();
                $messages = $krep->getAllMesazhi();

                foreach($messages as $message){
                    echo "<tr>";
                    echo "<td>{$message['AddedBy']}</td>";
                    echo "<td>{$message['Mesazhi']}</td>";
                    echo "<td><a href='DeleteMesazhi.php?mesazhi={$message['Mesazhi']}' style='text-decoration: none; color: rgb(65, 34, 52)'>Delete</a></td>";
                    echo "</tr>";    
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
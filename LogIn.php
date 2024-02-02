<?php

include_once 'UserRepository.php';
include_once 'DatabaseConnection.php';

if(isset($_POST['loginbtn'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Please fill the required fields!</div>";
    }
    else{
        $username = $_POST['username'];
        $password = $_POST['password'];


        $urep = new UserRepository();
        $user = $urep->getUserByUsername($username);

        if($user){
            if($_POST['password'] == $user['Pass']){
                session_start();
                $_SESSION['username'] = $user['Username'];
                $_SESSION['role'] = $user['Roli'];
        
                header("location: Home.php");
                exit();
            }
            else{
                echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Invalid password!</div>";
            }
        }
        else{
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Username not found!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="LogIn.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1 style="text-align: center;">Log In</h1>
             
            <div class="inputbox">
                <input type="text" placeholder="Username" name="username">
                <i class='bx bxs-user'></i>
            </div>

            <div class="inputbox">
                <input type="password" placeholder="Password" name="password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember">
                <label><input type="checkbox">Remember Me</label>
                <a href="#" style="color: rgb(211, 178, 95);">Forgot Password ?</a>
            </div>

            <input type="submit" name="loginbtn" value="Login" class="b1">

            <div class="register">
                <p>Don't have an account ?  <a href="SignUp.php">Sign Up</a></p>
            </div>
        </form>
    </div>
    
    <script>
    function validateForm(event) {
        event.preventDefault();

        const username = document.getElementsByName('username').value;
        const password = document.getElementsByName('password').value;
        
        var userRegex = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;

        if(username === "") {
            alert("Ju lutem plotesoni Username!");
            return false;
        }
        if(!userRegex.test(username)){
            alert("Ju lutem shkruani username valid");
            return false;
        }
        if (password === "") {
            alert("Ju lutem plotesoni Password!");
            return false;
        }
        if(password.length<8){
            alert("Password duhet te jete te pakten 8 karaktere");
            return false;
        }
        else{
            window.location.assign("Home.php");
        }
    }
    </script>
</body>
</html>
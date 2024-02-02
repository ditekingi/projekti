<?php
include_once 'Useri.php';
include_once 'UserRepository.php';
include_once 'DatabaseConnection.php';

if(isset($_POST['signupbtn'])){
    if(empty($_POST['emri']) || empty($_POST['mbiemri']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm'])){
        echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Please fill the required fields!</div>";
    }
    else{
        
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $roli = (rand(0, 1) == 0) ? 'user' : 'admin';

        $urep = new UserRepository();

        $userByEmail = $urep->getUserByEmail($email);
        $userByUsername = $urep->getUserByUsername($username);

        if($userByEmail){
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Email is already in use!</div>";
        }
        else if($userByUsername){
                echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Username is already in use!</div>";
        }
        else if(strlen($password) < 8 || strlen($password) > 12){
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95); z-index: 100;'>Password should be between 8 and 12 characters!</div>";
        }
        else if($password != $confirm){
            echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Passwords do not match!</div>";
        }
        else{

            $user = new Useri($emri, $mbiemri, $email, $username, $password, $roli);
            $urep->insertUser($user);
            header("location: LogIn.php");                
            exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="SignUp.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 style="text-align: center;">Sign Up</h1>
             

            <div class="inputbox">
                <input type="text" placeholder="Emri" name="emri">
                <i class='bx bxs-user'></i>
            </div>

            <div class="inputbox">
                <input type="text" placeholder="Mbiemri" name="mbiemri">
                <i class='bx bxs-user'></i>
            </div>

            <div class="inputbox">
                <input type="email" placeholder="Email" name="email">
                <i class='bx bx-envelope'></i>
            </div>

            <div class="inputbox">
                <input type="text" placeholder="Username" name="username">
                <i class='bx bxs-user'></i>
            </div>

            <div class="inputbox">
                <input type="password" placeholder="Password" name="password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="inputbox">
                <input type="password" placeholder="Confirm password" name="confirm">
            </div>

            <div class="remember">
                <label><input type="checkbox">  Remember Me</label>
            </div>

            <input type="submit" name="signupbtn" value="Sign Up" class="b1">

            <div class="login">
                <p>Already have an account ?  <a href="LogIn.php">Log In</a></p>
            </div>
        </form>
    </div>

    <script>
    function validateForm(event) {
        event.preventDefault();
        
        const emri = document.getElementByName('emri').value;
        const mbiemri = document.getElementByName('mbiemri').value;
        const email = document.getElementByName('email').value;
        const username = document.getElementByName('username').value;
        const password = document.getElementByName('password').value;
        const confirm = document.getElementByName('confirm').value;

        var nameRegex = /^[A-Z][a-z]*$/;
        var emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        var usernameRegex = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
        
        if(emri === "") {
            alert("Ju lutem plotesoni Emrin!");
            return false;
        }
        if(!nameRegex.test(emri)){
            alert("Ju lutem shkruani emer valid (Emri duhet te filloje me shkronje te madhe)!");
            return false;
        }

        if(mbiemri === "") {
            alert("Ju lutem plotesoni Mbiemrin!");
            return false;
        }
        if(!nameRegex.test(mbiemri)){
            alert("Ju lutem shkruani mbiemer valid (Mbiemri duhet te filloje me shkronje te madhe)!");
            return false;
        }
        if(email === "") {
            alert("Ju lutem plotesoni Email!");
            return false;
        }
        if(!emailRegex.test(email)){
            alert("Ju lutem shtoni nje email valide");
            return false;
        }

        if(username === ""){
            alert("Ju lutem plotesoni Username!");
            return false;
        }
        if(!usernameRegex.test(username)){
            alert("Ju lutem shtoni nje username valid");
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
        if (confirm === "") {
            alert("Ju lutem konfirmoni Password!");
            return false;
        }
        if(password !== confirm){
            alert("Passwords do not match!");
            return false;
        }
        else{
            window.location.assign("LogIn.php");
        }
    }
    </script>
</body>
</html>
<?php
    include_once('DatabaseConnection.php');

    class UserRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertUser($user){
            $conn = $this->connection;

            $name = $user->getEmri();
            $surname = $user->getMbiemri();
            $emaili = $user->getEmaili();
            $username = $user->getUsername();
            $pass=$user->getPassword();
            $roli = $user->getRoli();

            $sql = "INSERT INTO users(Emri,Mbiemri,Email,Username,Pass,Roli) VALUES (?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$name, $surname,$emaili,$username,$pass,$roli]);

            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllUsers(){
            $conn = $this->connection;

            $sql = "SELECT * FROM users";
            $statement = $conn->query($sql);

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }


        public function editUser($emri,$mbiemri,$username,$password,$roli,$email){
            $conn = $this->connection;
            $sql = "UPDATE users SET Emri=?, Mbiemri=?, Username=?, Pass=?, Roli=? WHERE Email=?";

            $statement = $conn->prepare($sql);
            $result = $statement->execute([$emri, $mbiemri, $username, $password, $roli, $email]);
            if ($result) {
                echo "Update successful!";
            } else {
                echo "Update failed: " . $statement->errorInfo();
            }
        }


        function deleteUser($email){
            $conn = $this->connection;

            $sql = "DELETE FROM users WHERE Email=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$email]);
        }

        function getUserByEmail($email){
            $conn = $this->connection;

            $sql = "SELECT * FROM users WHERE Email=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$email]);
            $user=$statement->fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        function getUserByUsername($username){
            $conn = $this->connection;

            $sql = "SELECT * FROM users WHERE Username=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$username]);
            $user=$statement->fetch(PDO::FETCH_ASSOC);

            return $user;
        }
    }
?>
<?php
    include_once('DatabaseConnection.php');

    class KontaktiRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertMesazhi($kontakt){
            $conn = $this->connection;

            $mesazhi = $kontakt->getMesazhi();
            $addedBy = $_SESSION['username'];

            $sql = "INSERT INTO Kontakti (Mesazhi,AddedBy) VALUES (?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$mesazhi,$addedBy]);

            $_SESSION['message'] = "Mesazhi u dergua me sukses!";
        }

        public function getAllMesazhi(){
            $conn = $this->connection;

            $sql = "SELECT * FROM Kontakti";
            $statement = $conn->query($sql);

            $kontakt = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $kontakt;
        }

        function deleteMesazhi($mesazhi){
            $conn = $this->connection;

            $sql = "DELETE FROM Kontakti WHERE Mesazhi=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$mesazhi]);
        }

        function getKontaktiByMesazhi($mesazhi){
            $conn = $this->connection;

            $sql = "SELECT * FROM Kontakti WHERE Mesazhi=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$mesazhi]);
            $kontakt=$statement->fetch(PDO::FETCH_ASSOC);

            return $kontakt;
        }
    }
?>
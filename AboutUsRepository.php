<?php
    include_once('DatabaseConnection.php');

    class AboutUsRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertTeksti($aboutus){
            $conn = $this->connection;

            $teksti = $aboutus->getTeksti();
            $addedBy = $_SESSION['username'];

            $sql = "INSERT INTO AboutUs (Teksti,AddedBy) VALUES (?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$teksti,$addedBy]);
        }

        public function getAllTeksti(){
            $conn = $this->connection;

            $sql = "SELECT * FROM AboutUs";
            $statement = $conn->query($sql);

            $aboutus = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $aboutus;
        }

        function deleteTeksti($teksti){
            $conn = $this->connection;

            $sql = "DELETE FROM AboutUs WHERE Teksti=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$teksti]);
        }

        function getAboutUsByTeksti($teksti){
            $conn = $this->connection;

            $sql = "SELECT * FROM AboutUs WHERE Teksti=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$teksti]);
            $aboutus=$statement->fetch(PDO::FETCH_ASSOC);

            return $aboutus;
        }
    }
?>
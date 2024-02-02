<?php
    include_once('DatabaseConnection.php');

    class NewsRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertEventi($eventi){
            $conn = $this->connection;

            $emri = $eventi->getEmri();
            $dita = $eventi->getDita();
            $muaji = $eventi->getMuaji();
            $viti = $eventi->getViti();
            $ora = $eventi->getOra();

            $addedBy = $_SESSION['username'];

            $sql = "INSERT INTO News (Eventi,Dita,Muaji,Viti,Ora,AddedBy) VALUES (?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri,$dita,$muaji,$viti,$ora,$addedBy]);

            $_SESSION['insertmessage'] = "Eventi: $emri u shtua nga $addedBy!";
        }

        public function getAllEventet(){
            $conn = $this->connection;

            $sql = "SELECT * FROM News";
            $statement = $conn->query($sql);

            $eventi = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $eventi;
        }

        function deleteEventi($emri){
            $conn = $this->connection;

            $sql = "DELETE FROM News WHERE Eventi=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri]);
        }

        function getNewsByEventi($emri){
            $conn = $this->connection;

            $sql = "SELECT * FROM News WHERE Eventi=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri]);
            $eventi=$statement->fetch(PDO::FETCH_ASSOC);

            return $eventi;
        }
    }
?>
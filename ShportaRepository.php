<?php
    include_once('DatabaseConnection.php');

    class ShportaRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function getAllBooksFromShporta(){
            $conn = $this->connection;

            $sql = "SELECT * FROM Shporta";
            $statement = $conn->query($sql);

            $books = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $books;
        }

        function deleteLibri($libri){
            $conn = $this->connection;

            $sql = "DELETE FROM Shporta WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
        }

        function getShportaByLibri($libri){
            $conn = $this->connection;

            $sql = "SELECT * FROM Shporta WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
            $shporta=$statement->fetch(PDO::FETCH_ASSOC);

            return $shporta;
        }
    }
?>
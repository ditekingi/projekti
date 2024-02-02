<?php
    include_once('DatabaseConnection.php');

    class BookRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertLibri($book){
            $conn = $this->connection;

            $libri = $book->getLibri();
            $cmimi = $book->getCmimi();
            $autori = $book->getAutori();
            $imagePath = $book->getImage();
            $category = $book->getCategory();

            $addedBy = $_SESSION['username'];

            $sql = "INSERT INTO LibriBooks (Libri,Cmimi,Autori,ImagePath,Category,AddedBy) VALUES (?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri,$cmimi,$autori,$imagePath,$category,$addedBy]);

            $_SESSION['insertmessage'] = "Libri: $libri u shtua nga $addedBy!";
        }

        public function insertLibriIntoShporta($libriId){
            $conn = $this->connection;
    
            $sql = "INSERT INTO Shporta (Libri, Cmimi, Autori, ImagePath) 
                    SELECT Libri, Cmimi, Autori, ImagePath FROM LibriBooks WHERE Libri = ?";

            try{
                $statement = $conn->prepare($sql);
                $statement->execute([$libriId]);
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        public function getAllBooks(){
            $conn = $this->connection;

            $sql = "SELECT * FROM LibriBooks";
            $statement = $conn->query($sql);

            $book = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $book;
        }

        function deleteBooks($libri){
            $conn = $this->connection;

            $sql = "DELETE FROM LibriBooks WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
        }

        function getBooksByLibri($libri){
            $conn = $this->connection;

            $sql = "SELECT * FROM LibriBooks WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
            $book=$statement->fetch(PDO::FETCH_ASSOC);

            return $book;
        }

    }
?>
<?php
    include_once('DatabaseConnection.php');

    class HomeRepository{
        private $connection;

        public function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        public function insertLibri($home){
            $conn = $this->connection;

            $libri = $home->getLibri();
            $cmimi = $home->getCmimi();
            $autori = $home->getAutori();
            $imagePath = $home->getImage();

            $addedBy = $_SESSION['username'];

            $sql = "INSERT INTO Home (Libri,Cmimi,Autori,ImagePath,AddedBy) VALUES (?,?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri,$cmimi,$autori,$imagePath,$addedBy]);

            $_SESSION['insertmessage'] = "Libri: $libri u shtua nga $addedBy!";
        }

        public function getAllBooks(){
            $conn = $this->connection;

            $sql = "SELECT * FROM Home";
            $statement = $conn->query($sql);

            $home = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $home;
        }


        function deleteHome($libri){
            $conn = $this->connection;

            $sql = "DELETE FROM Home WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
        }

        public function insertLibriIntoShporta($libri) {
            $conn = $this->connection;
    
            // Assuming your Shporta table has columns 'Libri', 'Cmimi', 'Autori', 'ImagePath'
            $sql = "INSERT INTO Shporta (Libri, Cmimi, Autori, ImagePath) 
                    SELECT Libri, Cmimi, Autori, ImagePath FROM Home WHERE Libri = ?";

            try{
                $statement = $conn->prepare($sql);
                $statement->execute([$libri]);
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        function getHomeByLibri($libri){
            $conn = $this->connection;

            $sql = "SELECT * FROM Home WHERE Libri=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$libri]);
            $home=$statement->fetch(PDO::FETCH_ASSOC);

            return $home;
        }
    }
?>
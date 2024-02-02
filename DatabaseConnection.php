<?php
class DatabaseConnection{
    private $host = "localhost";
    private $dbname = "Libraria";
    private $username = "root";
    private $password = "";

    function startConnection(){
        try{
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(!$conn){
                // echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Connection failed</div>";
                return null;
            }
            else{
                // echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Connection successful</div>";
                return $conn;
            }
        }
        catch(PDOException $e){
            // echo "<div style='color: white; font-weight: bold; text-align: center; position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 15%; border-radius: 5px; padding: 10px; background-color: rgb(211,178,95);'>Connection failed</div>".$e->getMessage();
            return null;
        }
    }
}
?>
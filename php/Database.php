<?php
class Database{
    private $host = "127.0.0.1";
    private $username = "s1965919";
    private $password = "ICTPass1670";
    private $database = "d1965919";

    private $db;
    private $error;
    private $stmt;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $options = array(PDO::ATTR_PERSISTENT => true,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        // Create PDO instance
        try {
            $this->db = new PDO($dsn, $this->username, $this->password, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function query($sql){
        $this->stmt = $this->db->prepare($sql);
        $this->stmt->execute();
    }
    public function execute(){
        return $this->stmt->execute();
    }
  
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

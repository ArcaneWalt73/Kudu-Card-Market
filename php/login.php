<?php
session_start();
class Database {

    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'd1965919';

    private $db;
    private $stmt;
    private $testPassword;
    private $testUser;
    private $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->db = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql){
        $this->stmt = $this->db->prepare($sql);
        $this->execute();
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
class login{
    private $studentNo;
    private $password1;
    private $database;
    public function __construct($stud, $pass){
        $this->studentNo = $stud;
        $this->password1 = $pass;
        $this->database = new Database;
    }

    public function getAllTasks() {
        $this->database->query('SELECT PASSWORD FROM STUDENTS where STUDENT_NO='.$this->studentNo);
        $results = $this->database->resultSet();
        return $results;
    }

    public function doLogin(){
        if ($result = $this->getAllTasks()){
            $hashed = $result[0]['PASSWORD'];
            if(!empty($this->password1) && password_verify($this->password1,$hashed)){
                $_SESSION['login_user'] = $this->studentNo;
                return true;
            }
            else{
                //header("location: ../homepage.php");
                return false; // wrong password
            }
        }
        return false; // account does not exist
    }
}
?>

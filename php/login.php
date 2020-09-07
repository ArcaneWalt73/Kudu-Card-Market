<?php
session_start();
class Database{
    private $username = "root";
    private $password = "";
    private $database = "d1965919";

    private $db;
    private $stmt;

    public function __construct(){
        $this->db = new mysqli('127.0.0.1',$this->username,$this->password,$this->database);
        $sql = "create table STUDENTS(STUDENT_NO varchar,PASSWORD varchar)";
        $this->db->query($sql);
        $testPassword = password_hash("123",PASSWORD_DEFAULT);
        $sql1 = "insert into STUDENTS values('1234','$testPassword')";
        $this->db->query($sql1);
    }
    public function query($stud){
        $this->stmt = $this->db->prepare("select PASSWORD from STUDENTS where STUDENT_NO=?");
        $this->stmt->bind_param("s",$stud);
        $this->stmt->execute();
        $this->db->close();
    }
    public function execute(){
        return $this->stmt->execute();
    }
  
    public function resultSet(){
        $result = $this->execute();
        return $result->fetchAll(MYSQLI_ASSOC);
  
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
        $this->database->query($this->studentNo);
        $results = $this->database->resultSet();
        return $results;
    }

    public function doLogin(){
        if ($result = $this->getAllTasks()){
            $hashed = $result[0];
            if(!empty($pass) && password_verify($pass,$hashed)){
                $_SESSION['login_user'] = $stdNo;
                mysql_close($link);
                return true;
            }
            else{
                //header("location: ../homepage.php");
                mysqli_close($link);
                return false; // wrong password
            }
        }
        mysql_close($link);
        return false; // account does not exist
    }
}
?>

<?php
class Database1 {

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
        $this->db = new PDO($dsn, $this->user, $this->pass, $options);
    }

    public function query($sql){
        try{
            $this->stmt = $this->db->exec($sql);
        }catch(PDOException $e){
            $this->stmt = -1;
        }
    }

    public function resultSet(){
        return $this->stmt;

    }
}
class register{
    private $studentNo;
    private $fname;
    private $lname;
    private $password1;
    private $email;
    private $cellNo;
    private $database;
    private $statement;
    public function __construct($stud, $fname, $lname, $pass, $email, $cellNo){
        $this->studentNo = $stud;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->password1 = password_hash($pass,PASSWORD_DEFAULT);
        $this->email = $email;
        $this->cellNo = $cellNo;
        $this->database = new Database1;
    }

    public function getAllTasks() {
        $this->statement = "INSERT INTO `STUDENTS` (`STUDENT_NO`, `FNAME`, `LNAME`, `PASSWORD`, `EMAIL_ADDRESS`, `CONTACT_NO`) VALUES('$this->studentNo', '$this->fname', '$this->lname', '$this->password1', '$this->email', '$this->cellNo')";
        $this->database->query($this->statement);
        $results = $this->database->resultSet();
        return $results;
    }

    public function doRegister(){
        if($this->getAllTasks()==1){
            return true;
        }else{
            return false;
        }
    }
}
/*
$user = new register($_POST["studentNumber"],$_POST["fname"],$_POST["lname"],$_POST["password"],$_POST["email"],$_POST["contact"]);
if($user->doRegister()){
	echo '<script>
	alert("Account successfully created");
	window.location.href = "../index.php";
	</script>';
}else{
	echo '<script>
	alert("Could not create an account");
	window.location.href = "../index.php"
	</script>';
}*/
?>

<?php
session_start();
class login{
    public $studentNo;
    public $password1;
    private $database;
    public function __construct($stud, $pass){
        $this->studentNo = $stud;
        $this->password1 = $pass;
        $this->database = new Database;
    }

    public function getAllTasks() {
        $this->database->query('select PASSWORD from STUDENTS where STUDENT_NO='.$this->studentNo);
        $results = $this->database->resultSet();
        return $results;
    }

    public function doLogin(){
        if($result = $this->getAllTasks()){
            $hashed = $result[0]["PASSWORD"];
            $pass = $this->password1;
            if(!empty($pass) && password_verify($pass,$hashed)){
                $_SESSION['login_user'] = $this->studentNo;
                return true; //success
            }
            else if(!empty($pass) && !password_verify($pass,$hashed)){
                return false; //wrong password
            }
        }
        return false; //the username does not exist

    }
}

/*$user = new login($_POST["studentNumber"],$_POST["password"]);
$var = $user->doLogin();
if($user->doLogin()){
    header('location: ../homepage.php');
}
else{
    header('location: ../index.php');
}*/
?>

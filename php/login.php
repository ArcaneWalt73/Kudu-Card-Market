<?php
class login{
    private $studentNo;
    private $password1;
    public function __construct($stud, $pass){
        $this->studentNo = $stud;
        $this->password1 = $pass;
    }

    public function doLogin(){
        $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        $link = mysqli_connect('127.0.0.1', $username, $password, $database);
        $stdNo = mysqli_real_escape_string($link,$this->studentNo);
        $pass = mysqli_real_escape_string($link,$this->password1);
        session_start();
        if ($result = mysqli_query($link, "select PASSWORD from STUDENTS where STUDENT_NO='$stdNo';")){
            $hashed = $result->fetch_assoc()['PASSWORD'];
            if(!empty($pass) && password_verify($pass,$hashed)){
                $_SESSION['login_user'] = $stdNo;
                mysql_close($link);
                return true; //success
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
$user = new login($_POST["studentNumber"],$_POST["password"]);
if($user->doLogin()){
    header('location: ../homepage.php');
}
else{
    header('location: ../index.php');
}
?>

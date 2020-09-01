<?php

$studentNo = mysqli_real_escape_string($link,$_POST["studentNumber"]);
$password1 = mysqli_real_escape_string($link,$_POST["password"]);

function doLogin($stdNo, $pass){
    $username = "s1965919";
    $password = "ICTPass1670";
    $database = "d1965919";
    $link = mysqli_connect('127.0.0.1', $username, $password, $database);
    session_start();
    if ($result = mysqli_query($link, "select PASSWORD from STUDENTS where STUDENT_NO='$stdNo';")){
        $hashed = $result->fetch_assoc()['PASSWORD'];
        if(!empty($pass) && password_verify($pass,$hashed)){
            $_SESSION['login_user'] = $stdNo;
        }
        header("location: ../homepage.php");
        mysqli_close($link);
    }
}
doLogin($studentNo, $password1);
?>

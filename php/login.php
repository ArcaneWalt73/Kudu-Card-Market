<?php
session_start();

$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect('127.0.0.1', $username, $password, $database);
$studentNo = mysqli_real_escape_string($link,$_POST["studentNumber"]);
$password1 = mysqli_real_escape_string($link,$_POST["password"]);

if ($result = mysqli_query($link, "select PASSWORD from STUDENTS where STUDENT_NO='$studentNo';")){
    $hashed = $result->fetch_assoc()['PASSWORD'];
    if(!empty($password1) && password_verify($password1,$hashed)){
        $_SESSION['login_user'] = $studentNo;
    }
    header("location: homepage.php");
    mysqli_close($link);
}
?>

<?php
session_start();

$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect('127.0.0.1', $username, $password, $database);
$studentNo = mysqli_real_escape_string($link,$_POST["studentNumber"]);
$Fname = mysqli_real_escape_string($link,$_POST["fname"]);
$Lname = mysqli_real_escape_string($link,$_POST["lname"]);
$email = mysqli_real_escape_string($link,$_POST["email"]);
$contact = mysqli_real_escape_string($link,$_POST["contact"]);
$password1 = mysqli_real_escape_string($link,$_POST["password"]);
$hash = password_hash($password1,PASSWORD_DEFAULT);

if ($result = mysqli_query($link, "insert into STUDENTS values('$studentNo','$Fname','$Lname','$hash','$email','$contact');")){
    header("location: ../index.html");
}
else if(mysqli_num_rows(mysqli_query($link,"select STUDENT_NO from STUDENTS where STUDENT_NO='$studentNo';"))==1){
    //direct the user to create account since this studentNo already exists in the database
    $message = "the username already exists";
}else{
    //direct the user to create account since the email already exists in the database
    $message = "there is an account with this email";
}
mysqli_close($link);
?>
<html>
   <body>
      <h1>
         <?php
            echo json_encode($message);
         ?>
      </h1>
   </body>

</html>

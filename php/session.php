<?php
   session_start();
   //check if a specific logged in successfully
   $user_check = $_SESSION['login_user'];
   /*
   use $_SESSION to store info of the user logging, i.e. name, balance...
   */
  $username = "s1965919";
  $password = "ICTPass1670";
  $database = "d1965919";
   $link = mysqli_connect('127.0.0.1', $username, $password, $database);

   $session_sql = mysqli_query($link,"select* from STUDENTS where STUDENT_NO = '$user_check' ");

   $row = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);

   $login_session = $row['STUDENT_NO'];

   //if the user was unable to login
   if(!isset($_SESSION['login_user'])){
      //redirect to login
      header("location: ../index.html");
      die();
   }
?>

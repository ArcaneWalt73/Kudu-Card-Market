<?php
   function getBalance(){
     $user_check = $_SESSION['login_user'];
     $username = "root";
     $password = "";
     $database = "d1965919";
     $link = mysqli_connect('127.0.0.1', $username, $password, $database);

     $session_sql = mysqli_query($link,"SELECT KUDU_BUCKS FROM `STUDENTS` WHERE STUDENT_NO = '$user_check' ");

     $row = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);

     $login_balance = $row['KUDU_BUCKS'];
     return $login_balance;
  }
?>

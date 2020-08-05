<?php
$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$studentNo = $_POST["studentNumber"];

if ($result = mysqli_query($link, "select PP_URL from STUDENTS where STUDENT_NO ='$studentNo'"));


echo json_encode($result);
mysqli_close($link); 


?>

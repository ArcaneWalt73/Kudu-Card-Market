<?php
$username =  "s1965919"; //The username for the database
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$output = array();
$studentNo = $_POST["studentNumber"]; //The username of the person who is trying to login
$password1 = $_POST["password"];

if ($result = mysqli_query($link, "select* from USERS where USERS_STUDENT_NO='$studentNo';")){
	$data = $result->fetch_assoc();
	$hashed = $data['USERS_PASSWORD'];
	if(!(empty($password1)) && password_verify($password1,$hashed)){ //check if the pasword is correct
		$credit = mysqli_query($link, "select KUDU_BUCKS from CREDIT where STUDENT_NO='$studentNo';"); // fetch the credit
		array_push($output,$data,$credit->fetch_assoc());
		echo json_encode($output);
	}
	else{ //the password is incorrect
		echo json_encode("false");
	}
	mysqli_close($link);
}
?>

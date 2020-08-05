<?php
$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$output = array();
$studentNo = $_POST["studentID"]; // The username of the person who is trying to buy;
$itemID = $_POST["itemID"];
$amount = $_POST["productAmount"];


if ($result = mysqli_query($link, "select KUDU_BUCKS from STUDENTS where STUDENT_NO='$studentNo';")){
	$row = mysqli_fetch_array($result);
	if ($row['KUDU_BUCKS'] >= $amount) {
		$current_Amount = $row['KUDU_BUCKS'] - $amount; // the amount after payments
		if(mysqli_query($link,"update STUDENTS set KUDU_BUCKS='$current_Amount' where STUDENT_NO='$studentNo';")){
			$date = date("Y-m-d");
			if(mysqli_query($link, "insert into PURCHASES(STUDENT_NO, MARKET_ID, PURCHASE_DATE) values('$studentNo', '$itemID', CURRENT_DATE);"))
				echo json_encode($current_Amount);
			else 
				echo "false 1";
		}
		else
			echo "false 2";
	}
	else
		echo "false 3";
	mysqli_close($link);
}

?>

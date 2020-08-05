<?php
$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$output = array();
$rate = $_POST["numberStars"];
$id = $_POST["itemId"]; // id of the item


$sql = "select * from RATINGS where MARKET_ID = '$id';";
if ($result = mysqli_query($link, $sql)) {
	$data = $result->fetch_assoc();
	$count = $data['RATING_COUNT'];

	if (true) {
		if (empty($count)) {
			$sql = "insert into RATINGS values ('$id', 1, '$rate');";
			if (mysqli_query($link, $sql)) {
				$response['RATING'] = "true";
				$response['VALUE'] = "$rate";
			}
			else {
				$response['RATING'] = "false";
				$response['VALUE'] = "$rate";
			}
			echo json_encode($response);
		}
		else {
			$oldRate = $data['RATING'];
			$newRate = ($oldRate * $count + $rate) / ($count + 1);
			$count = $count + 1;
			$sql = "update RATINGS set RATING_COUNT='$count', RATING='$newRate' where MARKET_ID='$id';";
			
			if (mysqli_query($link, $sql)) {
				$response['RATING'] = "true";
				$response['VALUE'] = "$newRate";
			}
			else {
				$response['RATING'] = "false";
				$response['VALUE'] = "$newRate";
			}
			echo json_encode($response);
		}
	}
}

mysqli_close($link);
?>

<?php
$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$output = array(); //stores all the items from different catogories

if ($result = mysqli_query($link, "select * from MARKET_NEW")) {
	
	while ($row = $result->fetch_assoc()) {
		$itemId = $row['MARKET_ID'];
		$r1 = mysqli_query($link, "select RATING from RATINGS where MARKET_ID='$itemId'");
		$data = $r1->fetch_assoc();
		//$rating = $data['RATING'];
		if (isset($data['RATING']))
			$row['RATING'] = $data['RATING'];
		else
			$row['RATING'] = 0;
		$output[] = $row;
	}
	echo json_encode($output);
}
else
	echo json_encode("failed");

function getMarketItems($link) {
	if ($result = mysqli_query($link, "select * from MARKET_NEW")) {
		while ($row = $result->fetch_assoc()) {
			$itemId = $row['MARKET_ID'];
			$r1 = mysqli_query($link, "select RATING from RATINGS where MARKET_ID='$itemId'");
			$data = $r1->fetch_assoc();
			$rating = $data['RATING'];
			if (empty($rating))
				$row['RATING'] = 0;
			else
				$row['RATING'] = $rating;
			$output[] = $row;
		}
		return json_encode($output);
	}
	else
		return json_encode("failed");

}

mysqli_close($link);
?>

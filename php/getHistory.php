<?php
	session_start();

	$username = "s1965919";
	$password = "ICTPass1670";
	$database = "d1965919";
	$link = mysqli_connect("127.0.0.1", $username, $password, $database);
	$output = array(); //stores all the items from different catogories
	$output1 = array();
	$output2 = array();

	function getMarketIds($pdo, $studentNo)
	{
		$sql = "select MARKET_ID, PURCHASE_DATE from PURCHASES where STUDENT_NO='$studentNo';"
		$res = $this->pdo->query($sql);
		
		return $res->fetchColumn();
	}

	function getUserHistory($link, $studentNo) {
		$sql = "select MARKET_ID, PURCHASE_DATE from PURCHASES where STUDENT_NO='$studentNo';";
		if ($pResult = mysqli_query($link, $sql)) {
			$length = 0;
			while ($row = $pResult->fetch_assoc()) {
				$output1[] = $row;
				++$length;
			}

			for ($x = 0; $x < $length; $x++) {
				$data = $output1[$x]['MARKET_ID'];
				$date = $output1[$x]['PURCHASE_DATE'];
				if ($mResult = mysqli_query($link, "select * from MARKET_NEW where MARKET_ID='$data';")) {
					while ($row = $mResult->fetch_assoc()) {
						$output2[] = $row;
						//array_push($output2, $date)
					}
				}
				else
					return null;
			}

			array_push($output, $output1, $output2);
			echo json_encode($output);
		}
		else
			return null;
	}

	
	

		
	$studentNo = $_SESSION['login_user'];
	if ($pResult = mysqli_query($link, "select MARKET_ID, PURCHASE_DATE from PURCHASES where STUDENT_NO='$studentNo';")) {
	$length = 0;
	while ($row = $pResult->fetch_assoc()) {
	$output1[] = $row;
	++$length;
	}
	
	for ($x = 0; $x < $length; $x++) {
	$data = $output1[$x]['MARKET_ID'];
	$date = $output1[$x]['PURCHASE_DATE'];
	if ($mResult = mysqli_query($link, "select * from MARKET_NEW where MARKET_ID='$data';")) {
	while ($row = $mResult->fetch_assoc()) {
	$output2[] = $row;
	//array_push($output2, $date)
	}
	}
	}
	array_push($output, $output1, $output2);
	echo json_encode($output);
	}
	else
	echo "failed";
	
	/*
	if ($result = mysqli_query($link, "select * from MARKET_NEW")) {
	while ($row = $result->fetch_assoc()) {
	$output[] = $row;
	}
	echo json_encode($output);
	}
	else
	echo json_encode("failed");*/
	mysqli_close($link);
	?>

<?php

function getPurchases(PDO $pdo, $studentNo)
{
	$sql = "select * from PURCHASES where STUDENT_NO='$studentNo';";
	$stmt = $pdo->query($sql);

	return $stmt->fetchColumn();
}

//gets the details of the items given Market_Id
function getItemDetails(PDO $pdo, $market_id)
{
	$sql = "select * from MARKET_NEW where MARKET_ID='$market_id';";
	$stmt = $pdo->query($sql);

	return $stmt->fetchColumn(2);
}

/*!!!!!!!!!!!!!!!!!!!UNCOMMENT THESE WHEN YOU NEED TO USE IT  FOR WEBSITE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	session_start();
	$username = "s1965919";
	$password = "ICTPass1670";
	$database = "d1965919";
	$link = mysqli_connect("127.0.0.1", $username, $password, $database);
	$output = array(); //stores all the items from different catogories
     	
	$studentNo = $_SESSION['login_user'];

	if ($pResult = mysqli_query($link, "select * from PURCHASES where STUDENT_NO='$studentNo';")) 
	{
		while ($row = $pResult->fetch_assoc()) 
		{
			$output[] = $row;
		}
     
		echo json_encode($output);
	}
	else
	     	echo json_encode("failed");*/
	?>

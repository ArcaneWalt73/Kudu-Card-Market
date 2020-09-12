<?php
/*
 * Function to retrieve an item's data when given the item's id
 */
function getItemInfo($link, $id){
	#echo $id;
       	$response = array();
	if ($result = mysqli_query($link, "select * from MARKET_NEW where MARKET_ID='$id'")) {
		$rating = mysqli_query($link, "select RATING from RATINGS where MARKET_ID='$id'");
		$data = $rating->fetch_assoc();
		$dataResult = $result->fetch_assoc();

	        //response array
        	$response['ID'] = $dataResult['MARKET_ID'];
		$response['NAME'] = $dataResult['NAME'];
		$response['URL'] = $dataResult['IMAGE_URL'];
		$response['PRICE'] = $dataResult['PRICE'];
		$response['CATEGORY'] = $dataResult['CATEGORY'];
		$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
        	$response['ERROR'] = false;
		return $response;
        }
       	$response['ERROR'] = true;
}

/*
 * Function to buy an Item
 */
function buyItem($link, $id, $studentID) {
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
	}

}

class HelperFunctions {
	private $link;

	function __construct() {
		$username = "s1965919";
		$password = "ICTPass1670";
		$database = "d1965919";
		$link = mysqli_connect("127.0.0.1", $username, $password, $database);
	}
	
	/*
	 * Function to retrieve an item's data when given the item's id
	 */
	function getItemInfo($id){
		#echo $id;
       		$response = array();
		if ($result = mysqli_query($link, "select * from MARKET_NEW where MARKET_ID='$id'")) {
			$rating = mysqli_query($link, "select RATING from RATINGS where MARKET_ID='$id'");
			$data = $rating->fetch_assoc();
			$dataResult = $result->fetch_assoc();

		        //response array
       		 	$response['ID'] = $dataResult['MARKET_ID'];
			$response['NAME'] = $dataResult['NAME'];
			$response['URL'] = $dataResult['IMAGE_URL'];
			$response['PRICE'] = $dataResult['PRICE'];
			$response['CATEGORY'] = $dataResult['CATEGORY'];
			$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
	        	$response['ERROR'] = false;
			return $response;
		}
       		$response['ERROR'] = true;
	}


	/*
	 * Function to buy an Item
	 */
	function buyItem($id, $studentID, $password) {
		if ($result = mysqli_query($link, "select KUDU_BUCKS, PASSWORD from STUDENTS where STUDENT_NO='$studentNo';")){
			$row = mysqli_fetch_array($result);
			if ($row['PASSWORD'])
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
		}
	}

	function removeItem($id) {

	}
}

?>

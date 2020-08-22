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

?>

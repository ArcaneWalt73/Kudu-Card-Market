<?php
$username =  "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
$category = $_POST["category"];
$itemName = $_POST["itemName"];
$itemPrice = $_POST["itemPrice"];
$expiryDate = $_POST["expiryDate"];

if ($category == 'food'){
	$id = 1;
	$result = mysqli_connect($link, "insert into FOOD(MARKET_ID,NAME,PRICE,EXPIRY_DATE) values($id,'$itemName',$itemPrice,$expiryDate)");
	echo json_encode($result);
}
else if($category == 'clothes'){
	$id = 2;
	$result = mysqli_connect($link, "insert into CLOTHES(MARKET_ID,NAME,PRICE) values($id,'$itemName',$itemPrice)");
        echo json_encode($result);
}

else if($category == 'events'){
	$id = 3;
	$result = mysqli_connect($link, "insert into EVENTS(MARKET_ID,NAME,PRICE) values($id,'$itemName',$itemPrice)");
        echo json_encode($result);
}
else if($category == 'stationary'){
	$id = 4;
	$result = mysqli_connect($link, "insert into STATIONARY(MARKET_ID,NAME,PRICE) values($id,'$itemName',$itemPrice)");
        echo json_encode($result);
}
mysqli_close($link);
?>


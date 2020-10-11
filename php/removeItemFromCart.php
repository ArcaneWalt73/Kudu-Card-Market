<?php
session_start();
require("helperFunctions.php");

function removeItemFromCart($id){
	$username = "root";
	$password = "";
	$database = "d1965919";
	$link = mysqli_connect("127.0.0.1", $username, $password, $database);

	$studentNo = $_SESSION['login_user'];

	$helper = new HelperFunctions;

	if($helper->removeFromCart($id, $studentNo) === 0){
			return "success";
	}
}
/*usage of this function
*if(isset($_POST["MARKET_ID"])) echo removeItemFromCart($_POST["MARKET_ID"]);
*/

<?php
session_start();
require("helperFunctions.php");
function getcartItems(){
	$studentNo = $_SESSION['login_user'];

	$helper = new HelperFunctions;

	$output = $helper->getCartItems($studentNo);
	return json_encode($output);
}
?>

	

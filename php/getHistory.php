<?php
session_start();
require_once("helperFunctions.php");

function getHistory(){
	$studentNo = $_SESSION['login_user'];
	$helper = new HelperFunctions;
		
	$output = $helper->getPurchHistory($studentNo);
	return json_encode($output);
}
?>

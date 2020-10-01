<?php
include("helperFunctions.php");

session_start();
$studentNo = $_SESSION['login_user'];

$helper = new HelperFunctions;

$output = $helper->getCartItems($studentNo);
echo json_encode($output);
?>

	

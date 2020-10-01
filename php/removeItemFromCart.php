<?php

include("helperFunctions.php");

session_start();
$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);

if(isset($_POST['MARKET_ID']))
{
	$id = $_POST['MARKET_ID'];
	$output = array(); //stores all the items from different catogories

	$studentNo = $_SESSION['login_user'];

	$helper = new HelperFunctions;

	if($helper->removeFromCart($id, $studentNo) === 0)
	{
		echo "success";
	}else
	{
		echo "failed";
	}
}else
{
	echo "didn't receive id";
}



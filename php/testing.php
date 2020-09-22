<?php
include "helperFunctions.php";

$helper = new HelperFunctions;
$response = $helper->getItemInfo(-1);
$r2 = $helper->getAllItems();
echo json_encode($response);
echo "Checkpoint: 1</br>";

$buy = $helper->buyItem(-1, '1234');
echo "Checkpoint 2 : </br>'$buy'";

echo json_encode($r2[0]);
#$helper = new HelperFunctions;


?>

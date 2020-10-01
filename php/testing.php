<?php
include "helperFunctions.php";

$helper = new HelperFunctions;
#$response = $helper->getItemInfo(-1);
$r2 = $helper->getAllItems();
#echo json_encode($response);
echo "Checkpoint: 1</br>";

$r = $helper->getItemInfo($r2[0]['ID']);
echo json_encode($r);

$buy = $helper->removeFromCart($r2[0]['ID'], '1234');
#$buy = $helper->removeItem($r2[0]['ID']);
echo "Checkpoint 2 : </br>'$buy'";

echo json_encode($r2[0]);
echo "</br>".$buy;

#$helper = new HelperFunctions;


?>

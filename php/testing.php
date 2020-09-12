<?php
include "helperFunctions.php";

$helper = new HelperFunctions;
$response = $helper->getItemInfo(22);
echo $response['ERROR'];
echo "Checkpoint: end</br>";

?>

<?php

class Database1 {

    private $host = '127.0.0.1';
    private $user = 's1965919';
    private $pass = 'ICTPass1670';
    private $dbname = 'd1965919';

    private $db;
    private $stmt;
    private $testPassword;
    private $testUser;
    private $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->db = new PDO($dsn, $this->user, $this->pass, $options);
    }

    public function query($sql){
        try{
            $this->stmt = $this->db->query($sql);
        }catch(PDOException $e){
	    $m = $e->getMessage();
#	    echo '</br>'.$m.'</br>';
            $this->stmt = -1;
        }
    }
    public function exec($sql) {
	try {
		$this->stmt = $this->db->exec($sql);
	}catch(PDOException $e){
	    $m = $e->getMessage();
#	    echo '</br>'.$m.'</br>';
            $this->stmt = -1;
        }
    }

    public function resultSet(){
        return $this->stmt;

    }

    public function close() {
	$this->stmt->closeCursor();
    }
}

class HelperFunctions {
	private $link;
	private $database;

	function __construct() {
		$this->database = new Database1;
	}
	
	/*
	 * Function to retrieve an item's data when given the item's id
	 */
	function getItemInfo($id){
		$response = array();
		$this->database->query( // Retrieve item info from database
			'SELECT * FROM `MARKET_NEW` WHERE MARKET_ID='.$id);
		$result = $this->database->resultSet();

		if ($result !== -1) {
			$this->database->query( // retrieve item rating from ratings table
				'SELECT * FROM RATINGS WHERE MARKET_ID='.$id);
			$rating = $this->database->resultSet();

			$data = $rating->fetch(PDO::FETCH_ASSOC);
			$dataResult = $result->fetch(PDO::FETCH_ASSOC);
			//response array
			if (!isset($dataResult['MARKET_ID'])) {
				$response['ERROR'] = true;
				return $response;
			}
			$response['ID'] = $dataResult['MARKET_ID'];
			$response['NAME'] = $dataResult['NAME'];
			$response['URL'] = $dataResult['IMAGE_URL'];
			$response['PRICE'] = $dataResult['PRICE'];
			$response['CATEGORY'] = $dataResult['CATEGORY'];
			$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
			$response['QTY'] = $dataResult['QTY'];
			$response['RATING'] = $data['RATING'];
			$response['REVIEW'] = $data['REVIEW'];
			$response['ERROR'] = false;
			return $response;
		} else
	       		$response['ERROR'] = true;
		return $response;
	}

	/*
	 * Function to retrieve an item's data from the cart
	 */
	function getItemInfoFromCart($id){
		$response = array();
		$this->database->query( // Retrieve item info from database
			'SELECT * FROM CART WHERE MARKET_ID='.$id.' LIMIT 1');
		$result = $this->database->resultSet();

		if ($result !== -1) {
			$dataResult = $result->fetch(PDO::FETCH_ASSOC);
			if (!isset($dataResult['MARKET_ID'])) {
				$response['ERROR'] = true;
				return $response;
			}
			//response array
			$response['ID'] = $dataResult['MARKET_ID'];
			$response['NAME'] = $dataResult['NAME'];
			$response['URL'] = $dataResult['IMAGE_URL'];
			$response['PRICE'] = $dataResult['PRICE'];
			$response['CATEGORY'] = $dataResult['CATEGORY'];
			$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
			$response['ERROR'] = false;
			return $response;
		} else
	       		$response['ERROR'] = true;
		return $response;
	}

	/*
	 * Function to retrieve all items from the marketplace;
	 */
	function getAllItems() {
		$this->database->query(
			"SELECT * FROM MARKET_NEW");
		$result = $this->database->resultSet();
		if ($result !== -1) {
			$this->database->query( // retrieve item rating from ratings table
				'SELECT * FROM RATINGS');
			$rating = $this->database->resultSet();

			$items = array();
			while ($dataResult = $result->fetch(PDO::FETCH_ASSOC)) {
				$data = $rating->fetch(PDO::FETCH_ASSOC);

				$response['ID'] = $dataResult['MARKET_ID'];
				$response['NAME'] = $dataResult['NAME'];
				$response['URL'] = $dataResult['IMAGE_URL'];
				$response['PRICE'] = $dataResult['PRICE'];
				$response['CATEGORY'] = $dataResult['CATEGORY'];
				$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
				$response['QTY'] = $dataResult['QTY'];
				$response['RATING'] = $data['RATING'];
				$response['REVIEW'] = $data['REVIEW'];

				$items[] = $response;
			}
			#echo json_encode($items);
			//response array
			return $items;
		}
		return -1;
	}

	/*
	 * Function to buy an Item
	 * Returns :
	 *		0 - Success
	 *		1 - Failed to record transation
	 *		2 - Failed to update new amount
	 *		3 - Insuffient Credit
	 *		4 - Item does not exit
	 */
	function buyItem($itemID, $studentNo) {
		$this->database->query( // Retrieve student credit points
			'SELECT KUDU_BUCKS FROM `STUDENTS` WHERE STUDENT_NO='.$studentNo);
		$result = $this->database->resultSet();

		if ($result !== -1) {
			$row = $result->fetch(PDO::FETCH_ASSOC);
		$this->database->query( // Retrieve item info
			'SELECT * FROM `MARKET_NEW` WHERE MARKET_ID='.$itemID);
		$itemResult = $this->database->resultSet();
		if ($itemResult !== -1) {
			$col = $itemResult->fetch(PDO::FETCH_ASSOC);
			$kudu = $row['KUDU_BUCKS'];

			$amount = $col['PRICE'];
			$qty = $col['QTY'];
        		
			$name = $col['NAME'];
			$url = $col['IMAGE_URL'];
			$price = $col['PRICE'];
			$cate = $col['CATEGORY'];
			$desc = $col['DESCRIPTION'];
        	
			if ($kudu >= $amount && $qty >= 1) {
				$current_Amount = $kudu - $amount; // the amount after payments
				$qty = $qty - 1;
				
				$this->database->exec(
					'UPDATE STUDENTS SET KUDU_BUCKS='.$current_Amount.' WHERE STUDENT_NO='.$studentNo);
				if($this->database->resultSet() !== 0){
					$this->database->exec(
						"INSERT INTO PURCHASES(
							STUDENT_NO, MARKET_ID, IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION, PURCHASE_DATE) 
						VALUES('$studentNo', '$itemID', '$url', '$name', '$price', '$cate', '$desc', CURRENT_DATE);");
					$purchaseResult = $this->database->resultSet();
					
					$this->database->exec(
						"UPDATE MARKET_NEW SET QTY='$qty' WHERE MARKET_ID='$itemID'");
					$qtyResult = $this->database->resultSet();
					if ($qty === 0)
						$this->removeItem($itemID);
					if($purchaseResult !== 0)
						return 0;
					else
						return 1;
				}
				else
					return 2;
			}
			else
				return 3;
		}
		else
			return 4;
		}
	}

	/*
	 * Function to delete an item from MARKET_NEW table;
	 * Returns : 
	 *	1 - Item is not in table;
	 *	0 - Success
	 */
	function removeItem($itemID) {
		$item = $this->getItemInfo($itemID);
		if ($item['ERROR'] == true)
			return 1;

		$id = $item['ID'];
		$name = $item['NAME'];
		$url = $item['URL'];
		$price = $item['PRICE'];
		$cate = $item['CATEGORY'];
		$desc = $item['DESCRIPTION'];
		$qty = $item['QTY'];

#		echo "	Sub-CheckPoint : 1</br>";
		if ($qty === 1) {
#			echo "	Sub-CheckPoint : 1.1 - $qty</br>";
			$this->database->exec(
				"DELETE FROM MARKET_NEW WHERE MARKET_ID='$itemID'");
			if ($this->database->resultSet() !== 0)
				return 0;
			else
				return 1;
		} else {
#			echo "	Sub-CheckPoint : 1.2 - $qty</br>";
			$qty -= 1;
			$this->database->exec(
				"UPDATE MARKET_NEW set QTY='$qty' where MARKET_ID='$itemID'");
#			echo "	Sub-CheckPoint : 1.3 - $qty</br>";
			if ($this->database->resultSet() !== 0)
				return 0;
			else
				return 1;
		}
	}

	/*
	 * Function to add an item to MARKET_NEW table;
	 * Returns : 
	 *	1 - Failed;
	 *	0 - Success
	 *
	public function addItemWithFile($name, $price, $cate, $desc, $file) {
		//getting file info from the request 
		$fileinfo = pathinfo($_FILES['image']['name']);
		//getting the file extension 
		$extension = $fileinfo['extension'];
		
		//file url to store in the database 
		$file_url = $upload_url . getFileName() . '.' . $extension;
		
		//file path to upload in the server 
		$file_path = $upload_path . getFileName() . '.'. $extension; 
		
		//saving the file 
		move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
		$sql = "INSERT INTO MARKET_NEW (IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION) VALUES ('$file_url', '$name', '$price', '$cate', '$desc');";
		//adding the path and name to database
		$this->database->exec($sql);
		$result = $this->database->resultSet();
		if($result !== 0){
			return 0;
		} else {
			return 1;
		}
	}

	function getFileName(){
		$sql = "SELECT max(MARKET_ID) as MARKET_ID FROM MARKET_NEW";
		$this->database->query($sql);
		$result = $this->database->resultSet();
		
		$row = $result->fetch(PDO::FETCH_ASSOC);
		if($row['MARKET_ID']==null)
			return 0; 
		else 
			return ++$row['MARKET_ID']; 
	}*/

	

	/*
	 * Function to add an item to MARKET_NEW table;
	 * Returns : 
	 *	1 - Failed;
	 *	0 - Success
	 */
	function addItem($itemId, $name, $price, $cate, $desc, $url, $qty) {
		if ($itemId === -1) { // If this is a new item
			$this->database->exec(
				"INSERT INTO MARKET_NEW (IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION, QTY) VALUES ('$url', '$name', '$price', '$cate', '$desc', '$qty')");
			if ($this->database->resultSet() !== 0)
				return 0;
			else
				return 1;
		} else {
			$item = $this->getItemInfo($itemId);
			if ($item['ERROR'] == false) {
				$qty2 = $item['QTY'];
				$qty += $qty2;
				$this->database->exec(
					"UPDATE MARKET_NEW set QTY='$qty' where MARKET_ID='$itemId'");
				if ($this->database->resultSet() !== 0)
					return 0;
				else
					return 1;
			} else 
				return 1;
		}
	}

	/*
	 * Function which add give item to student's cart
	 * Returns : 
	 *	0 - Success
	 *	1 - Failed
	 *	2 - Item doesn't not exist or can not be bought
	 */
	function addToCart($itemId, $studentNo) {
		#echo "ItemId : ".$itemID;
		$item = $this->getItemInfo($itemId);
		if ($item['ERROR'] == true)
			return 2;

		$name = $item['NAME'];
		$url = $item['URL'];
		$price = $item['PRICE'];
		$cate = $item['CATEGORY'];
		$desc = $item['DESCRIPTION'];
		$qty = $item['QTY'];

		$this->database->exec(
			"INSERT INTO CART VALUES('$studentNo', '$itemId', '$url', '$name', '$price', '$cate', '$desc')");
		if ($this->database->resultSet() !== 0) {
			if ($this->removeItem($itemId) === 0)
				return 0;
			else
				return 2;
		} else
			return 1;
	}

	/*
	 * Function which removes a given item from a student's cart
	 * Returns : 
	 *	0 - Success
	 *	1 - Failed
	 *	2 - Item doesn't not exist or can not be bought
	 */
	function removeFromCart($itemId, $studentNo) {
		$item = $this->getItemInfoFromCart($itemId);
		if ($item['ERROR'] == true)
			return 2;
		echo json_encode($item);
		$name = $item['NAME'];
		$url = $item['URL'];
		$price = $item['PRICE'];
		$cate = $item['CATEGORY'];
		$desc = $item['DESCRIPTION'];

		$this->database->exec(
			"DELETE FROM CART WHERE MARKET_ID='$itemId' AND STUDENT_NO='$studentNo' LIMIT 1");
		if ($this->database->resultSet() === 1) {
			$result = $this->addItem($itemId, $name, $price, $cate, $desc, $url, 1);
			if ($result === 0)
				return 0;
			else
				return 1;
		} else 
			return 1;

		//update the quantity of the item in the market_place by adding it by 1
		$this->database->query('SELECT * from MARKET_NEW WHERE MARKET_ID='.$itemId);
		$itemRes = $this->database->resultSet();
		if($itemRes !== -1)
		{
			$col = $itemRes->fetch(PDO::FETCH_ASSOC);
			$qty = $col['QTY'];
			//increment it by 1
			$qty = $qty + 1;
			//make update in database
			$this->database->exec("UPDATE MARKET_NEW SET QTY='$qty' WHERE MARKET_ID='$itemID'");
		}
	}

	//deletes items from the cart without adding back to the item's Market_place quantity like removeFromCart does
	function deleteFromCart($studentNo, $itemId) {
		$item = $this->getItemInfoFromCart($itemId);
		if ($item['ERROR'] == true)
			return 2;
		echo json_encode($item);
		$name = $item['NAME'];
		$url = $item['URL'];
		$price = $item['PRICE'];
		$cate = $item['CATEGORY'];
		$desc = $item['DESCRIPTION'];

		$this->database->exec(
			"DELETE FROM CART WHERE MARKET_ID='$itemId' AND STUDENT_NO='$studentNo' LIMIT 1");
		if ($this->database->resultSet() === 1) {
			$result = $this->addItem($itemId, $name, $price, $cate, $desc, $url, 1);
			if ($result === 0)
				return 0;
			else
				return 1;
		} else 
			return 1;	
	}

	
	//Adds newly checked out items to the purchases table . row = array of columns to input
	function addToPurch($studentNr, $row)
	{
		$id = $row['ID'];
  		$amount = $row['PRICE'];
                $qty = $row['QTY'];
                $name = $row['NAME'];
                $url = $row['URL'];
                $price = $row['PRICE'];
                $cate = $row['CATEGORY'];
                $desc = $row['DESCRIPTION'];
	
		$sql = "INSERT INTO PURCHASES(
                 	STUDENT_NO, MARKET_ID, IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION, PURCHASE_DATE)
                        VALUES('$studentNr', '$id', '$url', '$name', '$price', '$cate', '$desc', CURRENT_DATE);";

		$this->database->exec($sql);	
	}

	//gets the user's purchase history
	function getPurchHistory($studentNr)
	{
		$output = array();
		$this->database->query('select * from PURCHASES where STUDENT_NO='.$studentNr.';');
		$result = $this->database->resultSet();
		if($result !== -1)
		{
			$output = $result->fetchAll();
		}
		return $output;
	}
	
	//gets the user's items in their cart
	function getCartItems($studentNr)
	{
		$output = array();
		$this->database->query('select * from CART where STUDENT_NO='.$studentNr.';');
		$result = $this->database->resultSet();
		if($result !== -1)
		{
			$output = $result->fetchAll();
		}
		return $output;
	}

}

?>

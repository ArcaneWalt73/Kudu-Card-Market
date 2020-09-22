<?php
#require 'Database.phphh';
/*
 * Function to retrieve an item's data when given the item's id
 *
function getItemInfo($link, $id){
	#echo $id;
       	$response = array();
	if ($result = mysqli_query($link, "select * from MARKET_NEW where MARKET_ID='$id'")) {
		$rating = mysqli_query($link, "select RATING from RATINGS where MARKET_ID='$id'");
		$data = $rating->fetch_assoc();
		$dataResult = $result->fetch_assoc();

	        //response array
        	$response['ID'] = $dataResult['MARKET_ID'];
		$response['NAME'] = $dataResult['NAME'];
		$response['URL'] = $dataResult['IMAGE_URL'];
		$response['PRICE'] = $dataResult['PRICE'];
		$response['CATEGORY'] = $dataResult['CATEGORY'];
		$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
        	$response['ERROR'] = false;
		return $response;
        }
       	$response['ERROR'] = true;
}*/

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
		//$id = mysqli_c$id;
       		$response = array();
#		echo "checkpoint : 1</br>";

	    	$this->database->query('SELECT * FROM `MARKET_NEW` WHERE MARKET_ID='.$id);
	    	$result = $this->database->resultSet();

		if ($result !== -1) {
	       		$this->database->query('SELECT * FROM RATINGS WHERE MARKET_ID='.$id);
       			$rating = $this->database->resultSet();
#			echo "Checkpoint : 2</br>";
	       		#$this->database->exec('SELECT * FROM RATINGS WHERE MARKET_ID='.$id);
			#echo $this->database->resultSet();
			#echo json_encode($result->fetch());
			#echo json_encode($rating->fetch(PDO::FETCH_ASSOC));

			$data = $rating->fetch(PDO::FETCH_ASSOC);
			$dataResult = $result->fetch(PDO::FETCH_ASSOC);
			//response array
			$response['ID'] = $dataResult['MARKET_ID'];
			$response['NAME'] = $dataResult['NAME'];
			$response['URL'] = $dataResult['IMAGE_URL'];
			$response['PRICE'] = $dataResult['PRICE'];
			$response['CATEGORY'] = $dataResult['CATEGORY'];
			$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
			$response['QTY'] = $dataResult['QTY'];
			$response['RATING'] = $data['RATING'];
			$response['REVIEWS'] = $data['REVIEWS'];
		        $response['ERROR'] = false;

	       		#echo $r1['MARKET_ID']."</br>";
	       		#echo $r2['RATING']."</br>";
			
	       		$response['ERROR'] = false;
			#$this->database->close();
			return $response;
	       	}
		else
	       		$response['ERROR'] = true;
#		echo "Checkpoint : 3</br>";
		#$this->database->close();
		return $response;
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
#		echo "C : 1\n";
		$this->database->query('SELECT KUDU_BUCKS FROM `STUDENTS` WHERE STUDENT_NO='.$studentNo);
		$result = $this->database->resultSet();

		if ($result !== -1) {
			$row = $result->fetch(PDO::FETCH_ASSOC);
#		echo "C : 2\n";
		$this->database->query('SELECT * FROM `MARKET_NEW` WHERE MARKET_ID='.$itemID);
		$itemResult = $this->database->resultSet();
#		echo "C : 3\n";
		#echo $itemResult->fe;
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
#			echo "C : 4\n";
        	
			if ($kudu >= $amount && $qty >= 1) {
#				echo "C : 5\n";
				$current_Amount = $kudu - $amount; // the amount after payments
				$qty = $qty - 1;
				$this->database->exec('UPDATE STUDENTS SET KUDU_BUCKS='.$current_Amount.' WHERE STUDENT_NO='.$studentNo);
				if($this->database->resultSet() !== 0){
#					echo "C : 6\n";
					
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
					{
#						echo "C : 7\n";
						return 0;
					}
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
		$item = getItemInfo($itemID);
		if ($item['ERROR'] == true)
			return 1;

		$id = $response['ID'];
		$name = $response['NAME'];
		$url = $response['URL'];
		$price = $response['PRICE'];
		$cate = $response['CATEGORY'];
		$desc = $response['DESCRIPTION'];
		$qty = $response['QTY'];

		if ($qty === 1) {
			$this->database->exec(
				"DELETE FROM MARKET_NEW WHERE MARKET_ID='$itemID'");
			if ($this->database->resultSet() !== 0);
				return 0;
			else
				return 1;
		} else {
			$qty -= 1;
			$this->database->exec(
				"UPDATE table MARKET_NEW set QTY='$qty' where MARKET_ID='$itemID'");
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
		if ($itemID === -1) { // If this is a new item
			$this->database->exec(
				"INSERT INTO MARKET_NEW (IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION, QTY) VALUES ('$url', '$name', '$price', '$cate', '$desc', '$qty')");
			if ($this->database->resultSet() !== 0)
				return 0;
			else
				return 1;
		} else {
			$item = getItemInfo($itemID);
			if ($item['ERROR'] == false) {
				$qty = $item['QTY'];
				$qty += 1;
				$this->database->exec(
					"UPDATE table MARKET_NEW set QTY='$qty' where MARKET_ID='$itemID'");
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
	function addToCart($itemID, $studentNo) {
		$item = getItemInfo($itemID);
		if ($item['ERROR'] == true)
			return 2;

		$name = $response['NAME'];
		$url = $response['URL'];
		$price = $response['PRICE'];
		$cate = $response['CATEGORY'];
		$desc = $response['DESCRIPTION'];
		$qty = $response['QTY'];

		$this->database->exec(
			"INSERT INTO CART VALUES('$studentNo', '$itemID', '$url', '$name', '$price', '$cate', '$desc')");
		if ($this->database->resultSet() !== 0) {
			if (removeItem($itemID) === 0)
				return 0;
			else
				return 2;
		} else
			return 1;
	}

	function removeFromCart($itemID, $studentNo) {
		$item = getItemInfoFromCart($itemID);
		if ($item['ERROR'] == true)
			return 2;

		$name = $response['NAME'];
		$url = $response['URL'];
		$price = $response['PRICE'];
		$cate = $response['CATEGORY'];
		$desc = $response['DESCRIPTION'];

		$this->database->exec(
			"DELETE FROM CART WHERE MARKET_ID='$itemID' LIMIT 1");
		if ($this->database->resultSet() === 1) {
			$result = addItem($itemId, $name, $price, $cate, $desc, $url, 1);
			if ($result === 0)
				return 0;
			else
				return 1;
		} else 
			return 1;
	}

}

?>

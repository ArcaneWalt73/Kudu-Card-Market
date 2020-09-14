<?php
#require 'Database.phphh';
/*
 * Function to retrieve an item's data when given the item's id
 */
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
}

/*
 * Function to buy an Item
 */
function buyItem($link, $id, $studentID) {
	if ($result = mysqli_query($link, "select KUDU_BUCKS from STUDENTS where STUDENT_NO='$studentNo';")){
		$row = mysqli_fetch_array($result);
		if ($row['KUDU_BUCKS'] >= $amount) {
			$current_Amount = $row['KUDU_BUCKS'] - $amount; // the amount after payments
			if(mysqli_query($link,"update STUDENTS set KUDU_BUCKS='$current_Amount' where STUDENT_NO='$studentNo';")){
				$date = date("Y-m-d");
				if(mysqli_query($link, "insert into PURCHASES(STUDENT_NO, MARKET_ID, PURCHASE_DATE) values('$studentNo', '$itemID', CURRENT_DATE);"))
					echo json_encode($current_Amount);
				else 
					echo "false 1";
			}
			else
				echo "false 2";
		}
		else
			echo "false 3";
	}

}

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
            $this->stmt = -1;
        }
    }
    public function exec($sql) {
	try {
		$this->stmt = $this->db->exec($sql);
	}catch(PDOException $e){
            $this->stmt = -1;
        }
    }

    public function resultSet(){
        return $this->stmt;

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
		echo "checkpoint : 1</br>";
	    $this->database->query('SELECT * FROM `MARKET_NEW` WHERE MARKET_ID='.$id);
		
	    $result = $this->database->resultSet();
		if ($result !== -1) {
       		$this->database->query('SELECT * FROM RATINGS WHERE MARKET_ID='.$id);
       		$rating = $this->database->resultSet();
			echo "Checkpoint : 2</br>";
       		$this->database->exec('SELECT * FROM RATINGS WHERE MARKET_ID='.$id);
			echo $this->database->resultSet();
			#echo json_encode($result->fetch());
			echo json_encode($rating->fetch(PDO::FETCH_ASSOC));

			$data = $rating->fetch();
			$dataResult = $result->fetch();
			//response array
			$response['ID'] = $dataResult['MARKET_ID'];
			$response['NAME'] = $dataResult['NAME'];
			$response['URL'] = $dataResult['IMAGE_URL'];
			$response['PRICE'] = $dataResult['PRICE'];
			$response['CATEGORY'] = $dataResult['CATEGORY'];
			$response['DESCRIPTION'] = $dataResult['DESCRIPTION'];
			$response['RATING'] = $data['RATING'];
			$response['REVIEWS'] = $data['REVIEWS'];
		        $response['ERROR'] = false;

	       		#echo $r1['MARKET_ID']."</br>";
	       		#echo $r2['RATING']."</br>";
			
	       		$response['ERROR'] = false;
	       	}
		else
	       		$response['ERROR'] = true;
		echo "Checkpoint : 3</br>";
		return $response;
	}


	/*
	 * Function to buy an Item
	 * Returns :
	 *		0 - Success
	 *		1 - Failed to record transation
	 *		2 - Failed to update new amount
	 *		3 - Insuffient Credit
	 */
	function buyItem($id, $studentNo) {
		$this->database->query('SELECT KUDU_BUCKS FROM STUDENTS WHERE STUDENT_NO='.$studentNo);
		$result = $this->database->resultSet();
		$this->database->query('SELECT * FROM MARKET_NEW WHERE MARKET_ID='.$id);
		$itemResult = $this->database->resultSet();
		if ($result !== -1 && $itemResult !== -1) {
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$col = $itemResult->fetch(PDO::FETCH_ASSOC);
			$kudu = $row['KUDU_BUCKS'];

			$amount = $col['PRICE'];
			if ($kudu >= $amount) {
				$current_Amount = $kudu - $amount; // the amount after payments
				$this->database->exec('UPDATE STUDENTS SET KUDU_BUCKS='.$current_Amount.'WHERE STUDENT_NO='.$studentNo);
				if($this->database->resultSet() !== 0){
					$date = date("Y-m-d");
					$this->database->exec('INSERT INTO PURCHASES(STUDENT_NO, MARKET_ID, PURCHASE_DATE) VALUES('.$studentNo.', '.$id.', CURRENT_DATE)');
					if($this->database->resultSet() !== 0)
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
	}

	function removeItem($id) {

	}
}

?>

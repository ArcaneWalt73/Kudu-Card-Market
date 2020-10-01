<?php
class getItem{
	private $database;
	public function __construct(){
		$this->database = new Database2();
	}

	public function getMarketItems() {
		this->database->query("select * from MARKET_NEW");
		$result = $this->database->resultSet();
		if ($result !== -1) {
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$itemId = $row['MARKET_ID'];
				$this->database->query("select RATING from RATINGS where MARKET_ID='$itemId'");
				$r1 = $this->database->resultSet();
				$data = $r1->fetch(PDO::FETCH_ASSOC);
				
				if(isset($data['RATING']))
					$rating = $data['RATING'];
				
				if (empty($rating))
					$row['RATING'] = 0;
				else
					$row['RATING'] = $rating;
				$output[] = $row;
			}
			return json_encode($output);
		}	
		
	}
				
}
	
?>	

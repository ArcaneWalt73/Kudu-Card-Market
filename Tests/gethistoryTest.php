<?php

class gethistoryTest extends PHPUnit\Framework\TestCase
{
  /**
  * @var PDO
  */
  
  private $pdo;
  
  public function setUp(): void
  {
    $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //create the PURCHASES table
    $this->pdo->query(
      "CREATE TABLE `PURCHASES` (
      `STUDENT_NO` varchar(20) NOT NULL,
      `MARKET_ID` int(11) unsigned NOT NULL,
      `PURCHASE_DATE` date NOT NULL,
       KEY `STUDENT_NO` (`STUDENT_NO`),
       KEY `MARKET_ID` (`MARKET_ID`),
       CONSTRAINT `PURCHASES_ibfk_1` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`),
       CONSTRAINT `PURCHASES_ibfk_2` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET_NEW` (`MARKET_ID`)
       ) ENGINE=InnoDB DEFAULT CHARSET=latin1;"
     );
     
     //create MARKET_NEW table
     $this->pdo->query(
       "CREATE TABLE `MARKET_NEW` (
       `MARKET_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
       `IMAGE_URL` text,
       `NAME` varchar(30) NOT NULL,
       `PRICE` decimal(6,2) NOT NULL,
       `CATEGORY` varchar(30) NOT NULL,
       `DESCRIPTION` text NOT NULL,
        PRIMARY KEY (`MARKET_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;"
       );  
  }
 
}

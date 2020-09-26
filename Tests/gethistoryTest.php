<?php
include './php/getHistory.php';

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
      "CREATE TABLE IF NOT EXISTS PURCHASES (
       STUDENT_NO varchar(20) DEFAULT '1234',
       MARKET_ID int(11) unsigned DEFAULT '',
       PURCHASE_DATE date DEFAULT ''
       );"
     );
    
    
    //insert values into PURCHASE
    $this->pdo->query("INSERT INTO PURCHASES(STUDENT_NO, MARKET_ID, PURCHASE_DATE) VALUES ('7777777',18,'2020-06-08');");
    
    global $pdo;
    $pdo = $this->pdo;
  }
  
  public function testgetPurchases()
  {
      global $pdo;
     //test to see that the MarketId of the value in the first row is 18
     $this->assertEquals(18,getPurchases($pdo,'7777777'));
  }
 
}

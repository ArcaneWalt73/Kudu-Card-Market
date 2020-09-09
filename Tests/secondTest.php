<?php
include('php/test.php');

class secondTest extends PHPUnit\Framework\TestCase
{ 
    private $pdo;
    protected function setUp(): void
    {
           
            
        
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE DUMMY_T (words VARCHAR(50) NOT NULL)");
            
        $sql = "INSERT INTO DUMMY_T VALUES (" . $this->pdo->quote('hello') . ")";
        $this->pdo->query($sql);
        
        $sql = "SELECT words FROM DUMMY_T";
        $stmt = $this->pdo->query($sql);
        echo $stmt->fetchColumn();
    }
    
    /*public function testSaySomething()
    {
        global $link;
        $this->assertEquals('yokatta', saySomething($link));   
    }*/
    
    public function testGoodbye()
    {
        $this->assertEquals('success', goodbye());
    }
    
}

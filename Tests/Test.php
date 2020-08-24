<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
     private $pdo;

    public function setUp(): void
    {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
}
  
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function tearDown(): void
    {
        $this->pdo->query("DROP TABLE hello");
    }
}


<?php


class testTest extends PHPUnit\Framework\TestCase
{
    
    /**
        *@var PD)
        */

    private $pdo;

    public function setUp()
    {  
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
    }

    public function tearDown()
    {
        $this->pdo->query("DROP TABLE hello");
    }

    public function testTest()
    {
        $test = new Test();
        $this->assertEquals('success', $test->hello());
    }
}

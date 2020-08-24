<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    private $link;
    public function setUp(): void
    {
          $username = $GLOBALS['db_username'];
          $password = $GLOBALS['db_password'];
          $database = "d1965919";
          $link = mysqli_connect('127.0.0.1', $username, $password, $database);
    }
  
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function tearDown(): void
    {
        myqli_close($link);
    }
}


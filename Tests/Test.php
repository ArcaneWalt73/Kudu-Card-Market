<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    protected $link;
    protected function setUp(): void
    {        
        $username = "root";
        $password = "";
        $database = "d1965919";
        
        
        $link = mysqli_connect("127.0.0.1", $username, $password, $database);   
    }
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
}


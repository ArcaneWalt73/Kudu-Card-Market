<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    protected $link;
    public function setUp(): void
    {   $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        $link = mysqli_connect('s1965919@lamp.ms.wits.ac.za', $username, $password, $database);
    }

  
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function tearDown(): void
    {
        mysqli_close($link);
    }
}


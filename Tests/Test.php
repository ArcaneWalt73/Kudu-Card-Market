<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    protected $link;
    protected function setUp(): void
    {        
        $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        
        $url = "lamp.ms.wits.ac.za";
        $ip = gethostbyname($url);
        
        $link = mysqli_connect($ip, $username, $password, $database);
        $studentNo = mysqli_real_escape_string($link,$_POST["studentNumber"]); 
        $password1 = mysqli_real_escape_string($link,$_POST["password"]);   
    }
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
}


<?php

include('php/test.php');
#include('php/login.php');

class Test extends PHPUnit\Framework\TestCase
{ 
    public function testHello()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
}


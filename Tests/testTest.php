<?php

include('php/test.php');
include('php/greet.php');

class PHPTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function testGreeting()
    {
        $this->assertEquals('konichiwa', greeting());
    }
}


<?php

include('php/test.php');
include('php/greet.php');

class TestTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function testGreet()
    {
        $res = new Greet();
        $this->assertEquals('konichiwa', $res->greeting());
    }
}


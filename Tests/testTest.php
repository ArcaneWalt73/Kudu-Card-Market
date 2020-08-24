<?php

include('php/test.php');

class TestTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
}


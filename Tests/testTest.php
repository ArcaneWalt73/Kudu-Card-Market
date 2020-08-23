<?php

include('test.php');

class PHPTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new TestClass();
        echo test->hello();
        $this->assertEquals('success', $test->hello());
    }
}

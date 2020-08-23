<?php


class PHPTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
}

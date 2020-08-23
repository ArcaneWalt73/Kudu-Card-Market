<?php


class testTest extends PHPUnit\Framework\TestCase
{
    public function testTest()
    {
        $test = new Test();
        $this->assertEquals('success', $test->hello());
    }
}

<?php
include('php/test.php');

class secondTest extends PHPUnit\Framework\TestCase
{ 
    public function testGoodbye()
    {
        $test = new TestClass2();
        $this->assertEquals('success', $test->goodbye());
    }
    
}

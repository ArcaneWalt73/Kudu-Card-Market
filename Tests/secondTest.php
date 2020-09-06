<?php
include('php/test.php');

class secondTest extends PHPUnit\Framework\TestCase
{ 
    public function testGoodbye()
    {
        $this->assertEquals('success', goodbye());
    }
    
}

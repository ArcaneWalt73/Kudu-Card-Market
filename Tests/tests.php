<?php

include('php/test.php');
include('php/getHistory.php');
include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{
    protected $suc_string;
    protected function setUp(): void
    {
        $suc_string = "success";
    }
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals($suc_string, $test->hello());
    }
}


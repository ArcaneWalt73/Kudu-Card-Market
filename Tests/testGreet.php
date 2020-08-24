
<?php

include('php/greet.php');

class TestGreet extends PHPUnit\Framework\TestCase
{
    public function testGreet()
    {
        $test = new Greet();
        $this->assertEquals('konichiwa', $test->greeting());
    }
}

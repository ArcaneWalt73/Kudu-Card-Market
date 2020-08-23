<?php

class testTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    { 
      $this->db->ClearDatabase();
      $this->session->start();
    }

    public function tearDown()
    {
        $this->session->destroy();
    }

    public function testTest()
    {
        $test = new Test();
        $this->assertEquals('success', $test->hello());
    }
}

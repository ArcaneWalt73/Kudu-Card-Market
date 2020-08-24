<?php

include('php/getHistory.php');

class PHPTest extends PHPUnit\Framework\TestCase
{
  public funtion testWork()
  {
    $this->assertEquals('success', work()); 
  }
}

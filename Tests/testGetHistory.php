<?php

include('php/getHistory.php');

class TestGetHistory extends PHPUnit\Framework\TestCase
{
  public funtion testWork()
  {
    $this->assertEquals('success', $this->work()); 
  }
}

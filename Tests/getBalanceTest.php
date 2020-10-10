<?php
require_once('php/getBalance.php');

  class getBalanceTest extends PHPUnit\Framework\TestCase {
      function testGetBalance(){
          $_SESSION['login_user'] = '1234';
          $this->assertNotNull(getBalance());
      }
  }

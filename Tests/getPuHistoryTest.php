<?php
require_once('php/getHistory.php');

  class getPuHistoryTest extends PHPUnit\Framework\TestCase {
      function testGetHistory(){
          $_SESSION['login_user'] = '1234';
          $this->assertNotNull(getHistory());
      }
  }

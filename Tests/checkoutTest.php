<?php
require_once('php/checkout.php');

  class checkoutTest extends PHPUnit\Framework\TestCase {
      function testCheckOut(){
          $_SESSION['login_user'] = '1173';
          $_POST['NEW_BAL'] = 10000-3999.99;
          $result = Array("updated balace","updated balace","updated balace","updated balace","updated balace");
          $this->assertEquals(json_encode($result),checkOut());
      }
  }

<?php
require_once('php/checkout.php');

  class checkoutTest extends PHPUnit\Framework\TestCase {
      function testCheckOut(){
          $_SESSION['login_user'] = '1234';
          $_POST['NEW_BAL'] = 3999.99;
          $result[] = "updated balace";
          $this->assertEquals(json_encode($result),checkOut());
      }
  }

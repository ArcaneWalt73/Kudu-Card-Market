<?php
require_once('php/getCartItems.php');

  class getCartItemsTest extends PHPUnit\Framework\TestCase {
      function testGetCartItems(){
          $_SESSION['login_user'] = '1234';
          $this->assertNotNull(getcartItems());
      }
  }

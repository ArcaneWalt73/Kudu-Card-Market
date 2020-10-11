<?php
require_once('php/removeItemFromCart.php');

  class removeItemFromCartTest extends PHPUnit\Framework\TestCase {
      function testRemoveItemFromCart(){
          $_SESSION['login_user'] = '1234';
          $this->assertEquals("success",removeItemFromCart('10'));
      }
  }

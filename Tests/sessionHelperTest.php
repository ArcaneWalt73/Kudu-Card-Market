<?php
require_once('php/sessionHelper.php');

  class sessionHelperTest extends PHPUnit\Framework\TestCase {
      public function testGetUserSession(){
          $return_value = Array('name'=>'davis',
                                'code'=>0);
          $_SESSION['login_user'] = 'davis';
          $this->assertEquals($return_value,getUserSession());
          unset($_SESSION['login_user']);
          $return_value1 = Array('code'=>1);
          $this->assertEquals($return_value1,getUserSession());
      }

      public function testCheckUserSession(){
          $user = 'davis';
          $this->assertEquals(1,checkUserSession($user));
          $_SESSION['login_user'] = 'davis';
          $this->assertEquals(2,checkUserSession('wrongUser'));
          $this->assertEquals(0,checkUserSession($user));
      }

      public function testUpdateUserSession(){
          unset($_SESSION['login_user']);
          $this->assertEquals(0,updateSession('davis'));
          $_SESSION['login_user'] = 'davis';
          $this->assertEquals(2,updateSession('wrongUser'));
          $user = 'davis';
          $this->assertEquals(1,updateSession($user));
      }
      //public function testCancelSession(){
        //  $this->assertEquals(0,cancelSession());
      //}

  }

<?php
require_once('php/ratings.php');

  class ratingsTest extends PHPUnit\Framework\TestCase {
      function testRatings(){
          $_POST['studentNumber'] = '1234';
          $_POST['marketId'] = '10';
          $_POST['rating'] = '5';
          $_POST['comment'] = 'i lied';
          $return_value1 = '<script>alert("Already rated the item");window.location.href = "../history_page.html";</script>';
          $this->assertEquals($return_value1,ratings());
          $_POST['studentNumber'] = '12345';
          $return_value2 = '<script>alert("Thank you for rating");window.location.href = "../history_page.html";</script>';
          $this->assertEquals($return_value2,ratings());
      }
  }

<?php
/*
 * Item example:
 *	ID	: 25
 *	IMG	: https://lamp.ms.wits.ac.za/~s1965919/uploads/25.png
 *	NAME	: Pacman Sprite
 *	PRICE	: 20.00
 *	CATE	: Resource
 *	DESC	: Sprite Image for Pacman Game
 */
require_once 'php/helperFunctions.php';

class testHelper extends PHPUnit\Framework\TestCase {

  public function testAddItem() {
    $name = "Pacman Sprite";
    $url = "https://lamp.ms.wits.ac.za/~s1965919/uploads/25.png";
    $price = 20.00;
    $cate = "Resource";
    $desc = "Sprite Image for Pacman Game"
    $qty = 10;

    $helper = new helperFunctions;
    $result = $helper->addItem(-1, $name, $price, $cate, $desc, $url, $qty);

  }

  public function testGetItemInfo() {

    $id = 25;

    $helper = new helperFunctions;


    $dbase = $this->getMockBuilder('Database1')->getMock();
    $dbase->method('resultSet')->will($this->returnValue($table));
    //$expectedResult = ['PASSWORD' => '123'];
  
    $task = getItemInfo();
    $actualResult =  $task->getAllTasks();
    $this->assertEquals($dbase->resultSet()[0], $actualResult[0]);
  }
}


?>


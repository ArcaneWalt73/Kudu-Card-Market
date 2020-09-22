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

    $this->assertEquals($result, 0);    

    $items = $helper->getAllItems();
    $first = $items[0];

    $this->assertEquals($first['NAME'], $name);
    $this->assertEquals($first['URL'], $url);
    $this->assertEquals($first['PRICE'], $price);
    $this->assertEquals($first['CATEGORY'], $cate);
    $this->assertEquals($first['DESCRIPTION'], $desc);

    // Check if QTY is added

    $result = $helper->addItem($first['ID'], $name, $price, $cate, $desc, $url, 1);
    $this->assertEquals($result, 0);

    $items = $helper->getAllItems();
    $first = $items[0];

    $this->assertEquals($first['NAME'], $name);
    $this->assertEquals($first['URL'], $url);
    $this->assertEquals($first['PRICE'], $price);
    $this->assertEquals($first['CATEGORY'], $cate);
    $this->assertEquals($first['DESCRIPTION'], $desc);
    $qty += 1;
    $this->assertEquals($first['QTY'], $qty);
  }

  public function testGetItemInfo() {
    $name = "Pacman Sprite";
    $url = "https://lamp.ms.wits.ac.za/~s1965919/uploads/25.png";
    $price = 20.00;
    $cate = "Resource";
    $desc = "Sprite Image for Pacman Game"
    $qty = 10;

    $helper = new helperFunctions;
    $result = $helper->addItem(-1, $name, $price, $cate, $desc, $url, $qty);

    $output = getItemInfo(-1); // Test non-existent item
    $this->assertEquals($output['ERROR'], true);

    $output = getItemInfo(0);
    $this->assertEquals($output['ERROR'], false);
    $this->assertEquals($output['NAME'], $name);
    $this->assertEquals($output['URL'], $url);
    $this->assertEquals($output['PRICE'], $price);
    $this->assertEquals($output['CATEGORY'], $cate);
    $this->assertEquals($output['DESCRIPTION'], $desc);
    $this->assertEquals($output['QTY'], $qty);
    
  }

  public function testRemoveItem() {
    $name = "Pacman Sprite";
    $url = "https://lamp.ms.wits.ac.za/~s1965919/uploads/25.png";
    $price = 20.00;
    $cate = "Resource";
    $desc = "Sprite Image for Pacman Game"
    $qty = 10;

    $helper = new helperFunctions;
    $result = $helper->addItem(-1, $name, $price, $cate, $desc, $url, $qty);

    $items = $helper->getAllItems();
    $first = $items[0];

    $id = $first['ID'];

    $output = $helper->removeItem($id);

    $this->assertEquals($output, 0);

    $output = $helper->getItemInfo($id);

    $this->assertEquals($output['ERROR'], true);
  }
}


?>


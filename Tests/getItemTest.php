<?php
require_once 'php/getItem.php';

    class getItemTest extends PHPUnit\Framework\TestCase {
        public function testGetMarketItem(){
            $test = new getItem();
            $this->assertNotNull($test->getMarketItems());
        }
    }

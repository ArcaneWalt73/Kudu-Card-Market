<?php
require_once 'php/helperFunctions.php';

   class helperFunctionsTest extends PHPUnit\Framework\TestCase {
        public function testGetItemInfo(){
            $expectedResult = array(array('ERROR' => true),
                                    array('ID' => '10',
                                        'NAME' => 'Acer Asphire 1',
                                        'URL' => 'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg',
                                        'PRICE' => '3999.99',
                                        'CATEGORY' => 'Electronics',
                                        'DESCRIPTION' => 'Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes',
                                        'QTY'=>'5','ERROR'=>false)
                            );
            $expectedHelperFunctions = $this->getMockBuilder('HelperFunctions')->getMock();
            $expectedHelperFunctions->method('getItemInfo')->will($this->returnValue($expectedResult));
            $actualHelperFunctions = new HelperFunctions();
             /*test for non existing ID */
            $this->assertEquals($expectedHelperFunctions->getItemInfo(1)[0],$actualHelperFunctions->getItemInfo(1));
            /*test for valid ID*/
            $this->assertEquals($expectedHelperFunctions->getItemInfo(10)[1],$actualHelperFunctions->getItemInfo(10));
            /*test for exception what input triggers the exception ???*/
        }
        
        public function testGetItemInfoFromCart(){
            $expectedResult = array(array('ERROR' => true),
                            array (
                                'ID' => '10',
                                'NAME' => 'Acer Asphire 1',
                               'URL' => 'https:\/\/lamp.ms.wits.ac.za\/~s1965919\/uploads\/0.jpeg',
                               'URL' => 'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg',
                                'PRICE' => '3999.99',
                                'CATEGORY' => 'Electronics',
                               'DESCRIPTION' => 'Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory\r\n
                                                                    Type4 GB DDR4 SDRAMDisplay Size14\r\n
                                                                   "Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12\r\n
                                                                    MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes',
                               'DESCRIPTION' => 'Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes',
                                'ERROR' => false
                            ));
            $expectedHelperFunctions = $this->getMockBuilder('HelperFunctions')->getMock();
            $expectedHelperFunctions->method('getItemInfoFromCart')->will($this->returnValue($expectedResult));
            $actualHelperFunctions = new HelperFunctions();
             /*test for non existing ID */
            $this->assertEquals($expectedHelperFunctions->getItemInfoFromCart(1)[0],$actualHelperFunctions->getItemInfoFromCart(1));
            /*test for valid ID*/
            $this->assertEquals($expectedHelperFunctions->getItemInfoFromCart(10)[1],$actualHelperFunctions->getItemInfoFromCart(10));
            /*test for exception what input triggers the exception ???*/
        }
        public function testgetAllItems(){
            $actualHelperFunctions = new HelperFunctions();
            $this->assertNotNull($actualHelperFunctions->getAllItems());
        }
        public function testAddToCart(){
            $actualHelperFunctions = new HelperFunctions();
            $this->assertEquals(2,$actualHelperFunctions->addToCart('-1','1234'));
            $this->assertEquals(0,$actualHelperFunctions->addToCart('16','1234'));
        }
        public function testRemoveFromCart(){
            $actualHelperFunctions = new HelperFunctions();
            $this->assertEquals(2,$actualHelperFunctions->removeFromCart('-1','1234'));
            $actualHelperFunctions->addToCart('22','1234');
            $this->assertEquals(0,$actualHelperFunctions->removeFromCart('22','1234'));
        }
        public function testRemoveItem(){
            $test = new HelperFunctions();
            $this->assertEquals(0,$test->removeItem(16));
            $this->assertEquals(1,$test->removeItem(-1));
        }

        public function testAddItem(){
            $test = new HelperFunctions();
            $this->assertEquals(0,$test->addItem('-18','danone',20,'FOOD','its nice','http',1));
            $this->assertEquals(0,$test->addItem('16','danone',20,'FOOD','its nice','http',1));
        }
        public function testBuyItem(){
            $test = new HelperFunctions();
            $this->assertEquals(0,$test->buyItem(20,1234));
            $this->assertEquals(1,$test->buyItem(13,1234));
        }
      
        public function testGetPurchHistory()
        {
            $helper = new HelperFunctions();
            $this->assertEquals(17, $helper->getPurchHistory(1234)[0]['MARKET_ID']);
        }
      
        public function testGetCartItems()
        {
            $helper = new HelperFunctions();
            $this->assertEquals(10, $helper->getCartItems(1234)[0]['MARKET_ID']);
        }
        
}

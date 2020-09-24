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
        
}

<?php
    include 'php/register.php';

    class registerTest extends PHPUnit\Framework\TestCase {

        public function testGetAllTasks() {
            $dbase = $this->getMockBuilder('Database1')->getMock();

            $dbase->method('resultSet')->will($this->returnValue(1));

            $task = new register('1133','kag','mos','123','email222@gmail.com','0981712672');
            $actualResult =  $task->getAllTasks();
            $this->assertEquals($dbase->resultSet(), $actualResult);
        }

        public function testDoLogin(){ 
            //test for success
            $task = new register('11233','kag','mos','123','ema22il222@gmail.com','0981712672');
            $this->assertTrue($task->doRegister());
            //test for failure
            $this->assertEquals(false,$task->doRegister());
        }
}

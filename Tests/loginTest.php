<?php
//include 'php/Database.php';
include 'php/login.php';

  class loginTest extends PHPUnit\Framework\TestCase {

    public function testGetAllTasks() {

      $table = array(array('PASSWORD' => '123'));

      $dbase = $this->getMockBuilder('Database')->getMock();

      $dbase->method('resultSet')->will($this->returnValue($table));
      //$expectedResult = ['PASSWORD' => '123'];
    
      $task = new login('1234','123');
      $actualResult =  $task->getAllTasks();
      $this->assertEquals($dbase->resultSet()[0], $actualResult[0]);
    }

    public function testDoLogin(){ 
        //test for success login
        $table = array(array('PASSWORD' => password_hash('123',PASSWORD_DEFAULT)));
        $task = $this->getMockBuilder('login')->enableOriginalConstructor()
            ->setConstructorArgs(array('1234','123'))
            ->enableProxyingToOriginalMethods()->getMock();
        $task->method('getAllTasks')->will($this->returnValue($table));
        $this->assertEquals(true,$task->doLogin());
        //test for wrong password
        $task = $this->getMockBuilder('login')->enableOriginalConstructor()
            ->setConstructorArgs(array('1234','1232'))
            ->enableProxyingToOriginalMethods()->getMock();
        $task->method('getAllTasks')->will($this->returnValue($table));
        $this->assertEquals(false,$task->doLogin());
    }
    public function testLogin_no_existing_user(){
        //non existing user
        $task = $this->getMockBuilder('login')->enableOriginalConstructor()
            ->setConstructorArgs(array('1234','123'))->getMock();
        $task->method('getAllTasks')->will($this->returnValue(false));
        $this->assertEquals(false,$task->doLogin());
    }
}

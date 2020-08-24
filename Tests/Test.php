<?php

include('php/test.php');
#include('php/login.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    public function setUp(): void
    {
        $link = mysqli_connect('127.0.0.1', $GLOBALS['db_username'], $GLOBALS['db_password'], $GLOBALS['db_dsn']);
        mysqli_query($link, "CREATE TABLE STUDENTS(STUDENT_NO int PRIMARY KEY, PASSWORD varchar(30));");
        mysqli_close($link);
    }

  
    
    public function testTest()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->hello());
    }
    
    public function tearDown(): void
    {
        $this->pdo->query("DROP TABLE hello");
    }
}


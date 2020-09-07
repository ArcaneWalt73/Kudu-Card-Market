<?php
include('php/test.php');


$link = mysqli_connect("127.0.0.1", $username, $password,$database);


class secondTest extends PHPUnit\Framework\TestCase
{ 
    protected function setUp(): void
    {
            $username = "root";
            $password = "";
            $database = "d1965919";
            
            global $link;
            $sql = "create table DUMMY_T(id int,words varchar)";
            $link->query($sql);
        
            
            $sql = "insert into DUMMY_T(id, words) values(0, 'It fucking works!')";
            $link->query($sql);
           
    }
    
    public function testSaySomething()
    {
        global $link;
        $this->assertEquals('It fucking works!', saySomething($link));   
    }
    
    public function testGoodbye()
    {
        $this->assertEquals('success', goodbye());
    }
    
}

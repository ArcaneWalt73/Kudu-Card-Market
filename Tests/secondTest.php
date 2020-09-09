<?php
include('php/test.php');

$username = "root";
$password = "";
$database = "d1965919";

$link = mysqli_connect("127.0.0.1", $username, $password,$database);


class secondTest extends PHPUnit\Framework\TestCase
{ 
    protected function setUp(): void
    {
           
            
        global $link;
        $sql = "create table DUMMY_T(id int,words varchar)";
        $link->query($sql);


        $sql = "insert into DUMMY_T(id, words) values(0, 'yokatta')";
        $link->query($sql);
        
        echo "fuck!";
            
           
    }
    
    /*public function testSaySomething()
    {
        global $link;
        $this->assertEquals('yokatta', saySomething($link));   
    }*/
    
    public function testGoodbye()
    {
        $this->assertEquals('success', goodbye());
    }
    
}

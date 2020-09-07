<?php
include('php/test.php');

class secondTest extends PHPUnit\Framework\TestCase
{ 
    
    protected function setUp(): void
    {
            $username = "root";
            $password = "toor";
            $database = "d1965919";
            $link = mysqli_connect("localhost:8889", $username, $password,$database);
    
        
            $sql = "create table DUMMY_T(id int,words varchar)";
            $link->query($sql);
           
    }
    
    public function testGoodbye()
    {
        $this->assertEquals('success', goodbye());
    }
    
}

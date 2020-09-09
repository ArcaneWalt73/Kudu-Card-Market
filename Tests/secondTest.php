<?php
include('php/test.php');

// $username = "root";
// $password = "";
// $database = "d1965919";

// $link = mysqli_connect("127.0.0.1", $username, $password,$database);


class secondTest extends PHPUnit\Framework\TestCase
{ 
    private $pdo;
    protected function setUp(): void
    {
           
            
//         global $link;
//         $sql = "create table DUMMY_T(words varchar);";
//         $link->query($sql);


//         $sql = "insert into `DUMMY_T` (`words`) values('yokatta');";
//         $link->query($sql);
        
//         $result = $link->query("select * from DUMMY_T;");
        
//         if($result->num_rows > 0)
//         {
//             while($row = $result->fetch_assoc())
//             {
//                 echo "________RESULT=:   ".$row['words'];
//             }
//         }
        
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE DUMMY_T (words VARCHAR(50) NOT NULL)");
            
        $sql = "INSERT INTO DUMMY_T VALUES (" . $this->pdo->quote('hello') . ")";
        $this->pdo->query($sql);
        
        $sql = "SELECT words FROM DUMMY_T";
        $stmt = $this->pdo->query($sql);
        echo $stmt->fetchColumn();
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


include('php/test.php');

class secondTest extends PHPUnit\Framework\TestCase
{ 
    public function testGoodbye()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->goodbye());
    }
    
}

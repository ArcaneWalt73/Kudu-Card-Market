
include('php/test.php');

class PHPTest extends PHPUnit\Framework\TestCase
{ 
    public function testGoodbye()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->goodbye());
    }
    
}

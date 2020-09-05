
include('php/test.php');

class Test2 extends PHPUnit\Framework\TestCase
{ 
    public function testGoodbye()
    {
        $test = new TestClass();
        $this->assertEquals('success', $test->goodbye());
    }
    
}

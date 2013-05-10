<?php
include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Para.php';

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-05-10 at 14:05:43.
 */
class ParaTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Para
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Para;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert ()   == 72.
     *
     * @covers Para::columns
     */
    public function testColumns() {
        $this->assertEquals(
                72
                , $this->object->columns()
        );
    }

    /**
     * Generated from @assert (8)  == 8.
     *
     * @covers Para::columns
     */
    public function testColumns3() {
        $this->assertEquals(
                8
                , $this->object->columns(8)
        );
    }

    /**
     * Initialize through constructor
     *
     * @covers Para::columns
     */
    public function testColumns4() {
        $para = new Para(12);
        $this->assertEquals(
                12
                , $para->columns(12)
        );
    }

    /**
     * Expect exception
     *
     * @covers Para::columns
     */
    public function testColumnsException()    
    {   
        try {
            $this->object->columns('abc');
        } 
        catch (InvalidArgumentException $expected) { 
            return; 
        }
        $this->fail('An expected exception has not been raised.');
    }
    
    
    /**
     * @covers Para::__constructor
     * @todo   Implement test__constructor().
     */
    public function test__constructor() {
        $object = new Para();
        $this->assertNotNull($object, "Para object fail to initialized");
    }

}

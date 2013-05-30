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
     * Test constructor
     * 
     */
//    public function test__construt() {
//        $object = new Para();
//        $this->assertNotNull($object, "Para object fail to initialized");
//    }

    /**
     * Generated from @assert ()   == 72.
     *
     * @covers Para::columns
     */
    public function testColumns() {
        $this->assertEquals(
                72
                , $this->object->getColumns()
        );
    }

    /**
     * Generated from @assert (8)  == 8.
     *
     * @covers Para::columns
     */
    public function testColumns3() {
        $param = new Para();
        $param->setColumns(8);
        $this->assertEquals(
                8
                , $param->getColumns()
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
                , $para->getColumns()
        );
    }

    /**
     * Expect exception
     *
     * @covers Para::columns
     */
    public function testColumnsException() {
        try {
            $this->object->setColumns('abc');
        } catch (InvalidArgumentException $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    /**
     * Test how formatter - stip spaces
     *
     */
    public function testFormat1() {
        $this->assertEquals(
                ""
                , $this->object->format(""), 'empty string formatted correctly'
        );

        $this->assertEquals(
                "abc"
                , $this->object->format(" abc"), 'leading space not was stripped'
        );

        $this->assertEquals(
                "abc"
                , $this->object->format(" abc    "), 'trailing space was not stripped too'
        );

        $this->assertEquals(
                "abc cde"
                , $this->object->format("abc  cde"), 'extra internal whitespace is not handled correctly'
        );
    }

    /**
     * Test formatter - wrapping 
     * 
     */
    public function testFormat2() {
        $para = new Para(8);
        $this->assertEquals(
                "abc def"
                , $para->format("abc def"), 'short line is not formatted correctly'
        );

        $this->assertEquals(
                "one two\nthree"
                , $para->format("one two three"), 'third word was not wrapped correctly'
        );

        $this->assertEquals(
                "one two\nthree go"
                , $para->format("one two three go"), 'packing to exactly the end of the line failed'
        );

        $this->assertEquals(
                "one two\nthree\nfourfiv-\nesix"
                , $para->format("one two three fourfivesix"), 'long word was not broken correctly'
        );
    }

    /**
     * Test formatter - multiple lines 
     * 
     */
    public function testFormat3() {
        $para = new Para(8);
        $this->assertEquals(
                "one two\nthree\n\nfour\nfive six"
                , $para->format("one two three\n\nfour five six"), 'paragraphs are not handled correctly'
        );

        $this->assertEquals(
                "one two\nthree\n\nfour\nfive six"
                , $para->format("one two\n three\n \nfour five six"), 'whitespace between paragraphs are not handled correctly'
        );
    }

}

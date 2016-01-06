<?php
namespace Noodlehaus\FileParser\Test;

use Noodlehaus\FileParser\Xml;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class XmlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Xml
     */
    protected $xml;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->xml = new Xml();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Noodlehaus\FileParser\Xml::getSupportedExtensions()
     */
    public function testGetSupportedExtensions()
    {
        $expected = array('xml');
        $actual   = $this->xml->getSupportedExtensions();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers                   Noodlehaus\FileParser\Xml::parse()
     * @expectedException        Noodlehaus\Exception\ParseException
     * @expectedExceptionMessage Opening and ending tag mismatch: name line 4
     */
    public function testLoadInvalidXml()
    {
        $this->xml->parse(__DIR__ . '/../mocks/fail/error.xml');
    }

    /**
     * @covers Noodlehaus\FileParser\Xml::parse()
     */
    public function testLoadXml()
    {
        $actual = $this->xml->parse(__DIR__ . '/../mocks/pass/config.xml');
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }
}

<?php namespace Experience\SmartdownHooks\Tests\App\Handlers;

use Experience\SmartdownHooks\App\Handlers\TypographyHandler;
use Experience\SmartdownHooks\Tests\BaseTest;

class TypographyHandlerTest extends BaseTest
{
    /**
     * @var string
     */
    protected $inputSuffix;

    /**
     * @var string
     */
    protected $outputPrefix;

    /**
     * @var TypographyHandler
     */
    protected $subject;

    /**
     * Sets the stage before each test.
     */
    public function setUp()
    {
        $this->inputSuffix = 'Added extra.';
        $this->outputPrefix = 'New beginnings.';

        $this->subject = new TypographyHandler(
            $this->inputSuffix,
            $this->outputPrefix
        );
    }

    public function testItAddsTheSuffixToTheInputString()
    {
        $source = 'Base input.';
        $expected = $source . ' ' . $this->inputSuffix;
        $this->assertEquals($expected, $this->subject->modifyInput($source));
    }

    public function testItAddsThePrefixToTheOutputString()
    {
        $source = 'Base output.';
        $expected = $this->outputPrefix . ' ' . $source;
        $this->assertEquals($expected, $this->subject->modifyOutput($source));
    }
}

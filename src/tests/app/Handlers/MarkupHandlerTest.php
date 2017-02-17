<?php namespace Experience\SmartdownHooks\Tests\App\Handlers;

use Experience\SmartdownHooks\App\Handlers\MarkupHandler;
use Experience\SmartdownHooks\Tests\BaseTest;

class MarkupHandlerTest extends BaseTest
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
     * @var MarkupHandler
     */
    protected $subject;

    /**
     * Sets the stage before each test.
     */
    public function setUp()
    {
        $this->inputSuffix = 'Added extra.';
        $this->outputPrefix = 'New beginnings.';

        $this->subject = new MarkupHandler(
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
        $base = 'Base output.';
        $source = '<p>' . $base . '</p>';
        $expected = '<p>' . $this->outputPrefix . ' ' . $base . '</p>';
        $this->assertEquals($expected, $this->subject->modifyOutput($source));
    }
}

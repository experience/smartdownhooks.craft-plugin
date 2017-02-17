<?php namespace Experience\SmartdownHooks\App\Handlers;

class MarkupHandler
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
     * Constructor.
     *
     * @param string $inputSuffix
     * @param string $outputPrefix
     */
    public function __construct($inputSuffix, $outputPrefix)
    {
        $this->inputSuffix = trim($inputSuffix);
        $this->outputPrefix = trim($outputPrefix);
    }

    /**
     * Appends the input suffix to the given string.
     *
     * @param string $input
     *
     * @return string
     */
    public function modifyInput($input)
    {
        return implode(' ', [$input, $this->inputSuffix]);
    }

    /**
     * Prepends the output prefix to all paragraphs in the given string.
     *
     * @param string $output
     *
     * @return string
     */
    public function modifyOutput($output)
    {
        $search = '<p>';
        $replace = '<p>' . $this->outputPrefix . ' ';
        return str_replace($search, $replace, $output);
    }
}

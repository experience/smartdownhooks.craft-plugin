<?php namespace Experience\SmartdownHooks\App\ServiceProviders;

use Craft\WebApp;
use Experience\SmartdownHooks\App\Handlers\MarkupHandler;
use Experience\SmartdownHooks\App\Handlers\TypographyHandler;
use League\Container\ContainerInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Experience\SmartdownHooks\App\Utilities\Logger;

class PluginServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = ['Logger', 'MarkupHandler', 'TypographyHandler'];

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var WebApp
     */
    protected $craft;

    /**
     * Constructor.
     *
     * @param WebApp $craft
     */
    public function __construct(WebApp $craft)
    {
        $this->craft = $craft;
    }

    /**
     * Registers items with the container.
     */
    public function register()
    {
        $this->initializeLogger();
        $this->initializeMarkupHandler();
        $this->initializeTypographyHandler();
    }

    /**
     * Initialises the logger.
     */
    protected function initializeLogger()
    {
        $this->container->add('Logger', new Logger);
    }

    /**
     * Initialises the markup handler.
     */
    protected function initializeMarkupHandler()
    {
        $inputSuffix = 'Markup handler input suffix.';
        $outputPrefix = 'Markup handler output prefix.';

        $this->container->add(
            'MarkupHandler',
            new MarkupHandler($inputSuffix, $outputPrefix)
        );
    }

    /**
     * Initialises the typography handler.
     */
    protected function initializeTypographyHandler()
    {
        $inputSuffix = 'Typography handler "input suffix".';
        $outputPrefix = 'Typography handler output prefix.';

        $this->container->add(
            'TypographyHandler',
            new TypographyHandler($inputSuffix, $outputPrefix)
        );
    }
}

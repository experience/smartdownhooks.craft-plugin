<?php namespace Experience\SmartdownHooks\App\Utilities;

use Craft\Craft;
use Craft\Logger as CraftLogger;
use Craft\SmartdownHooksPlugin;

class Logger
{
    /**
     * Logs an informational message to the plugin log file.
     *
     * @param string $message
     */
    public function logInfo($message)
    {
        $this->log($message, CraftLogger::LEVEL_INFO);
    }

    /**
     * Logs the given message with the given "level" to the plugin log file.
     * Automatically translates the message prior to logging.
     *
     * @param $message
     * @param $level
     */
    protected function log($message, $level)
    {
        SmartdownHooksPlugin::log(Craft::t($message), $level);
    }

    /**
     * Logs a warning message to the plugin log file.
     *
     * @param string $message
     */
    public function logWarning($message)
    {
        $this->log($message, CraftLogger::LEVEL_WARNING);
    }

    /**
     * Logs an error message to the plugin log file.
     *
     * @param string $message
     */
    public function logError($message)
    {
        $this->log($message, CraftLogger::LEVEL_ERROR);
    }
}

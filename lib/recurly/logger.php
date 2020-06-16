<?php

namespace Recurly;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{
    private $_name;
    private $_default_log_level;
    const LEVEL_MAP = [
        LogLevel::EMERGENCY => 800,
        LogLevel::ALERT => 700,
        LogLevel::CRITICAL => 600,
        LogLevel::ERROR => 500,
        LogLevel::WARNING => 400,
        LogLevel::NOTICE => 300,
        LogLevel::INFO => 200,
        LogLevel::DEBUG => 100
    ];

    /**
     * Constructor
     * 
     * @param string $name              The name of the application
     * @param string $default_log_level The minumum LogLevel to print messages for
     */
    public function __construct(string $name, string $default_log_level = LogLevel::INFO)
    {
        if (!array_key_exists($default_log_level, Logger::LEVEL_MAP)) {
            throw new \InvalidArgumentException("Invalid default log level: {$default_log_level}");
        }
        $this->_name = $name;
        $this->_default_log_level = $default_log_level;
    }

    /**
     * Internal function that prints log messages to STDOUT
     * Data passed into $context will be converted to JSON
     * 
     * @param string $level   The LogLevel of the message
     * @param string $message The message to print
     * @param array  $context Additional data to include in the output
     *
     * @return void
     */
    private function _print_log(string $level, string $message, array $context): void
    {
        if (Logger::LEVEL_MAP[$level] < Logger::LEVEL_MAP[$this->_default_log_level]) {
            return;
        }
        $d = new \DateTime();
        $jsonContext = json_encode($context);
        print("[{$d->format(\DateTime::ISO8601)}] {$this->_name}.{$level}: {$message} {$jsonContext}" . PHP_EOL);
    }

    /**
     * System is unusable.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function emergency($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function alert($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function critical($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function error($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function warning($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function notice($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function info($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function debug($message, array $context = array()): void
    {
        $this->_print_log(LogLevel::DEBUG, $message, $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed   $level
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     *
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function log($level, $message, array $context = array()): void
    {
        if (!array_key_exists($level, Logger::LEVEL_MAP)) {
            throw new \InvalidArgumentException("Invalid log level: {$level}");
        }
        $this->_print_log($level, $message, $context);
    }
}
<?php

use Recurly\Logger;
use Psr\Log\LogLevel;

final class LoggerTest extends RecurlyTestCase
{
    const ISO8601_REGEX = "(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})[+-](\d{4})";

    public function testConstructorInvalidLogLevelException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Logger('name', 'invalid-level');
    }

    public function testLogInvalidLogLevelException(): void
    {
        $logger = new Logger('name', LogLevel::INFO);
        $this->expectException(InvalidArgumentException::class);
        $logger->log('invalid-level', 'log-message');
    }

    public function testContextIntLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::INFO);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.info: info-log \[5\]\n$/");
        $logger->info('info-log', [5]);
    }

    public function testContextObjectLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::INFO);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.info: info-log \[{\"test\":\"abc\"}\]\n$/");
        $obj = new stdClass;
        $obj->test = 'abc';
        $logger->info('info-log', [$obj]);
    }

    public function testLogMethodLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::INFO);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.info: info-log \[.*\]\n$/");
        $logger->log(LogLevel::INFO, 'info-log');
    }

    public function testEmergencyLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::EMERGENCY);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.emergency: emergency-log \[.*\]\n$/");
        $logger->emergency('emergency-log');
    }

    public function testAlertLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::ALERT);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.alert: alert-log \[.*\]\n$/");
        $logger->alert('alert-log');
    }

    public function testCriticalLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::CRITICAL);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.critical: critical-log \[.*\]\n$/");
        $logger->critical('critical-log');
    }

    public function testErrorLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::ERROR);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.error: error-log \[.*\]\n$/");
        $logger->error('error-log');
    }

    public function testWarningLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::WARNING);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.warning: warning-log \[.*\]\n$/");
        $logger->warning('warning-log');
    }

    public function testNoticeLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::NOTICE);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.notice: notice-log \[.*\]\n$/");
        $logger->notice('notice-log');
    }

    public function testInfoLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::INFO);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.info: info-log \[.*\]\n$/");
        $logger->info('info-log');
    }

    public function testDebugLogging(): void
    {
        $logger = new Logger('Recurly', LogLevel::DEBUG);
        $this->expectOutputRegex("/^\[" . self::ISO8601_REGEX . "\] Recurly.debug: debug-log \[.*\]\n$/");
        $logger->debug('debug-log');
    }
}
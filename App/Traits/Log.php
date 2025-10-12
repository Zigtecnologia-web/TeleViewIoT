<?php
namespace App\Traits;
/**
 * Log Trait
 *
 * This trait provides a simple logging mechanism for PHP applications.
 * It captures PHP errors, uncaught exceptions, and fatal errors on shutdown,
 * and writes them into a daily log file. It also allows manual logging of messages.
 *
 * Created by Valdiney França and Tadeu Barbosa.
 */
class Log
{
    private string $today;
    private string $errorFile;

    /**
     * Constructor
     * Initializes the log file path and registers error/exception handlers.
     */
    public function __construct()
    {
        $this->today = date('Ymd');
        $this->errorFile = $this->errorFile();

        // Register PHP error, exception, and shutdown handlers
        $this->registerHandlers();
    }

    /**
     * Write a manual log message
     *
     * @param string $message The log message
     * @return void
     */
    public function write(string $message): void
    {
        $log = date('Y-m-d H:i:s') . " [INFO] $message\n";
        error_log($log, 3, $this->errorFile);
    }

    /**
     * Register error, exception, and shutdown handlers
     *
     * @return void
     */
    private function registerHandlers(): void
    {
        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleShutdown']);
    }

    /**
     * Handle PHP errors
     *
     * @param int $severity The error severity
     * @param string $message The error message
     * @param string $file The file where the error occurred
     * @param int $line The line number of the error
     * @return void
     */
    public function handleError(int $severity, string $message, string $file, int $line): void
    {
        $log = date('Y-m-d H:i:s') . " [ERROR] [$severity] $message in $file on line $line\n";
        error_log($log, 3, $this->errorFile);
    }

    /**
     * Handle uncaught exceptions
     *
     * @param \Throwable $exception The exception object
     * @return void
     */
    public function handleException(\Throwable $exception): void
    {
        $log = date('Y-m-d H:i:s') . " [EXCEPTION] " 
            . $exception->getMessage() 
            . " in " . $exception->getFile() 
            . " on line " . $exception->getLine() . "\n";
        error_log($log, 3, $this->errorFile);
    }

    /**
     * Handle fatal errors on script shutdown
     *
     * @return void
     */
    public function handleShutdown(): void
    {
        $error = error_get_last();
        if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
            $log = date('Y-m-d H:i:s') . " [FATAL] [{$error['type']}] {$error['message']} in {$error['file']} on line {$error['line']}\n";
            error_log($log, 3, $this->errorFile);
        }
    }

    /**
     * Generate the error log file path for today
     *
     * @return string Full path to the log file
     */
    private function errorFile(): string
    {
        $logDir = __DIR__ . '/../../logs';

        // Create the log directory if it doesn't exist
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        return $logDir . "/error_log_{$this->today}.log";
    }
}

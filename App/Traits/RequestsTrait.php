<?php
/**
 * RequestsTrait
 *
 * This trait provides a unified way to retrieve HTTP request data from different sources.
 * It automatically detects the request method (GET, POST, PUT, PATCH, etc.)
 * and parses the corresponding input data accordingly.
 *
 * Features:
 * - Handles GET, POST, PUT, PATCH, and other HTTP methods.
 * - Supports parsing JSON and form-encoded payloads.
 * - Returns all request data as an associative array.
 *
 * Usage:
 * Include this trait in a controller or service class to easily access
 * request data without manually handling $_GET, $_POST, or php://input streams.
 */

namespace App\Traits;

trait RequestsTrait
{
    public function getRequest(): array
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        return match ($method) {
            'GET' => $_GET,
            'POST' => $_POST,
            'PUT', 'PATCH' => $this->parseInputStream(),
            default => $this->parseInputStream(),
        };
    }

    private function parseInputStream(): array
    {
        $input = file_get_contents('php://input');
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

        if (str_contains($contentType, 'application/json')) {
            return json_decode($input, true) ?? [];
        }

        parse_str($input, $data);
        return $data;
    }
}

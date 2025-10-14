<?php
namespace App\Http\DTO;

use System\DTO\BaseDTO;

class TelemetryDTO extends BaseDTO
{
    public string $apiKey = '';
    public string $deviceId = '';
    public array $fields = [];
}

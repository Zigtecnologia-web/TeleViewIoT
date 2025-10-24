<?php
namespace App\Services;

use App\Http\DTO\TelemetryDTO;
use App\Services\RedisService;
use RuntimeException;

class TelemetryQueueService
{
    protected RedisService $redisService;

    public function execute(TelemetryDTO $dto): void
    { 
        foreach ($dto->fields as $key => $value) {
            $payload = [
                'device_id' => $dto->deviceId ?? 'unknown',
            ];
        
            foreach ($dto->fields as $key => $value) {
                $payload[$key] = (float) $value;
            }
        
            $this->push($payload);
        }
    }

    private function push(array $data): void
    {
        $this->redisService->rpush('telemetry_queue', json_encode($data));
    }

    private function pop(): ?string
    {
        return $this->redisService->lpop('telemetry_queue');
    }
}

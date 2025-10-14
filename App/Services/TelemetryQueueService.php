<?php
namespace App\Services;

use Predis\Client as Redis;
use App\Http\DTO\TelemetryDTO;

class TelemetryQueueService
{
    private Redis $redis;

    public function __construct()
    {
        $this->redis = new Redis([
            'host' => env('REDIS_HOST', 'redis'),
            'port' => env('REDIS_PORT', 6379)
        ]);
    }

    /**
     * Processa os dados de telemetria e os enfileira no Redis.
     *
     * @return void
     */
    public function execute(TelemetryDTO $dto): void
    { 
        foreach ($dto->fields as $key => $value) {
            $this->push([
                'device_id'   => $deviceId,
                'field_name'  => $key,
                'field_value' => (float) $value,
            ]);
        }
    }

    private function push(array $data): void
    {
        $this->redis->rpush('telemetry_queue', json_encode($data));
    }

    private function pop(): ?string
    {
        return $this->redis->lpop('telemetry_queue');
    }
}

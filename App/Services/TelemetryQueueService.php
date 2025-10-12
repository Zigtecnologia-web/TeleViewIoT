<?php
namespace App\Services;

use Predis\Client as Redis;

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
     * Push telemetry data into Redis queue
     *
     * @param array $data
     * @return void
     */
    public function push(array $data): void
    {
        $this->redis->rpush('telemetry_queue', json_encode($data));
    }

    /**
     * Pop telemetry data from Redis queue
     *
     * @return string|null JSON string from queue, or null if empty
     */
    public function pop(): ?string
    {
        return $this->redis->lpop('telemetry_queue');
    }

    /**
     * Process incoming telemetry fields and enqueue
     *
     * This method scans the array, finds fields starting with "field",
     * and pushes them individually into Redis queue.
     *
     * @param array $data The request payload from device (e.g. $_GET or $_POST)
     * @return void
     */
    public function execute(array $data): void
    {
        $deviceId = $data['api_key'] ?? 'unknown';

        foreach ($data as $key => $value) {
            if ($key !== 'api_key') { // ignora apenas a chave de autenticação
                $this->push([
                    'device_id'   => $deviceId,
                    'field_name'  => $key,
                    'field_value' => (float)$value,
                    'timestamp'   => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

}

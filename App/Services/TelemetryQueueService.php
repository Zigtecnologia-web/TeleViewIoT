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
     * Pushes telemetry data into a Redis queue for asynchronous processing.
     *
     * This method receives an array of telemetry data (e.g., temperature, humidity, etc.),
     * encodes it to JSON, and appends it to the "telemetry_queue" list in Redis.
     *
     * The data is later consumed by a background worker that reads the queue
     * and stores the information in TimescaleDB.
     *
     * @param array $data  The telemetry payload to enqueue (e.g. ['device_id' => 'sensor-01', 'temperature' => 28.3]).
     * @return void
     */
    public function push(array $data): void
    {
        $this->redis->rpush('telemetry_queue', json_encode($data));
    }
}

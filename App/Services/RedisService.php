<?php
namespace App\Services;

use Predis\Client as Redis;
use RuntimeException;

class RedisService
{
    public Redis $redis;

    public function __construct()
    {
        $this->initRedis();
    }

    private function initRedis(): void
    {
        $host = getenv('REDIS_HOST') ?: '127.0.0.1';
        $port = getenv('REDIS_PORT') ?: 6379;

        $this->redis = new Redis([
            'scheme' => 'tcp',
            'host'   => $host,
            'port'   => (int)$port,
        ]);

        try {
            $this->redis->ping();
        } catch (\Exception $e) {
            throw new RuntimeException("Erro {$host}:{$port}.", 0, $e);
        }
    }

    public function rpush(string $queue, string $data): void
    {
        $this->redis->rpush($queue, $data);
    }

    public function lpop(string $queue): ?string
    {
        return $this->redis->lpop($queue);
    }
}

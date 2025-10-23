<?php
require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../System/Database/EloquentConnection.php';
\System\Database\EloquentConnection::init();

use App\Services\RedisService;
use App\Models\Telemetry;
use Carbon\Carbon;
$queue = new RedisService();

echo "Telemetry Worker started...\n";

while (true) {
    $item = $queue->lpop('telemetry_queue');
    if ($item) {
        $data = json_decode($item, true);
        if (!$data) continue;

        $deviceId = $data['device_id'] ?? 'unknown';
        $extra = [];

       foreach ($data as $key => $value) {
        // ignora chaves que não são campos de leitura
        if (in_array($key, ['api_key', 'device_id'])) {
            continue;
        }
    
        Telemetry::create([
            'time'        => Carbon::now(),
            'device_id'   => $data['device_id'],
            'field_name'  => $key,
            'field_value' => floatval($value),
            'extra'       => $extra ?? null,
        ]);
    }
          

    } else {
        sleep(1); // evita loop infinito consumindo CPU
    }
}

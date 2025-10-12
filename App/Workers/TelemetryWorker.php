<?php
require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../System/Database/EloquentConnection.php';
\App\System\Database\EloquentConnection::init();

use App\Services\TelemetryQueueService;
use App\Models\Telemetry;

$queue = new TelemetryQueueService();

echo "Telemetry Worker started...\n";

while (true) {
    $item = $queue->pop();
    if ($item) {
        $data = json_decode($item, true);

        if (!$data) {
            echo "Invalid JSON skipped: $item\n";
            continue;
        }

        $deviceId = $data['api_key'] ?? 'unknown';
        $timestamp = $data['time'] ?? date('Y-m-d H:i:s');
        $extra = [];

        foreach ($data as $key => $value) {
            if (in_array($key, ['api_key', 'time'])) continue;

            Telemetry::create([
                'device_id'   => $deviceId,
                'field_name'  => $key,
                'field_value' => is_numeric($value) ? (float)$value : 0,
                'time'        => $timestamp,
                'extra'       => $extra
            ]);

            echo "Processed: device_id=$deviceId, $key=$value\n";
        }
    } else {
        sleep(1);
    }
}

<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Services\TelemetryQueueService;
use App\Database\TimescaleDB; // ou seu wrapper/eloquent

$queue = new TelemetryQueueService();
$db = new TimescaleDB(); // ou PDO direto

echo "Telemetry Worker started...\n";

while (true) {
    // Lê da fila Redis
    $item = $queue->pop(); // método que consome a fila
    if ($item) {
        $data = json_decode($item, true);

        // Certifica que temos os campos necessários
        $deviceId = $data['device_id'] ?? null;
        $keyName  = $data['key_name'] ?? null;
        $keyValue = $data['key_value'] ?? null;
        $timestamp = $data['time'] ?? date('Y-m-d H:i:s');
        $extra = $data['extra'] ?? [];

        if ($deviceId && $keyName && $keyValue !== null) {
            // Insere no TimescaleDB
            $db->insert(
                'INSERT INTO telemetry (device_id, key_name, key_value, time, extra) VALUES (?, ?, ?, ?, ?)',
                [
                    $deviceId,
                    $keyName,
                    $keyValue,
                    $timestamp,
                    json_encode($extra)
                ]
            );

            echo "Processed: " . json_encode($data) . "\n";
        } else {
            echo "Invalid data skipped: " . json_encode($data) . "\n";
        }
    } else {
        sleep(1); // evita consumo de CPU quando fila está vazia
    }
}

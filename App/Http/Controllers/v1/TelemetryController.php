<?php
namespace App\Http\Controllers\v1;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Http\Requests\StoreTelemetryRequest;
use App\Services\TelemetryQueueService;
use App\Http\DTO\TelemetryDTO;

class TelemetryController extends Controller
{
    protected TelemetryQueueService $queue;
    protected StoreTelemetryRequest $telemetryRequest;

    public function store()
    {
        $dto = TelemetryDTO::fromArray($this->telemetryRequest->validated());
        $this->queue->execute($dto);

        return JsonResponse::success(['queued' => true]);
    }
}

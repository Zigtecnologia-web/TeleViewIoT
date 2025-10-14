<?php
namespace App\Http\Controllers\v1;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Http\Requests\StoreTelemetryRequest;
use App\Services\TelemetryQueueService;
use App\Http\DTO\TelemetryDTO;

class TelemetryController extends Controller
{
    private TelemetryQueueService $queue;
    private $telemetryRequest;

    public function __construct()
    {
        parent::__construct();
        $this->queue = new TelemetryQueueService();
        $this->telemetryRequest = new StoreTelemetryRequest();
    }

    public function store()
    {
        $request = $this->telemetryRequest->validated();
        $dto = TelemetryDTO::fromArray($request);

        $this->queue->execute($dto);
        
        return JsonResponse::success(['queued' => true]);
    }
}

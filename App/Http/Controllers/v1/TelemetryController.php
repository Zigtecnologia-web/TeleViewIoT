<?php
namespace App\Http\Controllers\v1;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Http\Requests\StoreTelemetryRequest;
use App\Services\TelemetryQueueService;

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
        $request = $this->telemetryRequest->set($this->getQueryString()->toArray())->validated();
        $this->queue->execute($request);
        
        return JsonResponse::success(['queued' => true]);
    }
}

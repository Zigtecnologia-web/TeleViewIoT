<?php

namespace App\Controllers\Api;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Services\TelemetryQueueService;

class TelemetryController extends Controller
{
    private TelemetryQueueService $queue;

    public function __construct()
    {
        parent::__construct();
        $this->queue = new TelemetryQueueService();
    }

    public function store()
    {
        $params = (array) $this->getQueryString();
        $this->queue->execute($params);
        
        return JsonResponse::success(['queued' => true]);
    }
}

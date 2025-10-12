<?php

namespace App\Controllers\Api;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use Illuminate\Database\Capsule\Manager as DB;

use App\Services\JwtAuthService\JwtAuthService;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        //JwtAuthService::abortIfNotAuthenticated('Unauthorized');
    }

    public function index()
    {
        $params = $this->getQueryString();
        echo 10;
    }

    public function store()
    {
          
    }
}

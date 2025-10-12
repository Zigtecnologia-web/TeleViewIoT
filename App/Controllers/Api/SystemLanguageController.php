<?php

namespace App\Controllers\Api;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Config\Trans;
use Illuminate\Database\Capsule\Manager as DB;

use App\Models\SystemLanguage;
use App\Services\JwtAuthService\JwtAuthService;

class SystemLanguageController extends Controller
{
    protected $trans;
    protected $systemLanguage;

    public function __construct()
    {
        parent::__construct();
        $this->trans = new Trans();
        $this->systemLanguage = new SystemLanguage();

        JwtAuthService::abortIfNotAuthenticated('Unauthorized');
    }

    public function index()
    {
        $params = $this->getQueryString();
        JsonResponse::success(
            $this->systemLanguage->languages()
        );
    }
}

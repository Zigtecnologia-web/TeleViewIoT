<?php

namespace App\Controllers\Api;

use System\Controller\Controller;
use System\Responses\JsonResponse;
use App\Config\Trans;
use App\Services\Api\AuditsService;
use App\Services\Api\RecurringEventService;
use App\Services\JwtAuthService\JwtAuthService;
use App\Services\PermissionsService\PermissionsService;
use Carbon\Carbon;
use stdClass;

class AuditsController extends Controller
{
    protected Trans $trans;
    protected AuditsService $auditsService;
    protected RecurringEventService $recurringEventService;
    protected PermissionsService $permissionsService;
    protected stdClass $user;
    protected ?int $companyId;
    protected string $companyChannel;
    protected array $permissions;

    public function __construct()
    {
        parent::__construct();
        $this->trans = new Trans();
        $this->auditsService = new AuditsService();
        $this->permissionsService = new PermissionsService();

        JwtAuthService::abortIfNotAuthenticated('Unauthorized');

        if (
            !($user = JwtAuthService::authenticatedUser()) || // if user is not authenticated or
            (
                $user->profile_id !== 1 && // if user is not admin and
                !isset($user->company_id) // if user does not have a company ID
            )
        ) {
            JsonResponse::unauthorized($this->trans->get('messages.unauthorized_access'));
        }
        $this->user = $user;
        $this->permissions = $this->permissionsService->userModulesPermissionsByUserProfile($user->profile_id);
        $this->companyId = $user->company_id;
    }

    public function index()
    {
        $params = $this->getQueryString();

        $filters = [
            'user_id' => $params->user_id ?? null,
            'event_type' => $params->event_type ?? null,
            'date_start' => $params->date_start ?? null,
            'date_end' => $params->date_end ?? null,
            'search' => $params->search ?? null,
            'company_id' => $this->companyId,
            'page' => $params->page ?? 1,
            'per_page' => $params->per_page ?? 10
        ];

        $audits = $this->auditsService->setUser($this->user);
        $audits = $this->auditsService->getEventAudits($filters);
        $users = $this->auditsService->getUsersForFilter($this->companyId);

        JsonResponse::success([
            'audits' => $audits['data'],
            'pagination' => $audits['pagination'],
            'users' => $users
        ]);
    }

    public function users()
    {
        $users = $this->auditsService->getUsersForFilter($this->companyId);
        JsonResponse::success($users);
    }

}

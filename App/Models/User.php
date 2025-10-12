<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Capsule\Manager as DB;
use Carbon\Carbon;
use App\Enums\ProfilesEnum;
use App\Services\JwtAuthService\JwtAuthService;
use App\Traits\Auditable;

class User extends Model
{
    use Auditable;

    protected $table = 'users';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $hidden = ['password'];

    protected $casts = [
        'birthdate' => 'date',
    ];

    protected $fillable = [
        'name',
        'gender_id',
        'birthdate',
        'profession',
        'nationality_id',
        'profile_id',
        'email',
        'password',
        'photo',
        'company_id',
        'head_of_team_id',
        'active',
        'system_language_id',
        'image_panel'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getBirthdateAttribute($value)
    {
        // Converter de Y-m-d para dd.mm.yyyy para o padrão suíço
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function selectByEmail($email)
    {
        return $this->where('email', $email)
        ->where('deleted_at', null)
        ->select('*')
        ->first();
    }

    public function users($params)
    {
        $query = DB::table('users')
        ->leftJoin('nationalities', 'users.nationality_id', '=', 'nationalities.id')
        ->leftJoin('genders', 'users.gender_id', '=', 'genders.id')
        ->leftJoin('profiles', 'users.profile_id', '=', 'profiles.id')
        ->join('companies', 'users.company_id', '=', 'companies.id')
        ->where('users.deleted_at', null)
        ->select(
            'users.id',
            'companies.name as company',
            'users.name',
            'users.photo',
            'users.email',
            'users.profession',
            'nationalities.nationality_name AS nationalitiy',
            'genders.label AS gender',
            'profiles.name AS profile'
        );

        // if user logged is not superadmin, only can see collaborators and head of teams
        $userLogged = JwtAuthService::authenticatedUser();
        if ($userLogged->profile_id != ProfilesEnum::SUPERADMIN->value) {
            $query->whereNotIn('users.profile_id', [
                ProfilesEnum::SUPERADMIN->value,
                ProfilesEnum::ADMIN->value,
            ]);
        }

        // if user logged is head of teams, only can see collaborators of his company
        if ($userLogged->profile_id == ProfilesEnum::HEAD_OF_TEAMS->value) {
            $query->where('users.company_id', $userLogged->company_id);
        }

        if ($params) {
            if (isset($params->search)) {
                $query->where('users.name', 'like', '%' . $params->search . '%');
            }

            if (isset($params->getAll) && $params->getAll == true) {
                return $query->orderBy('users.name', 'desc')->get();
            }
        }
        
        $perPage = $params->per_page ?? 10;
        return $query->orderBy('users.name', 'desc')
            ->paginate($perPage, ['*'], 'page', $params->page ?? 1);
    }

    public function selectHeadsOfTeamsProfiles()
    {
        $query = $this->select('id', 'name');

        $userLogged = JwtAuthService::authenticatedUser();
        if ($userLogged->profile_id == ProfilesEnum::COLLABORATORS->value) {
            $query->where('id', $userLogged->head_of_team_id);
        }

        return $query->get();
    }

    function generatePassword($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=<>?';
        $bytes = random_bytes($length);
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $byte = ord($bytes[$i]);
            $password .= $characters[$byte % strlen($characters)];
        }

        return $password;
    }

    public function resourceResponsible()
    {
        $userLogged = JwtAuthService::authenticatedUser();

        return DB::table('users')
        ->select('users.id', 'users.name')
        ->where('company_id', $userLogged->company_id)
        ->where('deleted_at', null)
        ->get();
    }
}

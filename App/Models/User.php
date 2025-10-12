<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Capsule\Manager as DB;
use Carbon\Carbon;
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
        
    ];

    protected $fillable = [
        
    ];
}

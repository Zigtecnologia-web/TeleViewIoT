<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Services\JwtAuthService\JwtAuthService;

/**
 * Auditable
 */
trait Auditable
{
    public static function bootAuditable()
    {
        self::handleUpdating();
        self::handleDeleting();
        self::handleCreating();
    }

    /**
     * Handle creating events.
     */
    public static function handleCreating()
    {
        static::created(function (Model $model) {
            DB::table('audits')->insert([
                'auditable_type' => get_class($model),
                'auditable_id'   => $model->getKey(),
                'event'          => 'created',
                'old_values'     => null,
                'new_values'     => json_encode($model->getAttributes()),
                'user_id'        => JwtAuthService::authenticatedUser()->id ?? null,
                'url'            => $_SERVER['REQUEST_URI'] ?? null,
                'ip_address'     => $_SERVER['REMOTE_ADDR'] ?? null,
                'user_agent'     => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'created_at'     => date('Y-m-d H:i:s')
            ]);
        });
    }

    /**
     * Handle updating events.
     */
    public static function handleUpdating()
    {
        static::updating(function (Model $model) {
            $dirty = $model->getDirty();
            $original = [];

            foreach ($dirty as $attribute => $newValue) {
                $original[$attribute] = $model->getOriginal($attribute);
            }

            DB::table('audits')->insert([
                'auditable_type' => get_class($model),
                'auditable_id'   => $model->getKey(),
                'event'          => 'updated',
                'old_values'     => json_encode($original),
                'new_values'     => json_encode($dirty),
                'user_id'        => JwtAuthService::authenticatedUser()->id ?? null,
                'url'            => $_SERVER['REQUEST_URI'] ?? null,
                'ip_address'     => $_SERVER['REMOTE_ADDR'] ?? null,
                'user_agent'     => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'created_at'     => date('Y-m-d H:i:s')
            ]);
        });
    }

    /**
     * Handle deleting events.
     */
    public static function handleDeleting()
    {
        static::deleted(function (Model $model) {
            DB::table('audits')->insert([
                'auditable_type' => get_class($model),
                'auditable_id'   => $model->getKey(),
                'event'          => 'deleted',
                'old_values'     => json_encode($model->getOriginal()),
                'new_values'     => null,
                'user_id'        => JwtAuthService::authenticatedUser()->id ?? null,
                'url'            => $_SERVER['REQUEST_URI'] ?? null,
                'ip_address'     => $_SERVER['REMOTE_ADDR'] ?? null,
                'user_agent'     => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'created_at'     => date('Y-m-d H:i:s')
            ]);
        });
    }
}

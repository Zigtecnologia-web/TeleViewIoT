<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Capsule\Manager as DB;
use Carbon\Carbon;

class Telemetry extends Model
{
    protected $table = 'telemetry';
    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'time',
        'device_id',
        'field_name',
        'field_value',
        'extra',
    ];

    protected $casts = [
        'time' => 'datetime',
        'extra' => 'array',
        'field_value' => 'float',
    ];

    public function scopeRecent($query, $minutes = 10)
    {
        return $query->where('time', '>=', now()->subMinutes($minutes));
    }

    public function scopeForDeviceKey($query, $deviceId, $key)
    {
        return $query->where('device_id', $deviceId)
            ->where('key_name', $key);
    }
}

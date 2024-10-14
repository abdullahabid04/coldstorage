<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rollout extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'device_group_id',
        'firmware_update_id',
        'rollback_version_id',
        'staged_rollout',
        'rollout_percentage',
        'scheduled_at',
        'status'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function firmwareUpdate()
    {
        return $this->belongsTo(FirmwareUpdate::class);
    }

    // Add the relationship to rollback to a previous version
    public function rollbackVersion()
    {
        return $this->belongsTo(FirmwareUpdate::class, 'rollback_version_id');
    }

    public function deviceGroup()
    {
        return $this->belongsTo(DeviceGroup::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

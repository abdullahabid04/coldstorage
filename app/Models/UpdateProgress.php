<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateProgress extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'firmware_update_id', 'status', 'progress'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function firmwareUpdate()
    {
        return $this->belongsTo(FirmwareUpdate::class);
    }
}

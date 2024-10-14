<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateLog extends Model
{
    use HasFactory;

    protected $table = 'update_logs';

    protected $fillable = ['device_id', 'firmware_update_id', 'message', 'level'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function firmwareUpdate()
    {
        return $this->belongsTo(FirmwareUpdate::class);
    }
}

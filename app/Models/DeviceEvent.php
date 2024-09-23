<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceEvent extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'event_type', 'message'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

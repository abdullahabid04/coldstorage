<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceStatus extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'status', 'time_delay'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WifiStatus extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'wifi_name', 'wifi_status', 'password', 'setting_state', 'getting_state'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

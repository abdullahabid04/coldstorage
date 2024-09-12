<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Device extends Model
{
    use HasFactory;
    use Loggable;
    use SoftDeletes;

    protected $fillable = ['serial_number', 'description', 'store_id'];

    public function getSerial(): string
    {
        do {
            $serial = 'MC' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Device::where('serial_number', $serial)->exists());

        return $serial;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'device_user')->withTimestamps();
    }

    /**
     * A device is assigned to one area (one-to-one via pivot table).
     */
    public function area()
    {
        return $this->belongsToMany(Area::class, 'area_device')->withTimestamps();
    }

    /**
     * A device can have many sensor data entries through areas.
     */
    public function sensorData()
    {
        return $this->hasManyThrough(SensorData::class, Area::class, 'id', 'area_id');
    }
}

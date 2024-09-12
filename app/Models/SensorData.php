<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'device_id', 'timestamp', 'temperature', 'humidity'];
    protected $dates = ['timestamp'];

    /**
     * Sensor data belongs to an area.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * You can access the device through the area's relationship.
     */
    public function device()
    {
        return $this->hasOneThrough(Device::class, Area::class, 'id', 'id', 'area_id', 'id');
    }
}

<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use Loggable;
    use SoftDeletes;

    protected $fillable = ['title', 'store_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * An area belongs to a store.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * An area has a one-to-one relationship with a device (via a pivot table).
     */
    public function device()
    {
        return $this->belongsToMany(Device::class, 'area_device')->withTimestamps();
//        return $this->belongsTo(Device::class, 'area_device');
    }

    /**
     * An area has many sensor data entries.
     */
    public function sensorData()
    {
        return $this->hasMany(SensorData::class);
    }
}

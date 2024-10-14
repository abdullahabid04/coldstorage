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
        // Get the last inserted serial number
        $lastSerial = Device::withTrashed()->orderBy('serial_number', 'desc')->value('serial_number');

        if ($lastSerial) {
            // Extract the numeric part from the last serial number and increment it
            $lastNumber = (int)substr($lastSerial, 2); // Remove 'SN' prefix and convert to an integer
            $newNumber = $lastNumber + 1;
        } else {
            // If no serial exists, start from 1
            $newNumber = 1;
        }

        // Format the new serial number with the required 'SN' prefix and 6 digits
        return 'SN' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
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

    public function deviceGroups()
    {
        return $this->belongsToMany(DeviceGroup::class, 'device_group_device', 'device_id', 'device_group_id')
            ->withTimestamps();
    }

    public function rollouts()
    {
        return $this->hasMany(Rollout::class);
    }
}

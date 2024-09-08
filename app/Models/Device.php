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

    public function store()
    {
        return $this->belongsTo(Store::class); // Inverse of one-to-many relationship
    }

    public function getSerial(): string
    {
        do {
            $serial = 'MC' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Device::where('serial_number', $serial)->exists());

        return $serial;
    }
}
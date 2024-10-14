<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class FirmwareDownloadToken extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'device_id', 'used', 'expires_at'];

    public static function generateToken($deviceId)
    {
        return self::create([
            'token' => Str::random(64),
            'device_id' => $deviceId,
            'expires_at' => Carbon::now()->addMinutes(30),
        ]);
    }

    public function isValid()
    {
        return !$this->used && $this->expires_at->isFuture();
    }
}

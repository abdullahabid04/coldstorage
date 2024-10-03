<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Firmware extends Model
{
    use HasFactory;

    protected $table = 'firmwares';

    protected $fillable = ['version', 'file_path', 'checksum'];

    public function updates()
    {
        return $this->hasMany(FirmwareUpdate::class);
    }
}

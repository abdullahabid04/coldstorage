<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmwareUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'firmware_id',
        'name',
        'compatible_models',
        'min_version',
        'max_version',
        'status'
    ];

    protected $casts = [
        'compatible_models' => 'array',  // Treat compatible models as an array
    ];

    public function firmware()
    {
        return $this->belongsTo(Firmware::class);
    }

    // If a firmware update can be associated with multiple rollouts
    public function rollouts()
    {
        return $this->hasMany(Rollout::class);
    }

    public static function activateVersion($id)
    {
        // Mark all versions as previous
        self::query()->update(['status' => 'previous']);

        // Activate the new version
        $version = self::find($id);
        $version->status = 'active';
        $version->save();
    }

    public static function rollbackToVersion($id)
    {
        // Find the version to rollback to
        $versionToRollback = self::find($id);

        // Set current active version to "rolled_back" and point to the rollback version
        $activeVersion = self::where('status', 'active')->first();
        $activeVersion->status = 'rolled_back';
        $activeVersion->rollback_version_id = $id;
        $activeVersion->save();

        // Set the rollback version as "active"
        $versionToRollback->status = 'active';
        $versionToRollback->save();
    }
}

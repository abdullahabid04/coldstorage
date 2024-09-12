<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Loggable;

    protected $fillable = ['title', 'address', 'owner_name', 'email'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'store_user')
            ->withPivot('access_level') // You might want to access the access_level in some cases
            ->withTimestamps();
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}

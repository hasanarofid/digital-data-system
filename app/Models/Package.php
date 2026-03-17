<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $guarded = [];

    public function gymClasses()
    {
        return $this->hasMany(GymClass::class);
    }
}

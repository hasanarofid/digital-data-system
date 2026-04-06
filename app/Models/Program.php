<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'description'];

    public function digitalData()
    {
        return $this->hasMany(DigitalData::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalData extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'name',
        'phone_number',
        'region',
        'occupation',
        'activity',
        'ktp_photo',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

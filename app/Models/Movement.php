<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'name',
    ];

    public function personalRecords()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}

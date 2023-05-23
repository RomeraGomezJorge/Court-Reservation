<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'type',
        'number',
        'players_number',
        'club_id',
    ];

    public function club()
    {
        $this->belongsTo(Club::class);
    }
}

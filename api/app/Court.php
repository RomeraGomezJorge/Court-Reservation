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
        'created_by_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'day',
        'hour',
        'duration',
        'court_id',
    ];

    public function court()
    {
        $this->belongsTo('courts');
    }


}

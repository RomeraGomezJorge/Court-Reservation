<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        "name",
        "address",
        "google_maps_iframe_location",
        "phone",
        "email",
        "facebook",
        "instagram",
        "twitter",
        "user_id",
    ];

    public function courts()
    {
        $this->hasMany(Court::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

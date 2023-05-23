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
    ];

    public function courts()
    {
        $this->hasMany(Court::class);
    }
}

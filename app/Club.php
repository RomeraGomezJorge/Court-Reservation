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
        "facebook",
        "instagram",
        "twitter",
        "created_by_id",
    ];

    public function courts()
    {
        return $this->hasMany(Court::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}

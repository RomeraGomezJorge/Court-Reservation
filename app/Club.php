<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Club
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $google_maps_iframe_location
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Club newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Club newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Club query()
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereGoogleMapsIframeLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Club whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

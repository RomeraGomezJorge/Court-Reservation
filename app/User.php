<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function club()
    {
        return $this->hasOne(Club::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically encrypt the password before saving it in the database
        // each time a new user is created using the create() or save() method
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}

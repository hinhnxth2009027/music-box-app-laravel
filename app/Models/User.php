<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'cover_photo',
        'address',
        'birthday',
        'facebook',
        'twitter',
        'instagram',
        'role',
        'github'
    ];

    public function musics()
    {
        return $this->hasMany(Musics::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class,);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

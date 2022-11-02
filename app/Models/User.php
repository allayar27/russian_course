<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;


    protected $fillable = [
        'name', 'last_name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

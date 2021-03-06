<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'money',

        'password',
        
        'telf',
        'c_a', 
        'gender',
        'rol',

        ];
    



    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function architects()
    {
        return $this->hasMany(Architect::class);
    }

    // public function architects()
    // {
    //     return $this->hasOne(Architect::class);
    // }



}
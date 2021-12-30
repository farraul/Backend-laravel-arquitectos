<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architect extends Model
{
    use  HasFactory;

    
    
    protected $fillable = [
        'web_site',
        'description_experience',
        'password',
        'id_user'

        ];

        public function users()
        {
            return $this->belongsTo(User::class);
        }

        public function reserves()
        {
            return $this->hasMany(Reserve::class);
        }

    }
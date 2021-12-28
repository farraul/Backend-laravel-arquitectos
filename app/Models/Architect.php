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

        ];

    }
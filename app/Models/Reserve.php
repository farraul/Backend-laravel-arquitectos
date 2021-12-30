<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      
        'id_lead',
        'id_architect'
        

        ];

        public function leads()
        {
            return $this->belongsTo(Lead::class);
        }
        public function architects()
        {
            return $this->belongsTo(Architect::class);
        }

    }
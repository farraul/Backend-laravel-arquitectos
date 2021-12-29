<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use  HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'u_title_order_client',
        'u_description_order_client',
        'u_city',
        'u_date_to_work',
        'id_user'


        ];

        public function users()
        {
            return $this->belongsTo(User::class);
        }

    }
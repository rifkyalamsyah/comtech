<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Relasion
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

     // Relasion 
     public function pesanan_detail()
     {
         return $this->hasMany('App\PesananDetail', 'pesanan_id', 'id');
     }
}

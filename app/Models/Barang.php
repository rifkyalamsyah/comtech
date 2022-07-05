<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasion
    public function pesanan_detail()
    {
        return $this->belongsTo('App\PesananDetail', 'barang_id', 'id');
    }
}

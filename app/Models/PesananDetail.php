<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    // Relasion
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }

    // Relasion
    public function pesanan()
    {
        return $this->belongsTo('App\PesananDetail', 'pesanan_id', 'id');
    }
}

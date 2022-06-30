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
        return $this->belongsTo('App\Models\Barang', 'barang_id', 'id');
    }

    // Relasion
    public function pesanan()
    {
        return $this->belongsTo('App\Models\PesananDetail', 'pesanan_id', 'id');
    }
}

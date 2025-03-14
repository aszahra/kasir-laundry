<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_invoice',
        'id_paket',
        'qty',
        'keterangan',
    ];
    
    protected $table = 'detail_transaksi';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat'
    ];
    
    protected $table = 'outlet';

    public function paket()
    {
        return $this->hasMany(Paket::class, 'id_outlet', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id');
    }
}
